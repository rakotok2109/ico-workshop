<?php
require_once (dirname(dirname(__DIR__)).'/config/init.php');
if(isset($_SESSION['user'])){
$user = unserialize($_SESSION['user']);
}
?>

<head>
<script src="https://cdn.tailwindcss.com"></script>
<script src="https://kit.fontawesome.com/5563162149.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../ressources/css/navbar.css">
    <link rel="stylesheet" href="/ressources/css/home.css">
</head>
<div class="container-navbar">
        <div class="container-logo">
            <a href="#"><img src="/ressources/image/ICO_Logo-remove.png" alt="logo-ico"></a>
        </div>
        <div class="container-navigation">
            <ul>
            <?php if (isset( $_SESSION['user'])) :
                            $user = unserialize($_SESSION['user']);
                            if($user->getRole() >= 1) :

                    ?>
                    <li><a href="/pages/admin/dashboard.php">Dashboard</a></li>
                       
                        <?php
                    endif;
                    endif; ?>
                <!-- <li><a href="DashboardAdminView.php">Dashboard</a></li> -->
                <li><a href="/">Accueil</a></li>
                <li><a href="/pages/jeu/">Le Jeu</a></li>

                <li><a href="avis.php">Avis</a></li>
                <li><a href="faq.php">FAQ</a></li>
                <!-- <li><a href="contact.php">contact</a></li> -->
                <li><a href="/pages/products/">Acheter</a></li>
                    <?php if (isset( $_SESSION['user'])) :
                            $user = unserialize($_SESSION['user']);
                    ?>
                    <li class="dropdown">
                        <a href="#" class="dropbtn">
                            <i class="fas fa-user white"></i>
                            <span><?php echo $user->getName();?> <?php echo $user->getFirstname();?></span>
                        </a>
                        <div class="dropdown-content">
                            <a href="../../pages/profile.php">Profil</a>
                            <a href="../../pages/products/checkout.php">Panier</a>
                            <a style="color: #FCD3A1;" href="../../routes/user.php?id=logout">Déconnexion</a>
                        </div>
                    </li>
                    <?php else : ?>
                        <li><a style="color: #FCD3A1;" href="../../pages/authentification/login.php">Se connecter</a></li>
                    <?php endif; ?>
            </ul>
        </div>
    </div>
</div>
