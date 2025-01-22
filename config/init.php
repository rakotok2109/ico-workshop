<?php 

if (isset($_SESSION['user']) && time() > $_SESSION['user']['expiration']) {
    session_unset(); // Supprime toutes les variables de session
    session_destroy(); // Détruit la session
}

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once (__DIR__ . '/controller/PDOUtils.php');
require_once (__DIR__ . '/controller/ProductController.php');
require_once (__DIR__ . '/controller/OrderController.php');
require_once (__DIR__ . '/controller/UserController.php');
require_once (__DIR__ . '/controller/DetailsOrderController.php');
require_once (__DIR__ . '/model/Product.php');
require_once (__DIR__ . '/model/Order.php');
require_once (__DIR__ . '/model/User.php');
require_once (__DIR__ . '/model/DetailsOrder.php');
require_once (__DIR__ . '/conf.inc.php');
require_once (__DIR__ . '/controller/FeedbackController.php');
require_once (__DIR__ . '/model/Feedback.php');
?>