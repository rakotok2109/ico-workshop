<?php
require_once (dirname(dirname(__DIR__)).'/config/init.php');
if(isset($_SESSION['user'])){
    $user = unserialize($_SESSION['user']);
}

?>
<link rel="stylesheet" href="../ressources/css/navbar.css">
<div class="container-navbar" style="background-color: #3B60BC;">
        <div class="container-logo">
            <a href="../pages/home.php"><img src="../ressources/images/logo.png" alt="logo-ico"></a>
        </div>
        <div class="container-navigation">
            <ul>
                <?php 
                    if(isset($_SESSION['user']) && $user->getRole() > 0){
                    ?>
                    <li><a href="../pages/admin/dashboard.php">Dashboard</a></li>
                 <?php }?>
                <li><a href="../pages/rules.php">Le jeu</a></li>    
                <li><a href="../pages/feedbacks.php">Avis</a></li>
                <li><a href="../pages/faq.php">FAQ</a></li>
                <li><a href="../pages/products/index.php">Acheter</a></li>
               
                    <?php if (isset( $_SESSION['user'])) :
                            $user = unserialize($_SESSION['user']);
                    ?>
                    <div class="sous-container-login">
                        <ul>
                            <li><a  href="../pages/profil.php">
                           
                                <span><?php echo $user->getName();?>  <?php echo $user->getFirstname();?></span>
                            
                            <i class="fas fa-user white"></i>

                                </a></li>
                            <li><a style="color: #FCD3A1;" href="../routes/user.php?id=logout">Déconnexion</a></li>
                        <?php else : ?>
                            <li><a style="color: #FCD3A1;" href="../routes/user.php?id=login">Se connecter</a></li>
                        </ul>
                        <?php endif; ?>
                    </div>
            </ul>
        </div>
    </div>
