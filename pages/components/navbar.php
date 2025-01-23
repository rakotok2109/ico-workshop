<?php
require_once (dirname(dirname(__DIR__)).'/config/init.php');
if(isset($_SESSION['user'])){
$user = unserialize($_SESSION['user']);
}
?>

<div class="container-navbar">
    <div class="container-logo">
        <a href="home.php"><img src="../ressources/image/ICO_Logo-remove.png" alt="logo-ico"></a>
    </div>
    <div class="container-navigation">
        <ul>
            <?php 
                if(isset($_SESSION['user']) && $user->getRole() > 0){
                ?>
            <li><a href="../pages/dashboard.php">Dashboard</a></li>
            <?php }?>
            <li><a href="../pages/avis.php">Avis</a></li>
            <li><a href="../pages/faq.php">FAQ</a></li>
            <li><a href="../pages/contact.php">contact</a></li>
            <li><a href="../pages/products/index.php">Acheter</a></li>  
            <?php if (isset( $_SESSION['user'])) :
                    $user = unserialize($_SESSION['user']);
            ?>
            <li><a href="../../pages/Profile.php"><span><?php echo $user->getName();?>  <?php echo $user->getFirstname();?></span></a></li>
        </ul>
        <div class="sous-container-login">
            <ul> 
                <li><a style="color: #FCD3A1;" href="../routes/user.php?id=logout">Déconnexion</a></li>
                <?php else : ?>
                <li><a style="color: #FCD3A1;" href="../pages/authentification/login.php">Se connecter</a></li>
            
                <?php endif; ?>
                
            </ul>
        </div>
    </div>
</div>
