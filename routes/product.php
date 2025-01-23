<?php
require_once (dirname(__DIR__).'/config/init.php');

if($_GET['id'] == 'addProduct') {
    $product = new Product(
        $_POST['name'],
        $_POST['price'],
        $_POST['description'],
        $_POST['image']    
    );

    ProductController::addProduct($product);
    header("Location: ../pages/dashboard.php");
    exit();
}

else if($_GET['id'] == 'deleteProduct') {
    ProductController::deleteProduct();
}


else if($_GET['id'] == 'updateProduct') {
    $product = new Product(
        $_POST['name'],
        $_POST['price'],
        $_POST['description'],
        $_POST['image'],
        $_POST['id']
    );

    ProductController::updateProduct($product);
    header("Location: ../pages/dashboard.php");
    exit();
}
