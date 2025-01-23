<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require_once (dirname(__DIR__).'/config/init.php');
require_once (dirname(__DIR__) . '/vendor/autoload.php');
use Dotenv\Dotenv;


$dotenv = Dotenv::createImmutable(dirname(__DIR__) . '/');
$dotenv->load();

if (!isset($_ENV['STRIPE_API_KEY'])) {
    die(json_encode(['error' => 'Clé API Stripe non définie.']));
}


$stripe_Api_Key = $_ENV['STRIPE_API_KEY'];

\Stripe\Stripe::setApiKey($stripe_Api_Key);

header('Content-Type: application/json');

$cart = json_decode($_POST['cart'], true);
$totalAmount = $_POST['totalAmount'] * 100;
$firstName = $_POST['first_name'];
$lastName = $_POST['last_name'];
$address = $_POST['address'];
try {
    $paymentIntent = \Stripe\PaymentIntent::create([
        'amount' => $totalAmount,
        'currency' => 'eur',
        'automatic_payment_methods' => [
            'enabled' => true,
            'allow_redirects' => 'never'
        ],
        'payment_method' => $_POST['payment_method_id'],
        'confirm' => true,
    ]);

    if ($paymentIntent->status === 'succeeded') {
         $order = new Order(null, date('Y-m-d H:i:s'), 1);
         $orderId =  OrderController::addOrder($order);
       
if($orderId == null ){
    echo json_encode(['error' => 'Erreur avec la base de données.']);

}
else
{

    foreach($cart as $item){
        $details = new DetailsOrder(null, $orderId, $item['id'], $item['quantite'], $item['prix'] * $item['quantite']);
        DetailOrderController::addOrderDetails($details);
        echo json_encode(['success' => true]);

    }

}
     
       

     
        exit;
    } else {
        echo json_encode(['error' => 'Le paiement a échoué.']);
    }
} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
    exit;
}
?>
