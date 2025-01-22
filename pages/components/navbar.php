<?php
require_once (dirname(dirname(__DIR__)).'/config/init.php');

?>

<div class="container-navbar">
        <div class="container-logo">
            <a href="#"><img src="../../ressources/image/ICO_Logo-remove.png" alt="logo-ico"></a>
        </div>
        <div class="container-navigation">
            <ul>
                <li><a href="../DashboardAdminView.php">Dashboard</a></li>
                <li><a href="/">Accueil</a></li>
                <li><a href="avis.php">Avis</a></li>
                <li><a href="faq.php">FAQ</a></li>
                <li><a href="contact.php">contact</a></li>
                <li><a href="/pages/products/">Acheter</a></li>
                <li>
                    <div class="container-login-user">
                        <img src="../../ressources/image/utilisateur.png" alt="logo-utilisateur">
                    </div>
                </li>   
                    <?php if (isset( $_SESSION['user'])) :
                            $user = unserialize($_SESSION['user']);
                    ?>
                    <div class="sous-container-login">
                        <ul>
                            <li><a  href="/pages/account">
                            <!-- <i class="fas fa-user"></i> -->
                                <span><?php echo $user->getName();?>  <?php echo $user->getFirstname();?></span>
                                <!-- <span><?php echo $user->getId();?></span> -->
                            <i class="fas fa-user white"></i>

                                </a></li>
                            <li><a style="color: #FCD3A1;" href="../../routes/user.php?id=logout">Déconnexion</a></li>
                        <?php else : ?>
                            <li><a style="color: #FCD3A1;" href="/pages/authentification/login.php">Se connecter</a></li>
                        </ul>
                        <?php endif; ?>
                    </div>
            </ul>
        </div>
    </div>
