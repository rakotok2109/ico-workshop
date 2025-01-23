<?php
require_once (dirname(__DIR__).'/config/init.php');

if($_GET['id'] == 'addCard') {
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $uploadDir =(dirname(__DIR__).'/ressources/images/');

        $imageName = basename($_FILES['image']['name']);

        $uploadFilePath = $uploadDir . $imageName;

        if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFilePath)) {
            $card = new Card(
                $_POST['name'],
                $_POST['type'],
                $_POST['description'],
                $imageName
            );
            CardController::addCard($card);
            header('Location: ../pages/admin/dashboard.php#cards');
           }
    }
    else {
       $_SESSION['ajoutProduitErreur'] = "Aucune image téléchargée ou erreur de téléchargement.";
       header('Location: ../pages/admin/dashboard.php#cards');
   }

}

else if($_GET['id'] == 'deleteCard') {
    CardController::deleteCard();

}

else if($_GET['id'] == 'updateCard') {
    $card = new Card(
        $_POST['name'],
        $_POST['type'],
        $_POST['description'],
        $_POST['image'],
        $_POST['id']
    );
    CardController::updateCard($card);
    header('Location: ../pages/admin/dashboard.php#cards');
}