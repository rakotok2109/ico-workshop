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
require_once '../config/init.php';
/*if($_SESSION['user'] == null){
    header('Location: /pages/auth/login.php');
}
else{
    $user = unserialize($_SESSION['user']);
    //if($user->getRole() != 1){
    //    header('Location: /pages/home.php');
    //}
}*/

$users = UserController::getAllUsers();
?>
<table>
    <tr>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Mail</th>
        <th>Phone</th>
        <th>Adresse</th>
        <th>Rôle</th>
    </tr>
    <tbody>
        <?php foreach($users as $user): ?>
            <tr>
                <td><?= $user['name']?></td>
                <td><?= $user['firstname']?></td>
                <td><?= $user['mail']?></td>
                <td><?= $user['phone']?></td>
                <td><?= $user['location']?></td>
                <td>
                    <form method="POST" action="../../routes/user.php?id=updateRole">
                        <input type="hidden" name="id_user" value="<?= $user['id'] ?>">
                        <select name="role">
                            <option value="0" <?= $user['role'] == 0 ? 'selected' : '' ?>>Utilisateur</option>
                            <option value="1" <?= $user['role'] == 1 ? 'selected' : '' ?>>Administrateur</option>
                            <option value="2" <?= $user['role'] == 2 ? 'selected' : '' ?>>Super Administrateur</option>
                        </select>
                        <button type="submit">Changer le rôle</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>