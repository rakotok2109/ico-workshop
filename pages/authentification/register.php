<?php
require_once(__DIR__ . '/../../config/init.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un compte</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap');
        body {
            font-family: 'Inter', sans-serif;
            background: url('https://source.unsplash.com/random/1920x1080') no-repeat center center fixed;
            background-size: cover;
        }
        .bg-light-blue {
            background-color: #E6F4F1; /* Bleu clair */
        }
        .text-beige {
            color: #F5DEB3; /* Beige */
        }
        .border-strong-red {
            border-color: #FF0000; /* Rouge */
        }
        .bg-strong-red {
            background-color: #FF0000; /* Rouge vif */
        }
        .bg-white-beige {
            background: linear-gradient(120deg, #FFFFFF, #F5DEB3);
        }
    </style>
</head>
<body class="bg-gray-200 text-gray-900"
style="background-image: url('/ressources/images/img2.png');">
>
    <div class="min-h-screen flex items-center justify-center"
    >
        <div class="w-full max-w-md p-8 bg-white-beige rounded-lg shadow-lg">
            <h1 class="text-3xl font-bold text-center text-gray-800 mb-6">Créer un compte</h1>

            <!-- Affichage des erreurs -->
            <?php
            if (isset($_SESSION['inscriptionErreur'])) {
                echo '<div class="bg-red-500 text-white p-4 rounded mb-4">';
                echo '<ul>';
                foreach ($_SESSION['inscriptionErreur'] as $error) {
                    echo '<li>' . $listOfSubscribeErrors[$error] . '</li>';
                }
                echo '</ul>';
                echo '</div>';
            }
            ?>

            <!-- Formulaire -->
            <form action="../../routes/user.php?id=register" method="POST" class="space-y-4">
                <!-- Nom -->
                <div>
                    <label for="nom" class="block text-sm font-medium text-beige">Nom :</label>
                    <input type="text" id="nom" name="nom" placeholder="Entrer votre nom" required
                        class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-strong-red">
                </div>

                <!-- Prénom -->
                <div>
                    <label for="prenom" class="block text-sm font-medium text-beige">Prénom :</label>
                    <input type="text" id="prenom" name="prenom" placeholder="Entrer votre prénom" required
                        class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-strong-red">
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-beige">Email :</label>
                    <input type="email" id="email" name="email" placeholder="Entrer votre email" required
                        class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-strong-red">
                </div>

                <!-- Téléphone -->
                <div>
                    <label for="telephone" class="block text-sm font-medium text-beige">Téléphone :</label>
                    <input type="text" id="telephone" name="telephone" placeholder="Entrer votre numéro de téléphone" required
                        class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-strong-red">
                </div>

                <!-- Mot de passe -->
                <div>
                    <label for="password" class="block text-sm font-medium text-beige">Mot de passe :</label>
                    <input type="password" id="password" name="password" placeholder="Entrer votre mot de passe" required
                        class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-strong-red">
                </div>

                <!-- Adresse -->
                <div>
                    <label for="location" class="block text-sm font-medium text-beige">Adresse :</label>
                    <input type="text" id="location" name="location" placeholder="Entrer votre adresse" required
                        class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-strong-red">
                </div>

                <!-- Bouton de soumission -->
                <div>
                    <button type="submit" class="w-full py-2 bg-strong-red text-white font-semibold rounded hover:bg-opacity-90 transition">
                        Créer un compte
                    </button>
                </div>
            </form>

            <p class="text-center mt-4 text-sm text-gray-600">
                Vous avez déjà un compte ? 
                <a href="login.php" class="text-strong-red font-medium hover:underline">Connectez-vous</a>.
            </p>
        </div>
    </div>
</body>
</html>
