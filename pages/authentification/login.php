<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up | ICO</title>
    <link rel="stylesheet" href="../../ressources/css/login.css">
</head>
<body>
    <header>
        <h1 class="logo">ICO</h1>
    </header>
    <div class="container">
        <div class="image-container">
            <img src="../../ressources/img/img1.png" alt="ICO Image">
        </div>
        <div class="form-container">
            <h2 class="form-title">Sign Up</h2>
            <form action="login.php" method="POST" class="form">
                <label for="nom">Nom :</label>
                <input type="text" id="nom" name="nom" placeholder="Entrer le nom" required>

                <label for="prenom">Prénom :</label>
                <input type="text" id="prenom" name="prenom" placeholder="Entrer le prénom" required>

                <label for="email">Email :</label>
                <input type="email" id="email" name="email" placeholder="Entrer l'Email" required>

                <label for="telephone">Téléphone :</label>
                <input type="text" id="telephone" name="telephone" placeholder="Entrer le téléphone" required>

                <label for="password">Mot de passe :</label>
                <input type="password" id="password" name="password" placeholder="Entrer le mot de passe" required>

                <input type="submit" value="S'inscrire">
            </form>
        </div>
    </div>
</body>
</html>
