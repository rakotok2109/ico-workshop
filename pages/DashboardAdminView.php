<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/5563162149.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/css/styles.css">

    <title>Dashboard Administrateur</title>
</head>
<body>
<?php 
require_once ($_SERVER['DOCUMENT_ROOT'] . '/config/init.php');
if($_SESSION['user'] == null){
    header('Location: /pages/auth/login.php');
}
else{
    $user = unserialize($_SESSION['user']);
    //if($user->getRole() != 1){
    //    header('Location: /pages/home.php');
    //}
}
?>

<div class="list-user-container">
    <?php foreach($users as $user): ?>
        <td><?= $user['id'] ?></td>
        <td><?= $user['name'] ?></td>
        <td><?= $user['firstname'] ?></td>
        <td><?= $user['phone'] ?></td>
        <td><?= $user['mail'] ?></td>
        <td><?= $user['role'] == 1 ? 'Admin' : 'Utilisateur' ?></td>
    <?php endforeach; ?>
</div>