

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://js.stripe.com/v3/"></script>
</head>
<body class="bg-[#FCD3A1] text-[#00253e] font-sans">
    <div class="container mx-auto p-8">
        <div class="bg-[#3B60BC] sticky">
        <?php include (dirname(__DIR__) . '/components/navbar.php'); ?>


        </div>
        <h1 class="text-3xl font-bold text-center mb-8">Récapitulatif de votre commande</h1>
        
        <div class="bg-white shadow-lg rounded-lg p-6">
            <table class="w-full border-collapse border border-[#00253e]">
                <thead>
                    <tr class="bg-[#00253e] text-white">
                        <th class="border border-[#00253e] p-4">Produit</th>
                        <th class="border border-[#00253e] p-4">Prix</th>
                        <th class="border border-[#00253e] p-4">Quantité</th>
                        <th class="border border-[#00253e] p-4">Total</th>
                        <th class="border border-[#00253e] p-4">Actions</th>
                    </tr>
                </thead>
                <tbody id="cart-summary">
                    <!-- Les articles du panier s'afficheront ici via JS -->
                </tbody>
            </table>
        </div>

        <div class="mt-8 text-right">

        <p class="text-xl font-semibold">Total: <span id="cart-total">0</span> €</p>
        <form id="payment-form">
    <div class="mb-4">
        <label for="first-name" class="block text-sm font-medium">Prénom</label>
        <input id="first-name" name="first_name" type="text" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded" required>
    </div>
    <div class="mb-4">
        <label for="last-name" class="block text-sm font-medium">Nom</label>
        <input id="last-name" name="last_name" type="text" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded" required>
    </div>
    <div class="mb-4">
        <label for="address" class="block text-sm font-medium">Adresse</label>
        <input id="address" name="address" type="text" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded" required>
    </div>
    <div id="card-element" class="mb-4 p-4 border border-gray-300 rounded"></div>
    <button id="submit" class="bg-[#00253e] text-white px-6 py-2 rounded hover:bg-[#af2127]">Payer</button>
    <div id="payment-message" class="mt-4 text-red-500"></div>
</form>


            
        </div>
      

    </div>

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
                            <button onclick='removeFromCart(${item.id})' class='bg-red-500 text-white px-4 py-1 rounded'>Supprimer</button>
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
    </script>
    <script>
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
            fetch('../../routes/payment/process_payment.php', {
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
.then(response => {
    return response.json();  // Ajoute return ici pour résoudre la promesse correctement
})
.then(data => {
    console.log('Réponse brute:', data); 
    if (data.success) {
        alert('Paiement réussi !');
        localStorage.removeItem('cart');
        window.location.href = 'order_success.php';
    } else {
        document.getElementById('payment-message').textContent = data.error;
    }
})
.catch(error => {
    console.log('Erreur:', error);
});

        });
    });
</script>

</body>
</html>
