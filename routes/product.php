<?php
require_once (dirname(__DIR__).'/config/init.php');

if($_GET['id'] == 'addProduct') {
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $uploadDir =(dirname(__DIR__).'/ressources/images/');

        $imageName = basename($_FILES['image']['name']);

        $uploadFilePath = $uploadDir . $imageName;

        if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFilePath)) {
            $product = new Product(
                $_POST['name'],
                $_POST['price'],
                $_POST['description'],
                $imageName
            );
            ProductController::addProduct($product);
           }
    }
    else {
       $_SESSION['ajoutProduitErreur'] = "Aucune image téléchargée ou erreur de téléchargement.";
       header('Location: ../pages/admin/dashboard.php#products');
   }
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
}

else{
    header('Location: /pages/home.php');
}