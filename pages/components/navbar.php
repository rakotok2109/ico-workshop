<?php
require_once (__DIR__ . '/../../config/init.php');

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/ressources/css/navbar.css">
    <link rel="stylesheet" href="/ressources/css/all.css">
    <title>Navbar</title>
</head>
<body>
<div class="container-navbar">
        <div class="container-logo">
            <a href="#"><img src="/ressources/image/ICO_Logo.png" alt="logo-ico"></a>
        </div>
        <div class="container-navigation">
            <ul>
                <li><a href="/">Accueil</a></li>
                <li><a href="avis.php">Avis</a></li>
                <li><a href="faq.php">FAQ</a></li>
                <li><a href="contact.php">contact</a></li>
                <li><a href="../../ico-workshop/pages/products/">Acheter</a></li>
                <?php if (isset( $_SESSION['user'])) :
                        $user = unserialize($_SESSION['user']);
                        ?>
                        <li><a  href="../../ico-workshop/pages/profile.php">
                            <!-- <i class="fas fa-user"></i> -->
                             <span><?php echo $user->getName();?>  <?php echo $user->getFirstname();?></span>
                             <!-- <span><?php echo $user->getId();?></span> -->
                            <i class="fas fa-user white"></i>

                            </a></li>
                        <li><a style="color: #FCD3A1;" href="../../routes/user.php?id=logout">Déconnexion</a></li>
                    <?php else : ?>
                        <li><a style="color: #FCD3A1;" href="/pages/authentification/login.php">Se connecter</a></li>
                    <?php endif; ?>
            </ul>
            <!-- <div class="container-login-user">
                <img src="../ressources/image/utilisateur.png" alt="logo-utilisateur">
            </div> -->
        </div>
    </div>
</body>
</html>