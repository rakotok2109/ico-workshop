<?php
require_once(dirname(dirname(__DIR__)) . '/config/init.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up | ICO</title>
    <link rel="stylesheet" href="../../ressources/css/register.css">
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_GOOGLE_MAPS_API_KEY&libraries=places"></script>
</head>
<body>
    <header>
        <?php include (dirname(__DIR__) . '/components/navbar.php'); ?>
    </header>
    
    <div class="register-container">
        <div class="register-content">
            <div class="register-image">
                <img src="../../ressources/images/logo.png" alt="ICO Image">
            </div>

            <div class="register-form">
                <h1 class="register-title">Bienvenue sur <span>ICO</span></h1>
                <h2 class="register-subtitle">Créer un compte</h2>

                <?php if (isset($_SESSION['inscriptionErreur'])): ?>
                    <div class="error-message">
                        <ul>
                            <?php foreach ($_SESSION['inscriptionErreur'] as $error): ?>
                                <li><?= $listOfSubscribeErrors[$error]; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <form action="../../routes/user.php?id=register" method="POST">
                    <div class="input-group">
                        <label for="name">Nom :</label>
                        <input type="text" id="name" name="name" placeholder="Entrer le nom" required>
                    </div>

                    <div class="input-group">
                        <label for="firstname">Prénom :</label>
                        <input type="text" id="firstname" name="firstname" placeholder="Entrer le prénom" required>
                    </div>

                    <div class="input-group">
                        <label for="mail">Email :</label>
                        <input type="email" id="mail" name="mail" placeholder="Entrer l'Email" required>
                    </div>

                    <div class="input-group">
                        <label for="phone">Téléphone :</label>
                        <input type="number" id="phone" name="phone" placeholder="Entrer le téléphone" required>
                    </div>

                    <div class="input-group">
                        <label for="password">Mot de passe :</label>
                        <input type="password" id="password" name="password" placeholder="Entrer le mot de passe" required>
                    </div>

                    <div class="input-group">
                        <label for="location">Adresse :</label>
                        <input type="text" id="location" name="location" placeholder="Entrer l'adresse" required>
                    </div>

                    <button type="submit" class="register-btn">S'inscrire</button>
                </form>

                <div class="register-footer">
                    <a href="login.php"><button class="link-btn">Se connecter</button></a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
