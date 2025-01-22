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
$feedbacks = FeedbackController::getAllFeedbacks();
$newsList = NewsController::getAllNews();
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
                <form method="POST" action="../routes/product.php?id=updateProduct" style="display:inline;">
                    <input type="hidden" name="id" value="<?= isset($product['id']) ? $product['id'] : '' ?>">
                    <td><input type="text" name="name" value="<?= $product['name'] ?>" required></td>
                    <td><input type="number" name="price" value="<?= $product['price'] ?>" step="0.01" required></td>
                    <td><textarea name="description"><?= $product['description'] ?></textarea></td>
                    <td><input type="text" name="image" value="<?= $product['image'] ?>" required></td>
                    <td><button type="submit">Modifier</button></td>
                </form>
                <td><form method="POST" action="../routes/product.php?id=deleteProduct" style="display:inline;" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce produit ?');">
                    <input type="hidden" name="id" value="<?= $product['id'] ?>">
                    <button type="submit" style="background-color:red; color:white;">Supprimer le produit</button>
                    </form>
                </td>
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

<table>
    <tr>
        <th>Prénom</th>
        <th>Avis</th>
        <th>Note</th>
    </tr>
    <tbody>
        <?php foreach($feedbacks as $feedback): ?>
            <tr>
                <td><?= $feedback['firstname']?></td>
                <td><?= $feedback['wording']?></td>
                <td><?= $feedback['rate']?></td>
                <td>
                    <form method="POST" action="../routes/feedback.php?id=deleteFeedback" style="display:inline;" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet avis ?');">
                        <input type="hidden" name="id" value="<?= $feedback['id'] ?>">
                        <button type="submit" style="background-color:red; color:white;">Supprimer l'avis</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>


<table>
    <tr>
        <th>Titre</th>
        <th>Description</th>
        <th>Date</th>
    </tr>
    <tbody>
        <?php foreach($newsList as $newsItem): ?>
            <tr>
                <form method="POST" action="../routes/news.php?id=updateNews" style="display:inline;">
                    <input type="hidden" name="id" value="<?= isset($newsItem['id']) ? $newsItem['id'] : '' ?>">
                    <td><input type="text" name="title" value="<?= $newsItem['title'] ?>" required></td>
                    <td><input type="text" name="wording" value="<?= $newsItem['wording'] ?>" required></td>
                    <td><input type="date" name="date" value="<?= $newsItem['date'] ?>" required></td>
                    <td><button type="submit">Modifier</button></td>
                </form>
                <td><form method="POST" action="../routes/news.php?id=deleteNews" style="display:inline;" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet actualité ?');">
                    <input type="hidden" name="id" value="<?= $newsItem['id'] ?>">
                    <button type="submit" style="background-color:red; color:white;">Supprimer l'actualité</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<form method="POST" action="../routes/news.php?id=addNews">
    <input type="text" name="title" placeholder="Titre de l'actualité" required>
    <textarea name="wording" placeholder="Description de l'article" required></textarea>
    <input type="date" name="date" placeholder="Date" required>
    <button type="submit">Ajouter l'actualité'</button>
</form>