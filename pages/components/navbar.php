<?php
require_once (dirname(dirname(__DIR__)).'/config/init.php');

?>

<head>
<script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="../../ressources/css/navbar.css">
    <link rel="stylesheet" href="../../ressources/css/home.css">
</head>
<div class="container-navbar">
        <div class="container-logo">
            <a href="#"><img src="../../ressources/images/logo.png" alt="logo-ico"></a>
        </div>
        <div class="container-navigation">
            <ul>
                <li><a href="../home.php">Accueil</a></li>
                <li><a href="../pages/jeu/">Le jeu</a></li>
                <li><a href="avis.php">Avis</a></li>
                <li><a href="faq.php">FAQ</a></li>
                <li><a href="contact.php">contact</a></li>
                <li><a href="../pages/products/index.php">Acheter</a></li>
               
                    <?php if (isset( $_SESSION['user'])) :
                            $user = unserialize($_SESSION['user']);
                    ?>
                    <div class="sous-container-login">
                        <ul>
                            <li><a  href="../pages/profile.php">
                           
                                <span><?php echo $user->getName();?>  <?php echo $user->getFirstname();?></span>
                            
                            <i class="fas fa-user white"></i>

                                </a></li>
                            <li><a style="color: #FCD3A1;" href="../../routes/user.php?id=logout">Déconnexion</a></li>
                        <?php else : ?>
                            <li><a style="color: #FCD3A1;" href="../../routes/user.php?id=login">Se connecter</a></li>
                        </ul>
                        <?php endif; ?>
                    </div>
            </ul>
        </div>
    </div>
