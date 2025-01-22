<?php
require_once (__DIR__ . '/../config/init.php');


if (!isset($_SESSION['user'])) {
    header('Location: authentification/login.php');
    exit;
}

$user = unserialize($_SESSION['user']);



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil utilisateur</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
        }
        .profile-container {
            width: 70%;
            padding: 20px;
        }
        .orders-container {
            width: 30%;
            padding: 20px;
            background-color: #f9f9f9;
            border-left: 1px solid #ccc;
        }
        .order {
            border-bottom: 1px solid #ddd;
            padding: 10px 0;
        }
    </style>
</head>
<body>
    <div class="profile-container">
        <h1>Profil utilisateur</h1>
        <p><strong>Nom :</strong> <?php echo htmlspecialchars($user->getName()); ?></p>
        <p><strong>Prénom :</strong> <?php echo htmlspecialchars($user->getFirstname()); ?></p>
        <p><strong>Email :</strong> <?php echo htmlspecialchars($user->getMail()); ?></p>
        <p><strong>Téléphone :</strong> <?php echo htmlspecialchars($user->getPhone()); ?></p>
        <p><strong>Localisation :</strong> <?php echo htmlspecialchars($user->getLocation()); ?></p>
        <p><strong>Rôle :</strong> <?php echo htmlspecialchars($user->getRole()); ?></p>
    </div>
    <form method="post" action="authentification/logout.php">
        <button type="submit" style="margin-top: 20px; padding: 10px 15px; background-color: #f44336; color: white; border: none; border-radius: 5px; cursor: pointer;">
            Déconnexion
        </button>
    </form>

    <div class="orders-container">
        <h2>Vos commandes</h2>
        <?php if (!empty($orders)): ?>
            <?php foreach ($orders as $order): ?>
                <div class="order">
                    <p><strong>Numéro de commande :</strong> <?php echo htmlspecialchars($order['id']); ?></p>
                    <p><strong>Date :</strong> <?php echo htmlspecialchars($order['order_date']); ?></p>
                    <p><strong>Montant :</strong> <?php echo htmlspecialchars($order['total_amount']); ?> &euro;</p>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Aucune commande trouvée.</p>
        <?php endif; ?>
    </div>
</body>
</html>
