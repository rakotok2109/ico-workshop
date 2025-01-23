<?php
require_once(__DIR__ . '/../config/init.php');

$orders = OrderController::getAllOrderDetails();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des commandes</title>
    <link rel="stylesheet" href="style.css"> <!-- Vous pouvez ajouter un fichier CSS pour le style -->
</head>
<body>
    <h1>Liste des commandes</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Nom de l'utilisateur</th>
                <th>Prénom de l'utilisateur</th>
                <th>Commande ID</th>
                <th>Nom du produit</th>
                <th>Quantité</th>
                <th>Prix</th>
                <th>Date de la commande</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orders as $order): ?>
                <tr>
                    <td><?php echo htmlspecialchars($order['user_name']); ?></td>
                    <td><?php echo htmlspecialchars($order['user_firstname']); ?></td>
                    <td><?php echo htmlspecialchars($order['order_id']); ?></td>
                    <td><?php echo htmlspecialchars($order['product_name']); ?></td>
                    <td><?php echo htmlspecialchars($order['quantity']); ?></td>
                    <td><?php echo number_format($order['price'], 2, ',', ' ') . ' €'; ?></td>
                    <td><?php echo htmlspecialchars($order['date']); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
