<?php
require_once (dirname(__DIR__).'/config/init.php');

if($_GET['id'] == 'addProduct') {            
                     // Vérifiez si le fichier a été téléchargé
                     if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                         // Définir le dossier de destination
                         $uploadDir =(dirname(__DIR__).'/ressources/images/produits/');
                        
                         // Récupérer le nom du fichier
                         $imageName = basename($_FILES['image']['name']);
                        
                         // Définir le chemin complet pour le fichier
                         $uploadFilePath = $uploadDir . $imageName;

                         // Déplacer le fichier téléchargé vers le dossier de destination
                         if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFilePath)) {
                             // Le fichier a été déplacé avec succès
                             $product = new Product(
                                 $_POST['name'],
                                 $_POST['price'],
                                 $_POST['description'],
                                 $imageName, // Utiliser le nom de l'image
                                 $_POST['id']
                             );
                             ProductController::addProduct($product);
                            }
                     }
                     else {
                        // Gestion de l'erreur de téléchargement
                        $_SESSION['ajoutProduitErreur'] = "Aucune image téléchargée ou erreur de téléchargement.";
                        header('Location: /pages/admin/dashboard.php');
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