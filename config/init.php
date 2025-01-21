<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once ($_SERVER['DOCUMENT_ROOT'] . '/config/controller/PDOUtils.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . '/config/controller/ProductController.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . '/config/controller/OrderController.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . '/config/controller/DetailsOrderController.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . '/config/model/Product.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . '/config/model/Order.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . '/config/model/User.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . '/config/model/DetailsOrder.php');


?>