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
        $_SESSION['email'] = $user->getMail();
     

        header('Location: ../pages/authentification/register.php');
        var_dump($user);
    }else{
        UserController::register($user);
        header('Location: ../pages/authentification/login.php');
    
    }

   
   
  
}
else if($_GET['id'] == 'login') {
    $result = UserController::login($_POST['mail'], $_POST['password']);
    if($result) {
        $result = unserialize($_SESSION['user']);
        header('Location: ../pages/home.php');
    }else {
        header('Location: ../pages/authentification/login.php');
    }
}

else if($_GET['id'] == 'logout') {
    unset($_SESSION['user']);
    header('Location: ../pages/home.php');
}

else if($_GET['id'] == 'update') {

    if(isset( $_SESSION['modificationErreur']))
    {
        unset( $_SESSION['modificationErreur']);
    }
    $user = new User(
        $_POST['name'],
        $_POST['firstname'],
        null,
        $_POST['mail'],
        $_POST['phone'],
        $_POST['location'],
        $_POST['role'],
    );

    UserController::validateMail($user->getMail());
    UserController::validateMail($user->getMail());
    UserController::validateFirstname($user->getFirstname());
    UserController::validateName($user->getName());
    UserController::validatePhone($user->getPhone());
    UserController::validatePassword($user->getPassword());
    UserController::updateUser($user);
   
   
    header('Location: /');
}

else if($_GET['id'] == 'updateRole') {
    UserController::updateRole();
    header("Location: ../pages/dashboard.php");
    exit();
}

else if($_GET['id'] == 'deleteUser') {
    $id_user = isset($_POST['id']) ? (int) $_POST['id'] : null;
    UserController::deleteUser($id_user);
}

else{
    header('Location: /pages/home.php');
}