<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil ICO</title>
    <link rel="stylesheet" href="../ressources/css/home.css">
</head>
<body>
    <?php
    require_once (__DIR__. '/components/headerHero.php');
    require_once (__DIR__. '/../config/init.php');
    require_once(__DIR__ . '/../config/controller/PDOUtils.php');

    // Récupération des dernières nouveautés depuis la base de données
    $news = NewsController::getAllNews();
    $news = array_slice($news, 0, 3);
    ?>

    <div class="homepage">
        <!-- Section Dernières Nouveautés -->
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
                            <img class="d-block w-100" src="../ressources/images/news-banner.jpg" alt="<?= htmlspecialchars($item['title']) ?>">
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
        <section class="synopsis">
            <h2>Synopsis</h2>
            <p>
                Perdus dans la mer des Caraïbes, nos explorateurs doivent récolter les 10 trésors de Barbe Rousse situés sur l'île interdite.
                Mais attention, des pirates se cachent parmi eux, prêts à tout pour saboter l'expédition. Oserez-vous affronter la tempête ?
            </p>
        </section>

        <!-- Section Achat -->
        <section class="buy-game">
            <div class="buy-container">
                <img src="../ressources/images/jeu_de_carte.png" alt="Boîte du jeu ICO">
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

        <!-- Section Fondateurs -->
        <section class="founders">
            <h2>Les Fondateurs</h2>
            <div class="founders-container">
                <div class="founder">
                    <img src="../ressources/images/chinoise.jpg" alt="Michael Fernandez">
                    <h3>Michael Fernandez</h3>
                    <p>Passionné par la piraterie et le jeu, Michael est l'esprit créatif derrière ICO.</p>
                </div>
                <div class="founder">
                    <img src="../ressources/images/chinoise.jpg" alt="Fabio">
                    <h3>Fabio</h3>
                    <p>Expert en jeux de stratégie, Fabio a contribué au développement des mécaniques du jeu.</p>
                </div>
            </div>
        </section>
    </div>

    <footer>
        <?php require_once (__DIR__. '/components/footer.php');?>
    </footer>
</body>
</html>