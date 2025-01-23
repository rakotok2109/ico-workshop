<?php 
require_once (dirname(__DIR__).'/config/init.php');

if ($_GET['id'] == 'register') {
    if (isset($_SESSION['inscriptionErreur'])) {
        unset($_SESSION['inscriptionErreur']);
    }
    $user = new User(
        $_POST['name'],
        $_POST['firstname'],
        $_POST['password'],
        $_POST['mail'],
        $_POST['phone'],
        $_POST['email'],
        $_POST['telephone'],
        $_POST['location'],
        0 
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
        $_SESSION['mail'] = $user->getMail();
     
        $_SESSION['email'] = $user->getMail();

        header('Location: /pages/register.php');
        exit();
    } else {
        UserController::register($user);
        header('Location: /');
    
        $_SESSION['successMessage'] = "Votre inscription a été réussie. Vous pouvez maintenant vous connecter.";
        header('Location: /pages/authentification/login.php');
        exit();
    }

   
   
    header('Location: /');
}
else if($_GET['id'] == 'login') {
    $result = UserController::login($_POST['mail'], $_POST['password']);
    if($result) {
    //   echo $_SESSION['user']->getName();
    $user= unserialize($_SESSION['user']);
    if($user->getRole() < 1)
    {
        header('Location: ../pages/home.php');

    }
    else if($user->getRole() >= 1){
        header('Location: ../pages/admin/dashboard.php');
    }
    }
    else {
        header('Location: ../pages/authentification/login.php');
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
    header('Location: ../pages/home.php');
}

else if($_GET['id'] == 'updateRole') {
    UserController::updateRole();
}

else if($_GET['id'] == 'deleteUser') {
    $id_user = isset($_POST['id']) ? (int) $_POST['id'] : null;
    UserController::deleteUser($id_user);
}

else{
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
        header('Location: /pages/users.php');
        exit();
    }
} else {
    header('Location: /pages/home.php');
    exit();
}
?>
