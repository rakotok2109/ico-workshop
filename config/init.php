<?php 

if (isset($_SESSION['user']) && time() > $_SESSION['user']['expiration']) {
    session_unset(); // Supprime toutes les variables de session
    session_destroy(); // Détruit la session
}

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once ($_SERVER['DOCUMENT_ROOT'] . '/config/controller/PDOUtils.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . '/config/controller/ProductController.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . '/config/controller/OrderController.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . '/config/controller/UserController.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . '/config/controller/DetailsOrderController.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . '/config/model/Product.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . '/config/model/Order.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . '/config/model/User.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . '/config/model/DetailsOrder.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . '/config/conf.inc.php');

require_once ('../config/controller/ProductController.php');
require_once ('../config/model/Product.php');
require_once ('../config/controller/FeedbackController.php');
require_once ('../config/model/Feedback.php');
?>