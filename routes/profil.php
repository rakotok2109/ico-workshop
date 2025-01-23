<?php 
require_once (dirname(__DIR__).'/config/init.php');

if($_GET['id'] == 'update') {

    $user = new User(
        $_POST["name"],
        $_POST["firstname"],
        $_POST["password"],
        $_POST["mail"],
        $_POST["phone"],
        $_POST["location"],
        $_POST["role"],
        $_POST["id"]
    );

    UserController::updateUser($user);
    header('location: ../pages/profil.php');
    exit();
}