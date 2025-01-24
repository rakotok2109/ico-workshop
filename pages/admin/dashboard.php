<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/5563162149.js" crossorigin="anonymous"></script>
    <script src="../../ressources/js/script.js"></script>
    <link rel="stylesheet" href="../../ressources/css/dashboard.css">
    <title>Dashboard Administrateur</title>
</head>
<body>
<?php
require_once(dirname(dirname(__DIR__)) . '/config/init.php');
if (!isset($_SESSION['user']) || empty($_SESSION['user'])) {
    header('Location: ../authentification/login.php');
    exit();
}

$user = unserialize($_SESSION['user']);
if (!$user || !method_exists($user, 'getRole')) {
    header('Location: ../authentification/login.php');
    exit();
}

$superadmin = ($user->getRole() === 2);
$users = UserController::getAllUsers();
$products = ProductController::getAllProducts();
$feedbacks = FeedbackController::getAllFeedbacks();
$newsList = NewsController::getAllNews();
$cards = CardController::getAllCards();
$orders = DetailOrderController::getAdminAllOrders();
?>
<div class="dashboard-container">
    <aside class="sidebar">
        <div class="logo">
            <a href="../home.php"><img src="../../ressources/images/logo.png"></a>
        </div>
        <h2>Dashboard Administrateur</h2>
        <nav>
            <ul>
                <li><a href="#users" onclick="showSectionDashboard('users')">Utilisateurs</a></li>
                <li><a href="#products" onclick="showSectionDashboard('products')">Produits</a></li>
                <li><a href="#orders" onclick="showSectionDashboard('orders')">Commandes</a></li>
                <li><a href="#feedbacks" onclick="showSectionDashboard('feedbacks')">Avis</a></li>
                <li><a href="#news" onclick="showSectionDashboard('news')">Actualités</a></li>
                <li><a href="#cards" onclick="showSectionDashboard('cards')">Cartes du jeu</a></li>
                <li><a href="../profil.php">Mon profil</a></li>
                <li><a href="../../routes/user.php?id=logout">Se déconnecter</a></li>
            </ul>
        </nav>
    </aside>

    <main class="dashboard-content">
        <section id="users" class="dashboard-section">
            <h2>Gestion des Utilisateurs</h2>
            <table class="dashboard-table">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Mail</th>
                        <th>Phone</th>
                        <th>Adresse</th>
                        <th>Rôle</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($users as $user): ?>
                        <tr>
                            <td><?= $user['name']?></td>
                            <td><?= $user['firstname']?></td>
                            <td><?= $user['mail']?></td>
                            <td><?= $user['phone']?></td>
                            <td><?= $user['location']?></td>
                            <td>
                                <?php if ($superadmin): ?>
                                    <form method="POST" action="../../routes/user.php?id=updateRole">
                                        <input type="hidden" name="id_user" value="<?= $user['id'] ?>">
                                        <select name="role">
                                            <option value="0" <?= $user['role'] == 0 ? 'selected' : '' ?>>Utilisateur</option>
                                            <option value="1" <?= $user['role'] == 1 ? 'selected' : '' ?>>Admin</option>
                                            <option value="2" <?= $user['role'] == 2 ? 'selected' : '' ?>>Super Admin</option>
                                        </select>
                                        <button type="submit" class="edit-btn">Modifier</button>
                                    </form>
                                    <form method="POST" action="../../routes/user.php?id=deleteUser" onsubmit="return confirm('Supprimer cet utilisateur ?');">
                                        <input type="hidden" name="id" value="<?= $user['id'] ?>">
                                        <button type="submit" class="delete-btn">Supprimer</button>
                                    </form>
                                <?php else: ?>
                                    <?= $user['role'] == 0 ? 'Utilisateur' : ($user['role'] == 1 ? 'Administrateur' : 'Super Administrateur') ?>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>

        <section id="products" class="dashboard-section" style="display: none;">
            <h2>Gestion des Produits</h2>
            <table class="dashboard-table">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prix</th>
                        <th>Description</th>
                        <th>Modifier</th>
                        <th>Supprimer</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($products as $product): ?>
                        <tr>
                            <form method="POST" action="../../routes/product.php?id=updateProduct" enctype="multipart/form-data">                                
                                <input type="hidden" name="id" value="<?= isset($product['id']) ? $product['id'] : '' ?>">
                                <input type="hidden" name="image" value="<?= $product['image'] ?>">
                                <td><input type="text" name="name" value="<?= $product['name'] ?>" required></td>
                                <td><input type="number" name="price" value="<?= $product['price'] ?>" step="0.01" required></td>
                                <td><textarea name="description"><?= $product['description'] ?></textarea></td>
                                <td>
                                    <button type="submit" class="edit-btn">Modifier</button>
                                </td>
                            </form>
                            <td>
                                <form method="POST" action="../../routes/product.php?id=deleteProduct" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce produit ?');">
                                    <input type="hidden" name="id" value="<?= $product['id'] ?>">
                                    <button type="submit" class="delete-btn">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <form method="POST" action="../../routes/product.php?id=addProduct" class="form-add" enctype="multipart/form-data">
                <label for="name" class="form-label">Nom du produit</label>
                <input type="text" name="name" placeholder="Nom du produit" class="form-input" required>

                <label for="price" class="form-label">Prix en €</label>
                <input type="number" name="price" placeholder="Prix en €" step="0.01" class="form-input" required>

                <label for="description" class="form-label">Description du produit</label>
                <textarea name="description" placeholder="Description du produit" class="form-textarea" required></textarea>

                <label for="image" class="form-label">Lien de l'image</label>
                <input required type="file" name="image"><br><br>

                <button type="submit" class="form-button">Ajouter le produit</button>
            </form>
        </section>

        <section id="orders" class="dashboard-section" style="display: none;">
            <h2>Détail des Commandes</h2>
            <table class="dashboard-table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Email</th>
                        <th>ID de commande</th>
                        <th>Date</th>
                        <th>Id Produit</td>
                        <th>Nom du Produit</th>
                        <th>Prix</th>
                        <th>Quantité</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($orders as $order): ?>
                        <tr>
                            <td><?= $order['id_user'] ?></td>
                            <td><?= $order['name'] ?></td>
                            <td><?= $order['firstname'] ?></td>
                            <td><?= $order['email'] ?></td>
                            <td><?= $order['id_order'] ?></td>
                            <td><?= $order['date_order'] ?></td>
                            <td><?= $order['id_product'] ?></td>
                            <td><?= $order['product_name'] ?></td>
                            <td><?= $order['price'] ?></td>
                            <td><?= $order['quantity'] ?></td>
                            <td><?= $order['total_amount'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>

        <section id="feedbacks" class="dashboard-section" style="display: none;">
            <h2>Gestion des Avis</h2>
            <table class="dashboard-table">
                <thead>
                    <tr>
                        <th>Prénom</th>
                        <th>Avis</th>
                        <th>Note</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($feedbacks as $feedback): ?>
                        <tr>
                            <td><?= $feedback['firstname']?></td>
                            <td><?= $feedback['wording']?></td>
                            <td><?= $feedback['rate']?></td>
                            <td>
                                <form method="POST" action="../../routes/feedback.php?id=deleteFeedback" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet avis ?');">
                                    <input type="hidden" name="id" value="<?= $feedback['id'] ?>">
                                    <button type="submit" class="delete-btn">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>

        <section id="news" class="dashboard-section" style="display: none;">
            <h2>Gestion des Actualités</h2>
            <table class="dashboard-table">
                <thead>
                    <tr>
                        <th>Titre</th>
                        <th>Description</th>
                        <th>Date</th>
                        <th>Modifier</th>
                        <th>Supprimer</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($newsList as $newsItem): ?>
                        <tr>
                            <form method="POST" action="../../routes/news.php?id=updateNews">
                                <input type="hidden" name="id" value="<?= isset($newsItem['id']) ? $newsItem['id'] : '' ?>">
                                <td><input type="text" name="title" value="<?= $newsItem['title']?>" required></td>
                                <td><textarea name="wording"> <?= $newsItem['wording']?></textarea></td>
                                <td><input type="date" name="date" value="<?= $newsItem['date']?>" required></td>
                                <td><button type="submit" class="edit-btn">Modifier</button></td>
                            </form>
                            <td>
                                <form method="POST" action="../../routes/news.php?id=deleteNews" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet actualité ?');">
                                    <input type="hidden" name="id" value="<?= $newsItem['id'] ?>">
                                    <button type="submit" class="delete-btn">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <form method="POST" action="../../routes/news.php?id=addNews" class="form-add">
                <label for="title" class="form-label">Titre de l'actualité</label>
                <input type="text" name="title" placeholder="Titre de l'actualité" class="form-input" required>

                <label for="wording" class="form-label">Description de l'article</label>
                <textarea name="wording" placeholder="Description de l'article" class="form-textarea" required></textarea>

                <label for="date" class="form-label">Date</label>
                <input type="date" name="date" class="form-input" required>

                <button type="submit" class="form-button">Ajouter l'actualité</button>
            </form>
        </section>

        <section id="cards" class="dashboard-section" style="display: none;">
            <h2>Gestion des Cartes du jeu</h2>
            <table class="dashboard-table">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Type</th>
                        <th>Role</th>
                        <th>Modifier</th>
                        <th>Supprimer</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($cards as $card): ?>
                        <tr>
                            <form method="POST" action="../../routes/cards.php?id=updateCard" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?= $card['id'] ?>">
                                <input type="hidden" name="image" value="<?= $card['image'] ?>">
                                <td><input type="text" name="name" value="<?= $card['name']?>"></td>
                                <td>
                                    <select name="type">
                                    <option value="0" <?= $card['type'] == 0 ? 'selected' : '' ?>>Rôle</option>
                                    <option value="1" <?= $card['type'] == 1 ? 'selected' : '' ?>>Action</option>
                                    <option value="2" <?= $card['type'] == 2 ? 'selected' : '' ?>>Bonus</option>
                                    </select>
                                </td>
                                <td><textarea name="description"><?= $card['description']?></textarea></td>
                                <td>
                                    <button type="submit" class="edit-btn">Modifier</button>
                                </td>
                            </form>
                            <td>
                                <form method="POST" action="../../routes/cards.php?id=deleteCard" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette carte ?');">
                                    <input type="hidden" name="id" value="<?= $card['id'] ?>">
                                    <button type="submit" class="delete-btn">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <form method="POST" action="../../routes/cards.php?id=addCard" class="form-add" enctype="multipart/form-data">
                <label for="name" class="form-label">Nom de la carte</label>
                <input type="text" name="name" placeholder="Nom de la carte" class="form-input" required>

                <select name="type">
                    <option value="0">Rôle</option>
                    <option value="1">Action</option>
                    <option value="2">Bonus</option>
                </select>
                <br>
                <br>
                <label for="description" class="form-label">Rôle de la carte</label>
                <textarea name="description" placeholder="Rôle de la carte" class="form-textarea" required></textarea>

                <label for="image" class="form-label">Lien de l'image</label>
                <input required type="file" name="image"><br><br>

                <button type="submit" class="form-button">Ajouter la carte</button>
            </form>
        </section>
    </main>
</div>
</body>
</html>