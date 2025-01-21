<?php
require_once ('../config/init.php');

if($_GET['id'] == 'addProduct') {
    $product = new Product(
        $_POST['name'],
        $_POST['price'],
        $_POST['description'],
        $_POST['image']    
    );

    ProductController::addProduct($product);
}
else{
    header('Location: /pages/home.php');
}