<?php 
if (isset($_SESSION['user']) && time() > $_SESSION['user']['expiration']) {
    session_unset(); // Supprime toutes les variables de session
    session_destroy(); // Détruit la session
}

// ... code existant ...
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once (__DIR__ . '/../config/conf.inc.php');
require_once (__DIR__ . '/../config/controller/PDOUtils.php');
require_once (__DIR__ . '/../config/controller/UserController.php');
require_once (__DIR__ . '/../config/controller/ProductController.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . '/config/controller/ProductController.php');
require_once (__DIR__ . '/../config/model/User.php');
require_once (__DIR__ . '/../config/model/Order.php');
require_once (__DIR__ . '/../config/controller/DetailsOrderController.php');
require_once (__DIR__ . '/../config/controller/OrderController.php');
require_once (__DIR__ . '/../config/model/DetailsOrder.php');
require_once (__DIR__ . '/../config/model/Product.php');

?>
