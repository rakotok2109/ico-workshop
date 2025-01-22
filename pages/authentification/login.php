<?php
require_once (__DIR__ . '/../../config/init.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | ICO</title>
    <link rel="stylesheet" href="../../ressources/css/login.css">
</head>
<body>

    <header>

    </header>
    <div class="container">
        <div class="image-container">
            <img src="/ressources/image/img1.png" alt="ICO Image">
        </div>
        <div class="form-container">
            <h1 class="form-title">Bienvenue sur</h1>
            <h1 class="form-title logo">ICO</h1>
                   

            <h2 class="form-title">Connexion</h2>
            
            <?php if (isset($error)) : ?>
                <p style="color: red; text-align: center;"><?php echo $error; ?></p>
            <?php endif; ?>

            <form action="../../routes/user.php?id=login" method="POST" class="form">
                <label for="email">Email :</label>
                <input type="email" id="email" name="email" placeholder="Entrer l'Email" required>

                <label for="password">Mot de passe :</label>
                <input type="password" id="password" name="password" placeholder="Entrer le mot de passe" required>

                <input style="background-color:red;" type="submit" value="Se connecter">
            </form>
            <div class="form-footer">
                <a href="register.php"><button>Créer un compte</button></a>
                <a href="register.php"><button>Mot de passe oublié ? </button></a>

            </div>
        </div>
    </div>
</body>
</html>
