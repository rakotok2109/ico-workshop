<?php
require_once(__DIR__ . '/../config/init.php');
require_once(__DIR__ . '/components/headerHero.php');

// Vérifie si l'utilisateur est connecté
if (!isset($_SESSION['user'])) {
    header('Location: authentification/login.php');
    exit;
}

// Récupération des informations de l'utilisateur connecté
$user = unserialize($_SESSION['user']);
$userId = $user->getId();

// Récupérer les commandes de l'utilisateur
$orders = OrderController::getOrdersForUser($userId);

// Vérifie si le formulaire de modification a été soumis
// Vérifie si le formulaire a été soumis pour la mise à jour
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupère les nouvelles informations du formulaire
    $name = $_POST['name'];
    $firstname = $_POST['firstname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $location = $_POST['location'];

    // Valide les informations
    

    // Si aucune erreur n'est présente, on met à jour le profil
        $user->setName($name);
        $user->setFirstname($firstname);
        $user->setMail($email);
        $user->setPhone($phone);
        $user->setLocation($location);
        
        // Appel à la méthode de mise à jour
        UserController::update($user);

        
        // Mise à jour de l'utilisateur dans la session après mise à jour dans la base
        $_SESSION['user'] = serialize($user);
        
        // Message de confirmation
        $message = "Profil mis à jour avec succès.";
    } else {
        $message = "Il y a des erreurs dans le formulaire.";
        

    }
   


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes Commandes</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800 font-sans">

    <div class="container mx-auto p-8 flex">
        <!-- Informations utilisateur à gauche -->
        <div class="w-1/3 bg-white shadow-lg rounded-lg p-6 mr-8">
            <h2 class="text-2xl font-bold text-[#3B60BC] mb-4">Mon Profil</h2>

            <!-- Affiche un message de confirmation si la mise à jour est réussie -->
            <?php if (isset($message)): ?>
                <div class="bg-green-500 text-white p-4 rounded mb-4">
                    <?= htmlspecialchars($message); ?>
                </div>
            <?php endif; ?>

            <!-- Formulaire de modification du profil -->
            <form method="POST">
                <div class="mb-4">
                    <label for="name" class="block font-medium">Nom:</label>
                    <input type="text" id="name" name="name" class="w-full p-2 border border-gray-300 rounded-md" value="<?= htmlspecialchars($user->getName()); ?>" required>
                </div>
                
                <div class="mb-4">
                    <label for="firstname" class="block font-medium">Prénom:</label>
                    <input type="text" id="firstname" name="firstname" class="w-full p-2 border border-gray-300 rounded-md" value="<?= htmlspecialchars($user->getFirstname()); ?>" required>
                </div>

                <div class="mb-4">
                    <label for="email" class="block font-medium">Email:</label>
                    <input type="email" id="email" name="email" class="w-full p-2 border border-gray-300 rounded-md" value="<?= htmlspecialchars($user->getMail()); ?>" required>
                </div>

                <div class="mb-4">
                    <label for="phone" class="block font-medium">Téléphone:</label>
                    <input type="text" id="phone" name="phone" class="w-full p-2 border border-gray-300 rounded-md" value="<?= htmlspecialchars($user->getPhone()); ?>" required>
                </div>

                <div class="mb-4">
                    <label for="location" class="block font-medium">Adresse:</label>
                    <input type="text" id="location" name="location" class="w-full p-2 border border-gray-300 rounded-md" value="<?= htmlspecialchars($user->getLocation()); ?>" required>
                </div>

                <div class="mb-4">
                    <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-md">Mettre à jour mes informations</button>
                </div>
            </form>
        </div>
        
        <!-- Liste des commandes à droite -->
        <div class="w-2/3 bg-white shadow-lg rounded-lg p-6">
            <h1 class="text-3xl font-bold text-[#3B60BC] mb-6">Mes Commandes</h1>
            
            <?php  if (empty($orders)): ?>
                <p>Aucune commande trouvée.</p>
            <?php else: ?>
                <?php foreach ($orders as $order): ?>
                    <div class="mb-6 p-4 border-b">
                        <h3 class="text-xl font-semibold">Commande ID: <?= $order->getId(); ?></h3>
                        <p><strong>Date de commande:</strong> <?= $order->getDate(); ?></p>

                        <?php
                        $orderDetails = DetailsOrderController::getDetailsByOrderId($order->getId());
                        if (!empty($orderDetails)): ?>
                            <ul class="mt-4">
                                <?php foreach ($orderDetails as $detail): ?>
                                    <li class="text-sm">
                                        <strong>Produit ID:</strong> <?= $detail->getidProduit(); ?>, 
                                        <strong>Quantité:</strong> <?= $detail->getQuantite(); ?>, 
                                        <strong>Prix:</strong> <?= $detail->getPrix(); ?>€
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php else: ?>
                            <p>Aucun détail de commande trouvé.</p>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>

</body>
</html>
