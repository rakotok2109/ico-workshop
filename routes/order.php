<?php
require_once ('../config/init.php');

if (!isset($_SESSION['user'])) {
    header('Location: authentification/login.php');
    exit;
}

$user = unserialize($_SESSION['user']);
$userId = $user->getId();

$orders = OrderController::getOrdersForUser($userId);

$message = '';
$errorMessage = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $firstname = trim($_POST['firstname']);
    $email = trim($_POST['mail']);
    $phone = trim($_POST['phone']);
    $location = trim($_POST['location']);

    if (empty($name) || empty($firstname) || empty($email) || empty($phone) || empty($location)) {
        $errorMessage = "Tous les champs sont obligatoires.";
    } elseif (strlen($name) < 3) {
        $errorMessage = "Le nom doit comporter au moins 3 caractères.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorMessage = "L'email n'est pas valide.";
    } elseif (!preg_match('/^\+?[0-9]{10,15}$/', $phone)) {
        $errorMessage = "Le numéro de téléphone n'est pas valide.";
    } else {
        $user->setName($name);
        $user->setFirstname($firstname);
        $user->setMail($email);
        $user->setPhone($phone);
        $user->setLocation($location);

        UserController::updateUser($user);

        $_SESSION['user'] = serialize($user);

        $message = "Profil mis à jour avec succès.";
    }
}
?>
