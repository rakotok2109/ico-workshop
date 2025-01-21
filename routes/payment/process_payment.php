<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require_once ($_SERVER['DOCUMENT_ROOT'] . '/config/init.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php');
use Dotenv\Dotenv;

// Charger le fichier .env
$dotenv = Dotenv::createImmutable($_SERVER['DOCUMENT_ROOT'] . '/');
$dotenv->load();

if (!isset($_ENV['STRIPE_API_KEY'])) {
    die(json_encode(['error' => 'Clé API Stripe non définie.']));
}


$stripe_Api_Key = $_ENV['STRIPE_API_KEY'];

\Stripe\Stripe::setApiKey($stripe_Api_Key);

header('Content-Type: application/json');

$cart = json_decode($_POST['cart'], true);
$totalAmount = $_POST['totalAmount'] * 100; // Stripe attend le montant en centimes
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
        // 'confirmation_method' => 'manual',
        'confirm' => true,
    ]);

    if ($paymentIntent->status === 'succeeded') {
         $user = unserialize($_SESSION['user']);
        // // Enregistrement de la commande dans la base de données
        // $pdo = PDOUtils::getSharedInstance();
        // $pdo->execSQL('INSERT INTO orders (id_user, date) VALUES (?, ?)', [$user->getId(), date('Y-m-d H:i:s')]);

        // $orderId = $pdo->getLastInsertId();

        // foreach ($cart as $item) {
        //     $pdo->execSQL('INSERT INTO detail_order (id_order, id_product, quantity, amount) VALUES (?, ?, ?, ?)',
        //         [$orderId, $item['id'], $item['quantite'], $item['prix'] * $item['quantite']]
        //     );
        // }

        echo json_encode(['success' => true]);
        exit;
    } else {
        echo json_encode(['error' => 'Le paiement a échoué.']);
    }
} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
    exit;
}
?>
