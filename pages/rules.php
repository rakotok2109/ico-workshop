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
        <p>
            Quelque part en pleine Mer, un groupe de Marins est chargé de transporter un Trésor, mais des pirates ont peut-être infiltré leur équipage afini de le voler.
         <strong>

            <i>
                Entre tempête, mal de mer, sirènes, trahisons et autres dangers, le trésor arrivera-t-il à bon port?
            </i>

         </strong>
        </p>

        <h2 class="text-2xl font-semibold text-[#00253e] mt-4">Objectif du jeu</h2>
        <ul>
            <li>
                <p class="mt-2 text-gray-700 leading-relaxed">
                    <strong>Pour les marins et la sirène:</strong>Identifier les pirates afin de choisir le bon équipage, pour pouvoir mettre le trésor en lieu sûr.
                </p>
            </li>
            <li>
                <p class="mt-2 text-gray-700 leading-relaxed">
                    <strong>Pour les pirates:</strong>Gagner la confiance des Marins et les empoisonner afin de voler le trésor.
                </p>
           </li>
        </ul>
       

        
        <div class="max-w-4xl mx-auto p-6 bg-white shadow-lg mt-10 rounded-lg">
    <h2 class="text-2xl font-semibold text-[#00253e] mt-6">Matériel</h2>
    <p class="mt-2 text-gray-700 leading-relaxed">
    Le jeu de cartes comprend 52 dont deux cartes "règle du jeu" cartes réparties comme suit:
    </p>
    <div class="grid grid-cols-3 gap-4 mt-4 text-center">
        <div class="bg-gray-50 p-4 rounded-lg shadow-md">
            <h3 class="text-lg font-semibold text-[#00253e]">10 Marins</h3>
        </div>
        <div class="bg-gray-50 p-4 rounded-lg shadow-md">
            <h3 class="text-lg font-semibold text-[#00253e]">9 Pirates</h3>
        </div>
        <div class="bg-gray-50 p-4 rounded-lg shadow-md">
            <h3 class="text-lg font-semibold text-[#00253e]">1 Sirène</h3>
        </div>
        <div class="bg-gray-50 p-4 rounded-lg shadow-md">
            <h3 class="text-lg font-semibold text-[#00253e]">6 Îles</h3>
        </div>
        <div class="bg-gray-50 p-4 rounded-lg shadow-md">
            <h3 class="text-lg font-semibold text-[#00253e]">6 Poisons</h3>
        </div>
        <div class="bg-gray-50 p-4 rounded-lg shadow-md">
            <h3 class="text-lg font-semibold text-[#00253e]">1 Antidote</h3>
        </div>
        <div class="bg-gray-50 p-4 rounded-lg shadow-md">
            <h3 class="text-lg font-semibold text-[#00253e]">1 Voyage express</h3>
        </div>
        <div class="bg-gray-50 p-4 rounded-lg shadow-md">
            <h3 class="text-lg font-semibold text-[#00253e]">1 Mal de mer</h3>
        </div>
        <div class="bg-gray-50 p-4 rounded-lg shadow-md">
            <h3 class="text-lg font-semibold text-[#00253e]">1 Perroquet</h3>
        </div>
        <div class="bg-gray-50 p-4 rounded-lg shadow-md">
            <h3 class="text-lg font-semibold text-[#00253e]">1 Troc</h3>
        </div>
        <div class="bg-gray-50 p-4 rounded-lg shadow-md">
            <h3 class="text-lg font-semibold text-[#00253e]">1 Observateur</h3>
        </div>
        <div class="bg-gray-50 p-4 rounded-lg shadow-md">
            <h3 class="text-lg font-semibold text-[#00253e]">1 Malédiction</h3>
        </div>
        <div class="bg-gray-50 p-4 rounded-lg shadow-md">
            <h3 class="text-lg font-semibold text-[#00253e]">1 Charlatan</h3>
        </div>
        <div class="bg-gray-50 p-4 rounded-lg shadow-md">
            <h3 class="text-lg font-semibold text-[#00253e]">1 Méduse</h3>
        </div>
        <div class="bg-gray-50 p-4 rounded-lg shadow-md">
            <h3 class="text-lg font-semibold text-[#00253e]">1 Mer agitée</h3>
        </div>
    </div>
</div>

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
