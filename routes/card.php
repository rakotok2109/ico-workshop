<?php
require_once (dirname(__DIR__).'/config/init.php');

if($_GET['id'] == 'addCard') {
    $card = new Card(
        $_POST['type'],
        $_POST['nom'],
        $_POST['couleur'],
        $_POST['dos'],
        $_POST['role_de_carte'],
        $_POST['path']

    );
    

    CardController::createCard($card);
    header("Location: ../pages/dashboard.php");
    exit();

}else if($_GET['id'] == 'deleteCard') {

    CardController::deleteCard();

}else if($_GET['id'] == 'updateCard') {
    $card = new Card(
        $_POST['type'],
        $_POST['nom'],
        $_POST['couleur'],
        $_POST['dos'],
        $_POST['role_de_carte'],
        $_POST['path'],
        $_POST['id']

    );

    CardController::updateCard($card);

}