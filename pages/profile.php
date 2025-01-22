<?php
require_once(__DIR__ . '/../config/init.php');

// Vérifie si l'utilisateur est connecté
if (!isset($_SESSION['user'])) {
    header('Location: authentification/login.php');
    exit;
}

// Récupération des informations de l'utilisateur connecté
$user = unserialize($_SESSION['user']);

// Récupérer l'ID de l'utilisateur à partir de l'objet $user
$userId = $user->getId();

// Récupérer les commandes de l'utilisateur
$orders = OrderController::getOrdersForUser($userId);
var_dump($orders);

// Affichage des commandes
// echo "<h1>Mes Commandes</h1>";

// if (empty($orders)) {
//     echo "<p>Aucune commande trouvée.</p>";
// } else {
//     foreach ($orders as $order) {
//         echo "<h3>Commande ID : " . $order->getId() . "</h3>";
//         echo "<p>Date de commande : " . $order->getDate() . "</p>";
        
//         // Récupérer les détails de la commande
//         $orderDetails = DetailsOrderController::getDetailsByOrderId($order->getId());
        
//         if (!empty($orderDetails)) {
//             echo "<ul>";
//             foreach ($orderDetails as $detail) {
//                 echo "<li>Produit ID : " . $detail->getidProduit() . ", Quantité : " . $detail->getQuantite() . ", Prix : " . $detail->getPrix() . "€</li>";
//             }
//             echo "</ul>";
//         } else {
//             echo "<p>Aucun détail de commande trouvé.</p>";
//         }
//     }
// }
// ?>
