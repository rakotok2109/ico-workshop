<?php
require_once (__DIR__. '/components/headerHero.php');
$news = NewsController::getAllNews();
    $news = array_slice($news, 0, 3);
    ?>
<style>
    h2{
        font-size: 2em;
    }
    .page-du-site {
    position: relative;
    top: 40px;
}

</style>

<div class="page-du-site">      
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
                            <img class="d-block w-100" src="../ressources/image/ICO_Logo-remove.png" alt="<?= htmlspecialchars($item['title']) ?>">
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

    <div class="histoire-du-jeu">
        <h2>Synopsie</h2>
        <span>
            <p>Perdus dans la mer des Caraïbes, nos explorateurs n’ont plus qu’une seule solution afin de rentrer chez eux. Ils doivent récolter les 10 trésors de Barbe Rousse situés sur l’île interdite!!! (woouuuh on a peur)
            Pour mener à bien leur mission, les marins devront démasquer les pirates au sein de leur équipage. Le but des pirates? Empoisonner les marins afin de faire échouer les expéditions vers l’île interdite. Mais attention, des bonus viendront pimenter les débats et compliqueront la tâche des pirates. Serez- vous prêts à braver marées et tempêtes pour vaincre les pirates? Ou bien trahirez-vous vos amis en faisant échouer les marins?</p>
        </span>
    </div>
    <section class="buy-game">
        <div class="buy-container">
            <img src="../ressources\image\produits\jeu_de_carte-removebg-preview.png" alt="Boîte du jeu ICO">
            <div class="buy-info">
                <h2>Procurez-vous ICO dès maintenant !</h2>
                <p>Disponible dès aujourd’hui sur les principales plateformes d'achat en ligne.</p>
                <div class="buy-buttons">
                    <a href="https://www.amazon.fr/dp/B0CF9VJYK4" target="_blank" class="amazon-btn">Acheter sur Amazon</a>
                    <a href="products/index.php" class="site-btn">Acheter sur notre site</a>
                </div>
            </div>
        </div>
    </section>

    <div class="presentation-fondateurs">
        <div class="presentation-fondateur ">
            <div>
                <h2>NOM PRENOM</h2>
            </div>
            <div class="container-gouvernail ">
                <img src="../ressources/image/gouvernail.png" alt="gouvernail">
                <div class="photo-fondateur1">
                    <img src="../ressources/image/chinoise.jpg"alt="photo du fondateur 1">
                </div>
            </div>
            <div class="text-presentation">
                <p>"Je suis ..., co-fondateur d’ICO. Avec ce jeu, nous avons voulu créer une expérience unique où stratégie, rires et imagination se rencontrent. ICO, c’est plus qu’un jeu : c’est une aventure qui rassemble et surprend. Prêt à entrer dans l’univers d’ICO ?"</p>
            </div>
            
        </div>
        <div class="presentation-fondateur">
            <div>
                <h2>NOM PRENOM</h2>
            </div>
            <div class="container-gouvernail">
                <img src="../ressources/image/gouvernail.png" alt="gouvernail">
                <div class="photo-fondateur">
                    <img src="../ressources/image/chinoise.jpg" alt="photo du foncateur 2">
                </div>
            </div>
            <div class="text-presentation">
                <p>"Je suis ..., co-fondateur d’ICO. ICO, c’est un jeu de société pensé pour défier votre esprit et créer des souvenirs mémorables. Entre stratégie et convivialité, chaque partie est une aventure unique. Rejoignez-nous et vivez l’expérience ICO !"</p>
            </div>
        </div>
    </div>
</div>