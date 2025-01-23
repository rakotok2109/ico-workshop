<?php
require_once (__DIR__. '/components/headerHero.php');
require_once (__DIR__. '/../config/init.php');
require_once(__DIR__ . '/../config/controller/PDOUtils.php');

// Récupération des dernières nouveautés depuis la base de données
$news = NewsController::getAllNews();
// Retenir les trois derniers articles 
$news = array_slice($news, 0, 3); 

?> 

<div class="page-du-site bg-[#FCD3A1] text-gray-900 font-[Filson Pro]">



    <!-- Section Dernières nouveautés -->
    <div class="container mx-auto py-16 px-8">
        <h2 class="text-4xl font-[Chaloops] text-center text-[#3B60BC]">Les dernières nouveautés</h2>
        <div id="carouselExampleIndicators" class="carousel slide mt-8" data-ride="carousel">
            <ol class="carousel-indicators">
                <?php foreach ($news as $index => $item): ?>
                    <li data-target="#carouselExampleIndicators" data-slide-to="<?= $index ?>" class="<?= $index == 0 ? 'active' : '' ?>"></li>
                <?php endforeach; ?>
            </ol>
            <div class="carousel-inner">
                <?php foreach ($news as $index => $item): ?>
                    <div class="carousel-item <?= $index == 0 ? 'active' : '' ?>">
                        <img class="d-block w-100" src="../ressources/image/gouvernail.png" alt="<?= htmlspecialchars($item['title']) ?>">
                        <div class="carousel-caption d-none d-md-block bg-black bg-opacity-50 p-4 rounded">
                            <h5><?= htmlspecialchars($item['title']) ?></h5>
                            <p><?= htmlspecialchars($item['wording'] ?? 'Description non disponible') ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
            </a>
        </div>
    </div>

    <!-- Section Synopsis -->
    <div class="container mx-auto py-16 px-8 bg-[#3B60BC] text-white rounded-lg shadow-lg">
        <h2 class="text-4xl font-[Chaloops] text-center">Synopsis</h2>
        <p class="mt-4 text-lg text-center justify-center leading-relaxed">
            Perdus dans la mer des Caraïbes, nos explorateurs doivent récolter les 10 trésors de Barbe Rousse situés sur l'île interdite. 
            Mais attention, des pirates se cachent parmi eux, prêts à tout pour saboter l'expédition. Oserez-vous affronter la tempête ?
        </p>
    </div>

       <!-- Section Achat du jeu -->
<div class="mt-10 container mx-auto py-16 px-8 flex flex-col md:flex-row items-center bg-[#FCD3A1] text-gray-900 rounded-lg shadow-lg">
    <!-- Image du jeu -->
    <div class="md:w-1/2 w-full flex justify-center">
        <img src="../ressources/image/jeu_de_carte.png" alt="Boîte du jeu ICO" class="max-w-xs md:max-w-md rounded-lg shadow-lg">
    </div>
    <!-- Boutons d'achat -->
    <div class="md:w-1/2 w-full text-center md:text-left mt-8 md:mt-0">
        <h2 class="text-4xl font-[Chaloops] text-[#3B60BC] text-center md:text-left">Procurez-vous ICO dès maintenant !</h2>
        <p class="mt-4 text-lg leading-relaxed text-center md:text-left">
            Disponible dès aujourd’hui sur les principales plateformes d'achat en ligne.
        </p>
        <div class="mt-6 flex flex-col md:flex-row justify-center md:justify-center gap-4">
            <a href="https://www.amazon.fr/dp/B0CF9VJYK4" target="_blank" 
               class="px-6 py-3 bg-yellow-500 text-gray-900 rounded-lg font-bold shadow-md hover:bg-yellow-600 transition-all">
                Acheter sur Amazon
            </a>
            <a href="/pages/products/" 
               class="px-6 py-3 bg-green-500 text-white rounded-lg font-bold shadow-md hover:bg-green-600 transition-all">
                Acheter sur notre site
            </a>
        </div>
    </div>
</div>



    <!-- Section Présentation des fondateurs -->
    <div class="container mx-auto py-16 px-8">
        <h2 class="text-4xl font-[Chaloops] text-center text-[#EF4B4B]">Les Fondateurs</h2>
        <div class="flex flex-wrap justify-center mt-8">
            <div class="w-full md:w-1/2 lg:w-1/3 p-4">
                <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                    <img src="../ressources/image/chinoise.jpg" alt="Fondateur 1" class="w-full h-64 object-cover">
                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-[#FBC434]">Michael Fernandez</h3>
                        <p class="mt-2 text-gray-600">Passionné par la piraterie et le jeu, Michael est l'esprit créatif derrière ICO.</p>
                    </div>
                </div>
            </div>
            <div class="w-full md:w-1/2 lg:w-1/3 p-4">
                <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                    <img src="../ressources/image/chinoise.jpg" alt="Fondateur 2" class="w-full h-64 object-cover">
                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-[#FBC434]">Fabio</h3>
                        <p class="mt-2 text-gray-600">Expert en jeux de stratégie, Fabio a contribué au développement des mécaniques du jeu.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
