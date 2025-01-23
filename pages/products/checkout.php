<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="../../ressources/css/checkout.css">
    <script src="https://js.stripe.com/v3/"></script>
</head>
<?php
require_once(dirname(dirname(__DIR__)) . '/config/init.php');
if (!isset($_SESSION['user']) || empty($_SESSION['user'])) {
    header('Location: ../authentification/login.php');
    exit();
}

$user = unserialize($_SESSION['user']);
?>
<body>
    <header class="navbar">
        <?php include (dirname(__DIR__) . '/components/navbar.php'); ?>
    </header>

    <main class="checkout-container">
        <h1 class="checkout-title">Récapitulatif de votre commande</h1>
        
        <div class="order-summary">
            <table class="order-table">
                <thead>
                    <tr>
                        <th>Produit</th>
                        <th>Prix</th>
                        <th>Quantité</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="cart-summary">
                    <!-- Dynamique JS -->
                </tbody>
            </table>
        </div>

        <div class="checkout-form-container">
            <p class="total-price">Total: <span id="cart-total">0</span> €</p>
            <form id="payment-form" class="checkout-form">
                <div class="input-group">
                    <label for="first-name">Prénom</label>
                    <input id="first-name" name="first_name" type="text" required>
                </div>
                <div class="input-group">
                    <label for="last-name">Nom</label>
                    <input id="last-name" name="last_name" type="text" required>
                </div>
                <div class="input-group">
                    <label for="address">Adresse</label>
                    <input id="address" name="address" type="text" required>
                </div>
                <div id="card-element" class="card-element"></div>
                <button id="submit" class="checkout-button">Payer</button>
                <div id="payment-message" class="error-message"></div>
            </form>
        </div>
    </main>
</body>

<script>
    function displayCartSummary() {
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    let cartSummary = document.getElementById('cart-summary');
    let cartTotal = 0;
    cartSummary.innerHTML = '';

    cart.forEach(item => {
        let itemTotal = item.prix * item.quantite;
        cartTotal += itemTotal;
        cartSummary.innerHTML += `
            <tr class='border border-[#00253e]'>
                <td class='border border-[#00253e] p-4'>${item.nom}</td>
                <td class='border border-[#00253e] p-4'>${item.prix} €</td>
                <td class='border border-[#00253e] p-4'>
                    <button onclick='updateQuantity(${item.id}, -1)' class='bg-[#af2127] text-white px-2 rounded'>-</button>
                    <span class='mx-2'>${item.quantite}</span>
                    <button onclick='updateQuantity(${item.id}, 1)' class='bg-[#00253e] text-white px-2 rounded'>+</button>
                </td>
                <td class='border border-[#00253e] p-4'>${itemTotal} €</td>
                <td class='border border-[#00253e] p-4'>
                    <button onclick='removeFromCart(${item.id})' class='bg-red-500 text-white px-4 py-1 rounded'>Supprimer le produit</button>
                </td>
            </tr>
        `;
    });
    document.getElementById('cart-total').innerText = cartTotal.toFixed(2);
}

function updateQuantity(id, change) {
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    let item = cart.find(p => p.id === id);
    if (item) {
        item.quantite += change;
        if (item.quantite <= 0) {
            cart = cart.filter(p => p.id !== id);
        }
        localStorage.setItem('cart', JSON.stringify(cart));
        displayCartSummary();
    }
}

function removeFromCart(id) {
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    cart = cart.filter(p => p.id !== id);
    localStorage.setItem('cart', JSON.stringify(cart));
    displayCartSummary();
}

// function proceedToPayment() {
//     alert('Redirection vers le paiement...');
//     // Rediriger vers la page de paiement (Stripe par exemple)
//     window.location.href = '/pages/payment.php';
// }

displayCartSummary();

document.addEventListener('DOMContentLoaded', async function () {
    const stripe = Stripe('pk_test_51OHcjUJu8ctDlNibfCdCx1GitmFUxeBsSMhKcJ8rcpv8FFHLzi4DrmvORWZ59znYmXpf4GiQht3UWJFDnZ35aygl00AvFK5UJX');
    const elements = stripe.elements();
    const cardElement = elements.create('card');
    cardElement.mount('#card-element');

    const paymentForm = document.getElementById('payment-form');
    paymentForm.addEventListener('submit', async function (event) {
        event.preventDefault();

        const firstName = document.getElementById('first-name').value;
        const lastName = document.getElementById('last-name').value;
        const address = document.getElementById('address').value;


        const { paymentMethod, error } = await stripe.createPaymentMethod('card', cardElement);

        if (error) {
            document.getElementById('payment-message').textContent = error.message;
            return;
        }

        let cart = JSON.parse(localStorage.getItem('cart')) || [];
        let totalAmount = cart.reduce((sum, item) => sum + item.prix * item.quantite, 0);
        console.log('fetching')
        fetch('../../routes/process_payment.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: new URLSearchParams({
                payment_method_id: paymentMethod.id,
                cart: JSON.stringify(cart),
                totalAmount: totalAmount,
                first_name: firstName,
                last_name: lastName,
                address: address
            })
        })
            .then(response => response.text())
            .then(data => {
                console.log('Réponse brute:', data);
                try {
                    const jsonData = JSON.parse(data);
                    if (jsonData.success) {
                        alert('Paiement réussi !');
                        localStorage.removeItem('cart');
                        window.location.href = 'order_success.php';
                    } else {
                        document.getElementById('payment-message').textContent = jsonData.error;
                    }
                } catch (e) {
                    console.log('Erreur de parsing JSON:', e);
                    document.getElementById('payment-message').textContent = 'Erreur inattendue. Veuillez réessayer.';
                }
            })
            .catch(error => {
                console.log('Erreur:', error);
            });

    });
});
</script>
</html>