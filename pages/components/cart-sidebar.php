<?php
require_once(__DIR__ . '/../../config/init.php');

?>
<div class="w-1/4 bg-[#FCD3A1] p-6 rounded-lg shadow-lg">
    <h2 class="text-2xl font-bold text-[#00253e] mb-4">Mon Panier</h2>
    <ul id="cart-items" class="space-y-4 text-[#00253e]">
        <!-- Les éléments du panier seront affichés ici via JS -->
    </ul>
    <?php if (isset($_SESSION['user'])): ?>

        <a href="../products/checkout.php" class="block mt-6 bg-[#af2127] text-white py-3 px-6 text-center rounded hover:bg-[#8e1a1e] transition-all duration-300 ease-in-out">

            PAYER

        </a>

    <?php else: ?>

        <a href="../authentification/login.php" onclick="return confirm('Vous devez d\'abord vous connecter. Voulez-vous continuer vers la page de connexion ?');" class="block mt-6 bg-[#af2127] text-white py-3 px-6 text-center rounded hover:bg-[#8e1a1e] transition-all duration-300 ease-in-out">

            PAYER

        </a>

    <?php endif; ?>

</div>

<script src="../../ressources/js/cart.js">

</script>