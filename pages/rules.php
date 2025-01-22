<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Règles du Jeu</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .perspective {
    perspective: 1000px; /* Ajoute de la perspective pour l'effet 3D */
}

.card {
    transform-style: preserve-3d; /* Préserve la 3D */
}

.backface-hidden {
    backface-visibility: hidden; /* Cache l'arrière lorsque non visible */
}

.rotate-y-180 {
    transform: rotateY(180deg); /* Retourne l'arrière */
}
    </style>
</head>
<body class="bg-gray-100 text-gray-900 font-sans">

    <div class="max-w-4xl mx-auto p-6 bg-white shadow-lg mt-10 rounded-lg">
        <h1 class="text-4xl font-bold text-center text-[#af2127] mb-6">Règles du Jeu</h1>

        <h2 class="text-2xl font-semibold text-[#00253e] mt-4">Objectif du jeu</h2>
        <p class="mt-2 text-gray-700 leading-relaxed">
            L'objectif du jeu est de se débarrasser de toutes ses cartes avant ses adversaires tout en respectant les règles de pose des cartes spéciales.
        </p>

        <h2 class="text-2xl font-semibold text-[#00253e] mt-6">Matériel</h2>
        <ul class="mt-2 list-disc pl-5 text-gray-700">
            <li>Élément 1 du matériel</li>
            <li>Élément 2 du matériel</li>
            <li>Élément 3 du matériel</li>
        </ul>

        <h2 class="text-2xl font-semibold text-[#00253e] mt-6">Déroulement du jeu</h2>
        <p class="mt-2 text-gray-700 leading-relaxed">
            Chaque joueur reçoit 7 cartes. Le reste forme la pioche. À chaque tour, un joueur doit poser une carte correspondant en couleur ou en valeur à la carte de la pile centrale.
        </p>

        <h2 class="text-2xl font-semibold text-[#00253e] mt-6">Conditions de victoire</h2>
        <p class="mt-2 text-gray-700 leading-relaxed">
            Le premier joueur à ne plus avoir de cartes en main gagne la partie. Un système de points peut être utilisé pour désigner un vainqueur après plusieurs manches.
        </p>

        <h2 class="text-2xl font-semibold text-[#00253e] mt-6">Types de cartes et leurs rôles</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
            
        <div class="bg-gray-50 p-4 rounded-lg shadow-md flex items-center">
    <div class="relative perspective">
        <div class="card w-20 h-20 transition-transform duration-700 transform-style-preserve-3d hover:rotate-y-180">
            <div class="absolute w-full h-full backface-hidden">
                <img src="images/plus2.png" alt="Carte +2" class="object-cover rounded-md">
            </div>
            <div class="absolute w-full h-full backface-hidden rotate-y-180">
                <img src="images/plus2-back.png" alt="Carte +2 - arrière" class="object-cover rounded-md">
            </div>
        </div>
        <div class="mt-4">
            <h3 class="text-lg font-semibold text-[#00253e]">Carte +2</h3>
            <p class="text-gray-700">Fait piocher 2 cartes au joueur suivant et lui fait perdre son tour.</p>
        </div>
    </div>
</div>

            <div class="bg-gray-50 p-4 rounded-lg shadow-md flex items-center">
                <img src="images/plus4.png" alt="Carte +4" class="w-20 h-20 object-cover rounded-md mr-4">
                <div>
                    <h3 class="text-lg font-semibold text-[#00253e]">Carte +4</h3>
                    <p class="text-gray-700">Fait piocher 4 cartes au joueur suivant et permet de changer de couleur.</p>
                </div>
            </div>

            <div class="bg-gray-50 p-4 rounded-lg shadow-md flex items-center">
                <img src="images/inverse.png" alt="Carte Inversion" class="w-20 h-20 object-cover rounded-md mr-4">
                <div>
                    <h3 class="text-lg font-semibold text-[#00253e]">Carte Inversion</h3>
                    <p class="text-gray-700">Inverse le sens du jeu dans le sens opposé.</p>
                </div>
            </div>

            <div class="bg-gray-50 p-4 rounded-lg shadow-md flex items-center">
                <img src="images/skip.png" alt="Carte Passe ton tour" class="w-20 h-20 object-cover rounded-md mr-4">
                <div>
                    <h3 class="text-lg font-semibold text-[#00253e]">Carte Passe ton tour</h3>
                    <p class="text-gray-700">Fait sauter le tour du joueur suivant.</p>
                </div>
            </div>

            <div class="bg-gray-50 p-4 rounded-lg shadow-md flex items-center">
                <img src="images/wild.png" alt="Carte Joker" class="w-20 h-20 object-cover rounded-md mr-4">
                <div>
                    <h3 class="text-lg font-semibold text-[#00253e]">Carte Joker</h3>
                    <p class="text-gray-700">Permet de choisir la couleur de la pile de défausse.</p>
                </div>
            </div>

        </div>
        <h2 class="text-2xl font-semibold text-[#00253e] mt-6">Astuces et stratégies</h2>
        <p class="mt-2 text-gray-700 leading-relaxed">
            Cras mattis consectetur purus sit amet fermentum. Nullam id dolor id nibh ultricies vehicula ut id elit.
        </p>

        <div class="text-center mt-8">
            <a href="index.html" class="px-6 py-2 bg-[#00253e] text-white rounded hover:bg-[#af2127] transition duration-300">Retour à l'accueil</a>
        </div>
    </div>

</body>
</html>
