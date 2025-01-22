<?php
session_start();

// Vérifie si une session existe et la détruit
if (isset($_SESSION)) {
    session_unset();
    session_destroy();
}

// Redirection vers la page de connexion
header('Location: login.php');
exit;
