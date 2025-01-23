<?php
require_once (__DIR__ . '/../config/init.php');

if (isset($_SESSION['successMessage'])) {
    unset($_SESSION['successMessage']);
}

if (isset($_SESSION['errorMessage'])) {
    unset($_SESSION['errorMessage']);
}


if ($_GET['id'] == 'register') {
    if (isset($_SESSION['inscriptionErreur'])) {
        unset($_SESSION['inscriptionErreur']);
    }
    $user = new User(
        $_POST['nom'],
        $_POST['prenom'],
        $_POST['password'],
        $_POST['email'],
        $_POST['telephone'],
        $_POST['location'],
        0,
        null
    );

    UserController::validateMail($user->getMail());
    UserController::validateFirstname($user->getFirstname());
    UserController::validateName($user->getName());
    UserController::validatePhone($user->getPhone());
    UserController::validatePassword($user->getPassword());

    if (isset($_SESSION['inscriptionErreur'])) {
        $_SESSION['firstname'] = $user->getFirstname();
        $_SESSION['lastname'] = $user->getName();
        $_SESSION['phone'] = $user->getPhone();
        $_SESSION['email'] = $user->getMail();

        header('Location: /pages/authentification/register.php');
        exit();
    } else {
        UserController::register($user);
        $_SESSION['successMessage'] = "Votre inscription a été réussie. Vous pouvez maintenant vous connecter.";
        header('Location: /pages/authentification/login.php');
        exit();
    }
} else if ($_GET['id'] == 'login') {
    $result = UserController::login($_POST['email'], $_POST['password']);
    if ($result) {
        $user = unserialize($_SESSION['user']);
        if ($user->getRole() < 1) {
            header('Location: /pages/home.php');
        } else {
            header('Location: /pages/profile.php');
        }
        exit();
    } else {
        $_SESSION['errorMessage'] = "Email ou mot de passe incorrect.";
        header('Location: /pages/authentification/login.php');
        exit();
    }
} else if ($_GET['id'] == 'logout') {
    unset($_SESSION['user']);
    header('Location: /pages/home.php');
    exit();
} else if ($_GET['id'] == 'update') {
    if (!isset($_SESSION['user'])) {
        header('Location: /pages/authentification/login.php');
        exit();
    }
    
    $user = unserialize($_SESSION['user']);
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = trim($_POST['name']);
        $firstname = trim($_POST['firstname']);
        $email = trim($_POST['mail']);
        $phone = trim($_POST['phone']);
        $location = trim($_POST['location']);

        // Validation des champs
        if (empty($name) || empty($firstname) || empty($email) || empty($phone) || empty($location)) {
            $errorMessage = "Tous les champs sont obligatoires.";
        } elseif (strlen($name) < 3) {
            $errorMessage = "Le nom doit comporter au moins 3 caractères.";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errorMessage = "L'email n'est pas valide.";
        } elseif (!preg_match('/^\+?[0-9]{10,15}$/', $phone)) {
            $errorMessage = "Le numéro de téléphone n'est pas valide.";
        } else {
            // Si tout est valide
            $user->setName($name);
            $user->setFirstname($firstname);
            $user->setMail($email);
            $user->setPhone($phone);
            $user->setLocation($location);

            UserController::updateUser($user);
            $_SESSION['user'] = serialize($user);
            $_SESSION['successMessage'] = "Profil mis à jour avec succès.";
        }
    }

    // Afficher le message d'erreur ou de succès
    if (isset($errorMessage)) {
        $_SESSION['errorMessage'] = $errorMessage;
    }

    header('Location: /pages/profile.php');
    exit();
} else if ($_GET['id'] == 'deleteUser') {
    $id_user = isset($_POST['id_user']) ? (int) $_POST['id_user'] : null;
    if ($id_user) {
        UserController::deleteUser($id_user);
        $_SESSION['successMessage'] = "L'utilisateur a été supprimé avec succès.";
        header('Location: /pages/admin/dashboard.php');
        exit();
    }
} else {
    header('Location: /pages/home.php');
    exit();
}
?>
