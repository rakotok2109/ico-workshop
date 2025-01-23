<?php
require_once(dirname(dirname(__DIR__)) . '/config/init.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Se connecter</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body>

    <header>
        <?php include (dirname(__DIR__) . '/components/navbar.php'); ?>
    </header>

    <div class="login-container">
        <div class="login-content">
            <div class="login-image">
                <img src="../../ressources/images/logo.png" alt="ICO Image">
            </div>

            <div class="login-form">
                <h1 class="login-title">Bienvenue sur <span>ICO</span></h1>
                <h2 class="login-subtitle">Connexion</h2>

                <?php if (isset($error)): ?>
                    <p class="error-message"><?php echo $error; ?></p>
                <?php endif; ?>

                <form action="../../routes/user.php?id=login" method="POST">
                    <div class="input-group">
                        <label for="mail">Email :</label>
                        <input type="email" id="mail" name="mail" placeholder="Entrer l'Email" required>
                    </div>
                    
                    <div class="input-group">
                        <label for="password">Mot de passe :</label>
                        <input type="password" id="password" name="password" placeholder="Entrer le mot de passe" required>
                    </div>

                    <button type="submit" class="login-btn">Se connecter</button>
                </form>

                <div class="login-footer">
                    <a href="register.php"><button class="link-btn">Créer un compte</button></a>
                    <a href="register.php"><button class="link-btn">Mot de passe oublié ?</button></a>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
