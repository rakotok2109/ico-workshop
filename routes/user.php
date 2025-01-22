<?php 
require_once ($_SERVER['DOCUMENT_ROOT'] . '/config/init.php');


if($_GET['id'] == 'register') {

    if(isset( $_SESSION['inscriptionErreur']))
    {
        unset( $_SESSION['inscriptionErreur']);
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


    if(isset( $_SESSION['inscriptionErreur'])) {
        $_SESSION['firstname'] = $user->getFirstname();
        $_SESSION['lastname'] = $user->getName();
        $_SESSION['phone'] = $user->getPhone();
        $_SESSION['email'] = $user->getMail();
     

        header('Location: /pages/authentification/register.php');
        exit();

    }

    else{

        UserController::register($user);
        header('Location: /pages/authentification/login.php');
    
    }

   
   
  
}
else if($_GET['id'] == 'login') {
    $result = UserController::login($_POST['email'], $_POST['password']);
    if($result) {
    //   echo $_SESSION['user']->getName();
    $user= unserialize($_SESSION['user']);
    var_dump($user);
    if($user->getRole() < 1)
    {
        header('Location: /pages/home.php');

    }
    else{
        header('Location: /pages/DashboardAdminView.php');
    }
    }
    else {
        header('Location: /pages/authentification/login.php');
    }
}
else if($_GET['id'] == 'logout') {
    unset($_SESSION['user']);
    header('Location: /pages/home.php');
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
    UserController::validateFirstname($user->getFirstname());
    UserController::validateRole($user->getRole());
    UserController::validateName($user->getName());
    UserController::validatePhone($user->getPhone());
    UserController::validatePassword($user->getPassword());

    UserController::update($user);
   
   
    header('Location: /');
}

else if($_GET['id'] == 'updateRole') {
    UserController::updateRole();
}

else if($_GET['id'] == 'deleteUser') {
    UserController::deleteUser();
}

else{
    header('Location: /pages/home.php');
}