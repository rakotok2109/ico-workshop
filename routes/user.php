<?php 
require_once (dirname(__DIR__).'/config/init.php');


if($_GET['id'] == 'register') {

    if(isset( $_SESSION['inscriptionErreur']))
    {
        unset( $_SESSION['inscriptionErreur']);
    }
    $user = new User(
        $_POST['name'],
        $_POST['firstname'],
        $_POST['password'],
        $_POST['mail'],
        $_POST['phone'],
        $_POST['location'],
        0 
    );

    UserController::validateMail($user->getMail());
    UserController::validateFirstname($user->getFirstname());
    UserController::validateName($user->getName());
    UserController::validatePhone($user->getPhone());
    UserController::validatePassword($user->getPassword());


    if(isset( $_SESSION['inscriptionErreur'])) {
        $_SESSION['firstname'] = $user->getFirstname();
        $_SESSION['lastname'] = $user->getName();
        $_SESSION['phone'] = $user->getPhone();
        $_SESSION['mail'] = $user->getMail();
     

        header('Location: /pages/register.php');
        exit();

    }

    else{

        UserController::register($user);
        header('Location: /');
    
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
    }
}
else if($_GET['id'] == 'logout') {
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

else if($_GET['id'] == 'update') {

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

else{
    header('Location: /pages/home.php');
}