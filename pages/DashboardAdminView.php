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
$products = ProductController::getAllProducts();
?>
<table>
    <tr>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Mail</th>
        <th>Phone</th>
        <th>Adresse</th>
        <th>Paramètres</th>
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
                    <form method="POST" action="../routes/user.php?id=updateRole">
                        <input type="hidden" name="id_user" value="<?= $user['id'] ?>">
                        <select name="role">
                            <option value="0" <?= $user['role'] == 0 ? 'selected' : '' ?>>Utilisateur</option>
                            <option value="1" <?= $user['role'] == 1 ? 'selected' : '' ?>>Administrateur</option>
                            <option value="2" <?= $user['role'] == 2 ? 'selected' : '' ?>>Super Administrateur</option>
                        </select>
                        <button type="submit">Changer le rôle</button>
                    </form>
                    <form method="POST" action="../routes/user.php?id=deleteUser" style="display:inline;" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?');">
                        <input type="hidden" name="id" value="<?= $user['id'] ?>">
                        <button type="submit" style="background-color:red; color:white;">Supprimer l'utilisateur</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<table>
    <tr>
        <th>Nom</th>
        <th>Prix</th>
        <th>Description</th>
        <th>Image</th>
    </tr>
    <tbody>
        <?php foreach($products as $product): ?>
            <tr>
                <td><?= $product['name']?></td>
                <td><?= $product['price']?></td>
                <td><?= $product['description']?></td>
                <td><img src="<?= $product['image']?>"/></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<form method="POST" action="../routes/product.php?id=addProduct">
    <input type="text" name="name" placeholder="Nom du produit" required>
    <input type="number" name="price" placeholder="Prix en €" step="0.01" required>
    <textarea name="description" placeholder="Description du produit" required></textarea>
    <input type="text" name="image" placeholder="Lien de l'image" required>
    <button type="submit">Ajouter le produit</button>
</form>