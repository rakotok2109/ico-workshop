
<?php
require_once(dirname(__DIR__) . '/../config/init.php');
require_once(dirname(__DIR__).'/../pages/components/header.php');
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

$cartes = CardController::getAllCard();
$orders = DetailsOrderController::getAdminAllOrder();
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
                    <?php if ($superadmin):?>
                        <form method="POST" action="../../routes/user.php?id=updateRole">
                            <input type="hidden" name="id_user" value="<?= $user['id'] ?>">
                            <select name="role">
                                <option value="0" <?= $user['role'] == 0 ? 'selected' : '' ?>>Utilisateur</option>
                                <option value="1" <?= $user['role'] == 1 ? 'selected' : '' ?>>Administrateur</option>
                                <option value="2" <?= $user['role'] == 2 ? 'selected' : '' ?>>Super Administrateur</option>
                            </select>
                            <button type="submit">Changer le rôle</button>
                        </form>
                        <form method="POST" action="../../routes/user.php?id=deleteUser" style="display:inline;" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?');">
                            <input type="hidden" name="id" value="<?= $user['id'] ?>">
                            <button type="submit" style="background-color:red; color:white;">Supprimer l'utilisateur</button>
                        </form>
                    <?php else: ?>
                        <?= $user['role'] == 0 ? 'Utilisateur' : ($user['role'] == 1 ? 'Administrateur' : 'Super Administrateur') ?>
                    <?php endif; ?>
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
                <form method="POST" action="../../routes/product.php?id=updateProduct" style="display:inline;">
                    <input type="hidden" name="id" value="<?= ($product->getId())!==null ? $product->getId() : '' ?>">
                    <td><input type="text" name="name" value="<?= $product->getName()
                     ?>" required></td>
                    <td><input type="number" name="price" value="<?= $product->getPrice() ?>" step="0.01" required></td>
                    <td><textarea name="description"><?= $product->getDescription() ?></textarea></td>
                    <td><input type="text" name="image" value="../../ressources/image/produits/<?= $product->getImage() ?>" required></td>
                    <td><button type="submit">Modifier</button></td>
                </form>
                <td><form method="POST" action="../../routes/product.php?id=deleteProduct" style="display:inline;" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce produit ?');">
                    <input type="hidden" name="id" value="<?= $product->getId() ?>">
                    <button type="submit" style="background-color:red; color:white;">Supprimer le produit</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<form method="POST" action="../../routes/product.php?id=addProduct" enctype="multipart/form-data">
    <input type="text" name="name" placeholder="Nom du produit" required>
    <input type="number" name="price" placeholder="Prix en €" step="0.01" required>
    <textarea name="description" placeholder="Description du produit" required></textarea>
    <input required type="file" name="image"><br><br>

    <!-- <input type="text" name="image" placeholder="Lien de l'image" required> -->
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
                    <form method="POST" action="../../routes/feedback.php?id=deleteFeedback" style="display:inline;" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet avis ?');">
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
                <form method="POST" action="../../routes/news.php?id=updateNews" style="display:inline;">
                    <input type="hidden" name="id" value="<?= isset($newsItem['id']) ? $newsItem['id'] : '' ?>">
                    <td><input type="text" name="title" value="<?= $newsItem['title'] ?>" required></td>
                    <td><input type="text" name="wording" value="<?= $newsItem['wording'] ?>" required></td>
                    <td><input type="date" name="date" value="<?= $newsItem['date'] ?>" required></td>
                    <td><button type="submit">Modifier</button></td>
                </form>
                <td><form method="POST" action="../../routes/news.php?id=deleteNews" style="display:inline;" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet actualité ?');">
                    <input type="hidden" name="id" value="<?= $newsItem['id'] ?>">
                    <button type="submit" style="background-color:red; color:white;">Supprimer l'actualité</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<form method="POST" action="../../routes/news.php?id=addNews">
    <input type="text" name="title" placeholder="Titre de l'actualité" required>
    <textarea name="wording" placeholder="Description de l'article" required></textarea>
    <input type="date" name="date" placeholder="Date" required>
    <button type="submit">Ajouter l'actualité'</button>
</form>

<style>
        
        .tab-container {
            display: flex;
            justify-content: space-around;
            margin-bottom: 20px;
        }

        .tab {
            padding: 10px 20px;
            cursor: pointer;
            background-color: #f0f0f0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .tab.active {
            background-color: #ddd;
            font-weight: bold;
        }

        .tab-content {
            display: none;
        }

        .tab-content.active {
            display: block;
        }

       

    </style>

    <div class="tab-container">
        <div id="add-tab" class="tab active" onclick="switchTab('add')">Ajouter une carte</div>
        <div id="edit-tab" class="tab" onclick="switchTab('edit')">Modifier une carte</div>
    </div>

    
    <div id="add-content" class="tab-content active">
        <h2>Ajouter une nouvelle carte</h2>
        <form method="POST" action="../routes/card.php?id=addCard">
            <label for="type">Type :</label>
            <input type="text" name="type" required><br><br>
            
            <label for="nom">Nom :</label>
            <input type="text" name="nom" required><br><br>
            
            <label for="couleur">Couleur :</label>
            <input type="text" name="couleur" required><br><br>
            
            <label for="dos">Dos :</label>
            <input type="text" name="dos" required><br><br>
            
            <label for="role_de_carte">Rôle de la carte :</label>
            <textarea name="role_de_carte" required></textarea><br><br>
            
            <label for="path">Image (URL) :</label>
            <input type="text" name="path" required><br><br>
            
            <button type="submit">Ajouter la carte</button>
        </form>
    </div>

 
    <div id="edit-content" class="tab-content">
        <h2>Modifier une carte existante</h2>
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Type</th>
                    <th>Nom</th>
                    <th>Couleur</th>
                    <th>Dos</th>
                    <th>Rôle</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cartes as $carte): ?>
                <tr>
                    <form method="POST" action="../routes/card.php?id=updateCard">
                        <input type="hidden" name="id" value="<?= $carte['id'] ?>">
                        <td><?= $carte['id'] ?></td>
                        <td><input type="text" name="type" value="<?= $carte['type'] ?>" required></td>
                        <td><input type="text" name="nom" value="<?= $carte['nom'] ?>" required></td>
                        <td><input type="text" name="couleur" value="<?= $carte['couleur'] ?>" required></td>
                        <td><input type="text" name="dos" value="<?= $carte['dos'] ?>" required></td>
                        <td><textarea name="role_de_carte" required><?= $carte['role_de_carte'] ?></textarea></td>
                        <td><input type="text" name="path" value="<?= $carte['path'] ?>" required></td>
                        <td>
                            <button type="submit">Modifier</button>
                        </td>
                    </form>
                        <td>
                            <form method="POST" action="../routes/card.php?id=deleteCard" style="display:inline;" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet actualité ?');">
                                <input type="hidden" name="id" value="<?= $carte['id'] ?>">
                                <button type="submit" style="background-color:red; color:white;">Supprimer l'actualité</button>
                            </form>
                        </td>
                    </form>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <h3>Commandes</h3>
    <table>
    <tr>
        <th>Id</th>
        <th>Nom</th>
        <th>Prenom</th>
        <th>Email</th>
        <th>ID de commande</th>
        <th>Date</th>
        <th>Ref Produit</th>
        <th>Nom du Produit</th>
        <th>Prix</th>
        <th>Quantité</th>
        <th>Total</th>
    </tr>
    <tbody>
        <?php foreach($orders as $order): ?>
            <tr>
                <td><?= $order['user_id'] ?></td>
                <td><?= $order['user_name'] ?></td>
                <td><?= $order['user_firstname'] ?></td>
                <td><?= $order['user_email'] ?></td>
                <td><?= $order['order_id'] ?></td>
                <td><?= $order['order_date'] ?></td>
                <td><?= $order['product_id'] ?></td>
                <td><?= $order['product_name'] ?></td>
                <td><?= $order['product_price'] ?></td>
                <td><?= $order['product_quantity'] ?></td>
                <td><?= $order['total_amount'] ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>