<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détail du Produit</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#FCD3A1] text-primary font-sans">
    <!-- todo: include header -->

    <div class="container mx-auto p-8 flex">
        <div class="w-3/4 pr-8">
            <?php 
                require_once ($_SERVER['DOCUMENT_ROOT'] . '/config/init.php');
                $id = $_GET['id'] ?? 0;
            
                $product = ProductController::getProduct($id);
                if ($product) { 
            ?>
                <div class="max-w-2xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden">
                    <img src="../../ressources/images/produits/<?php echo $product->getImage() ?>" alt="Produit" class="w-full h-80 object-cover">
                    <div class="p-6">
                        <h2 class="text-3xl font-bold text-[#af2127]"> <?= $product->nom; ?> </h2>
                        <p class="text-gray-600 mt-4"> <?= $product->description; ?> </p>
                        <p class="text-[#af2127] font-semibold text-2xl mt-4"> <?= $product->prix; ?> € </p>
                        
                        <button 
                            class="mt-6 bg-[#00253e] text-white py-3 px-6 rounded hover:bg-[#2A4D8D] transition-all duration-300 ease-in-out hover:shadow-lg" 
                            onclick="addToCart(<?= $product->id; ?>, '<?= $product->nom; ?>', <?= $product->prix; ?>)">
                            Ajouter au panier
                        </button>
                        <a href="/pages/products/" class="block mt-4 text-[#00253e] underline"> ← Retour aux produits</a>
                    </div>
                </div>
            <?php } else { ?>
                <p class="text-center text-red-500 text-2xl">Produit introuvable.</p>
            <?php } ?>
        </div>

        <?php require_once($_SERVER['DOCUMENT_ROOT'] . '/pages/components/cart-sidebar.php'); ?>
    </div>

    <!-- todo: include footer -->

    <script src="/ressources/js/cart.js">
      
    </script>
</body>
</html>
