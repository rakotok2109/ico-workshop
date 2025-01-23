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
<body class="bg-gray-900 text-gray-100">
    <div class="relative min-h-screen flex items-center justify-center bg-cover bg-center" 
         style="background-image: url('/ressources/images/img2.png');">
        <div class="absolute inset-0 bg-black bg-opacity-60"></div>

        <div class="relative z-10 text-center px-8 py-12 max-w-2xl">
            <h1 class="text-4xl md:text-6xl font-bold text-blue-200">Se connecter</h1>

            <div class="mt-6 bg-white bg-opacity-90 p-8 rounded-lg shadow-lg text-left">
                <form action="../../routes/user.php?id=login" method="POST" class="space-y-4">
                    <div>
                        <label for="email" class="block text-sm font-medium text-beige-500">Email :</label>
                        <input type="email" id="email" name="email" placeholder="Entrer l'Email" required
                            class="w-full px-4 py-2 bg-gray-200 text-gray-900 rounded border border-beige-400 focus:outline-none focus:ring-2 focus:ring-blue-300">
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-beige-500">Mot de passe :</label>
                        <input type="password" id="password" name="password" placeholder="Entrer le mot de passe" required
                            class="w-full px-4 py-2 bg-gray-200 text-gray-900 rounded border border-beige-400 focus:outline-none focus:ring-2 focus:ring-blue-300">
                    </div>

                    <div>
                        <input type="submit" value="Se connecter" 
                            class="w-full px-4 py-2 bg-blue-600 text-white rounded font-semibold hover:bg-blue-700 transition">
                    </div>
                </form>

                <div class="mt-4 text-center">
                    <a href="register.php" class="text-blue-500 hover:underline">Créer un compte</a>
                </div>
            </div>
        </div>
    </div>

    <footer class="bg-gray-800 text-gray-400 text-center py-4">
        <p>&copy; 2025 Votre Entreprise. Tous droits réservés.</p>
    </footer>
</body>
</html>
