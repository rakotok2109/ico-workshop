<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Règles du Jeu</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="../ressources/js/script.js"></script>
    <style>
        body {
            background-color: #ecba75;
        }
        .perspective {
            perspective: 1000px;
        }

        .card {
            transform-style: preserve-3d;
            transition: transform 0.7s ease-in-out;
            position: relative;
            width: 100%;
            height: 100%;
        }

        .card:hover {
            transform: rotateY(180deg);
        }

        .backface-hidden {
            backface-visibility: hidden;
            position: absolute;
            width: 100%;
            height: 100%;
        }

        .rotate-y-180 {
            transform: rotateY(180deg);
        }
        .active-tab {
            background-color: #f5deb3 !important; /* Couleur beige */
         
        }
    </style>
</head>

<body class="bg-[#ecba75] text-gray-900 font-sans">
<?php include(__DIR__ . '/components/navbar.php') ?>


<!-- Tabs -->
<div class="flex justify-center mt-12">
    <a href="#rules" onclick="showSectionRules('rules')"><button id="tab-rules"  class="tab-button px-4 py-2 mx-2 bg-[#00253e] text-white rounded hover:bg-[#af2127]">Règles du jeu</button></a>
    <a href="#cards" onclick="showSectionRules('cards')"><button id="tab-cards"  class="tab-button px-4 py-2 mx-2 bg-[#00253e] text-white rounded hover:bg-[#af2127]">Cartes</button></a>
</div>


<section id="rules" class="rules-section">
    <div class="max-w-6xl mx-auto p-6 bg-white shadow-lg mt-10 rounded-lg">
        <h1 class="text-4xl font-bold text-center text-[#af2127] mb-6">Règles du Jeu</h1>
        <!-- Intro -->
        <p>
            Quelque part en pleine Mer, un groupe de Marins est chargé de transporter un Trésor, mais des pirates ont peut-être infiltré leur équipage afini de le voler.
            <strong>
                <i>Entre tempête, mal de mer, sirènes, trahisons et autres dangers, le trésor arrivera-t-il à bon port?</i>
            </strong>
        </p>
        <!-- Objectif -->
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


        <!-- Materiel  -->
        <div class="max-w-5xl mx-auto p-6 bg-white shadow-lg mt-10 rounded-lg">
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
        <!-- Distributon des cartes -->
        <div class="max-w-5xl mx-auto p-6 bg-white shadow-lg mt-10 rounded-lg">
            <h2 class="text-2xl font-semibold text-[#00253e] mb-4">Distributions des cartes</h2>
            <div class="grid grid-cols-4 gap-4 text-center">
                <!-- En-têtes -->
                <div class="font-bold">JOUEURS</div>
                <div class="font-bold">PIRATES</div>
                <div class="font-bold">MARINS</div>
                <div class="font-bold">SIRÈNE</div>

                <!-- Lignes de données -->
                <div>7</div><div>3</div><div>3</div><div>1</div>
                <div>8</div><div>3</div><div>4</div><div>1</div>
                <div>9</div><div>4</div><div>4</div><div>1</div>
                <div>10</div><div>4</div><div>5</div><div>1</div>
                <div>11</div><div>5</div><div>5</div><div>1</div>
                <div>12</div><div>5</div><div>6</div><div>1</div>
                <div>13</div><div>6</div><div>6</div><div>1</div>
                <div>14</div><div>6</div><div>7</div><div>1</div>
                <div>15</div><div>7</div><div>7</div><div>1</div>
                <div>16</div><div>7</div><div>8</div><div>1</div>
                <div>17</div><div>8</div><div>8</div><div>1</div>
                <div>18</div><div>8</div><div>9</div><div>1</div>
                <div>19</div><div>9</div><div>9</div><div>1</div>
                <div>20</div><div>9</div><div>10</div><div>1</div>
            </div>
        </div>
        
        <!-- Déroulement d'une partie -->
        <div class="max-w-5xl mx-auto p-6 bg-white shadow-lg mt-10 rounded-lg">
            <h2 class="text-3xl font-bold text-center text-[#af2127] mb-6">Déroulement d’une partie</h2>
            <!-- Mise en place -->
            <div class="mb-6">
                <h3 class="text-2xl font-semibold text-[#00253e] mb-2">Mise en place</h3>
                <p class="text-gray-700 leading-relaxed">
                    Les joueurs désignent ou tirent au sort le capitaine, il dirigera le début de la partie et jouera également.
                    Le capitaine distribue à chaque joueur une carte rôle et une carte bonus. Chaque joueur regarde discrètement son rôle et sa carte bonus puis repose ses cartes face cachées devant lui.
                </p>
                <p class="text-gray-700 leading-relaxed mt-2">
                    Le capitaine demande aux joueurs de fermer les yeux. Tous les joueurs baissent la tête et ferment les yeux (le capitaine aussi). Puis il appelle les pirates et la sirène à ouvrir les yeux (le capitaine ouvrira les yeux s’il a un de ses rôles) et leur laisse suffisamment de temps pour se regarder.
                </p>
                <p class="text-gray-700 leading-relaxed mt-2">
                    Il demande à tout le monde de fermer les yeux. Et pour finir il va demander à tout le monde de réouvrir les yeux.
                </p>
                <p class="text-red-500 font-semibold mt-2">
                    Attention : Vous ne fermerez plus les yeux par la suite, retenez bien qui a ouvert les yeux.
                </p>
            </div>

            <!-- Premier voyage -->
            <div class="mb-6">
                <h3 class="text-2xl font-semibold text-[#00253e] mb-2">Premier voyage</h3>
                <p class="text-gray-700 leading-relaxed">
                    Le capitaine choisit un équipage de trois personnes (dont il peut faire partie), il faut maintenant donner une carte poison et une carte île à chaque personne de l’équipage.
                </p>
                <p class="text-gray-700 leading-relaxed mt-2">
                    Chaque participant choisit la carte qu’il veut poser et la met au milieu en face cachée, il place la carte non utilisée devant lui, toujours en face cachée.
                </p>
                <p class="text-gray-700 leading-relaxed mt-2">
                    Un joueur mélange les cartes mises en jeu et les retourne. S’il y a au moins une carte poison, les pirates marquent un point, s’il y a trois cartes îles, ce sont les marins et la sirène qui remportent le point.
                </p>
                <p class="text-gray-700 leading-relaxed mt-2">
                    Le résultat étant connu, il faut récupérer toutes les cartes en face cachée, les mélanger et les redistribuer lors du prochain voyage.
                </p>
            </div>

            <!-- Suite de la partie -->
            <div class="mb-6">
                <h3 class="text-2xl font-semibold text-[#00253e] mb-2">Suite de la partie</h3>
                <p class="text-gray-700 leading-relaxed">
                    C’est le joueur suivant, dans le sens des aiguilles d’une montre, qui doit à nouveau choisir un équipage de trois personnes.
                </p>
                <p class="text-red-500 font-semibold mt-2">
                    ATTENTION ! À partir de ce tour et jusqu’à la fin de la partie, il y aura un vote lorsque trois personnes seront proposées. (La personne qui propose l’équipage est forcément pour)
                </p>
                <p class="text-gray-700 leading-relaxed mt-2">
                    Si la majorité des joueurs (ou au moins la moitié en cas de joueurs pair) est contre, l’équipage ne part pas et la personne peut proposer un nouvel équipage, qui sera différent d’au moins une personne.
                </p>
                <p class="text-gray-700 leading-relaxed mt-2">
                    Si l’équipage est à nouveau refusé, la personne qui les a choisis passera son tour. Vous pouvez maintenant réitérer ce schéma jusqu’à la victoire d’une équipe, sans oublier d’utiliser vos cartes bonus à bon escient.
                </p>
            </div>

            <!-- Condition de victoire -->
            <div>
                <h3 class="text-2xl font-semibold text-[#00253e] mb-2">Condition de victoire</h3>
                <p class="text-gray-700 leading-relaxed">
                    Une équipe gagne dès qu’elle remporte dix manches. Si les marins gagnent, la Sirène gagne avec eux. Si les pirates gagnent, ils doivent voter afin d’identifier la sirène, si la majorité se trompe, la sirène gagne la partie seule.
                </p>
            </div>
        </div>

        <!-- Conseils aux joueurs -->
        <div class="max-w-4xl mx-auto p-6 bg-white shadow-lg mt-10 rounded-lg">
            <h2 class="text-3xl font-bold text-center text-[#af2127] mb-6">Astuces et stratégies</h2>
            <!-- Conseils aux Joueurs -->
            <div class="mb-6">
                <h3 class="text-2xl font-semibold text-[#00253e] mb-2">Conseils aux Joueurs</h3>
                
                <!-- Le Capitaine -->
                <div class="mb-4">
                    <h4 class="text-xl font-semibold text-[#00253e]">Le Capitaine</h4>
                    <p class="text-gray-700 leading-relaxed">
                        Laissez suffisamment de temps aux joueurs pour se regarder. Si vous êtes pirates ou sirène, et que vous devez ouvrir les yeux, faites bien attention à ne pas diriger votre voix en regardant les autres joueurs.
                    </p>
                </div>
                
                <!-- La Sirène -->
                <div class="mb-4">
                    <h4 class="text-xl font-semibold text-[#00253e]">La Sirène</h4>
                    <p class="text-gray-700 leading-relaxed">
                        Vous pouvez dans un premier temps jouer comme un pirate, choisir un équipage en y mettant un pirate afin de gagner leur confiance et vous retrouver à votre tour dans leurs équipages (et mettre une carte île), cela permettra aux marins de commencer à les identifier. Quand les pirates commenceront à douter de vous, vous pourrez les accuser à votre tour.
                    </p>
                </div>
                
                <!-- Les Marins -->
                <div class="mb-4">
                    <h4 class="text-xl font-semibold text-[#00253e]">Les Marins</h4>
                    <p class="text-gray-700 leading-relaxed">
                        Soyez attentifs, identifier les pirates est toujours compliqué, il faut donc parfois se concentrer à identifier ses alliés.
                    </p>
                </div>
                
                <!-- Les Pirates -->
                <div>
                    <h4 class="text-xl font-semibold text-[#00253e]">Les Pirates</h4>
                    <p class="text-gray-700 leading-relaxed">
                        Attention aux équipages où vous êtes plusieurs pirates, il n’y a qu’un point à gagner même si vous êtes 3 pirates. Il est préférable de ne rien mettre dans ces cas-là, ou de tenter un signe discret à votre ou vos complices. N’oubliez pas de gagner la confiance des marins en mettant des cartes île de temps en temps, utilisez vos cartes bonus à bon escient afin de semer le doute, et gardez en tête qu’il y a une Sirène.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>


<section id="cards" class="rules-section" style="display: none;">
    <!-- Cartes -->
    <div class="max-w-5xl mx-auto p-6 bg-white shadow-lg mt-10 rounded-lg">
        <h1 class="text-4xl font-bold text-center text-[#af2127] mb-6">Cartes du Jeu</h1>
        <h2 class="text-2xl font-semibold text-[#00253e] mt-6">Carte Rôles</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-4">
            <!-- Carte Pirate -->
            <div class="bg-gray-50 p-4 rounded-lg shadow-md flex flex-col items-center">
                <div class="relative perspective">
                    <div class="card w-32 h-32">
                        <!-- Face avant -->
                        <div class="absolute w-full h-full backface-hidden">
                            <img src=" ../ressources/images/Cartes/CartesRoles/Carte-Pirate.png" alt="Carte Pirate" class="object-cover rounded-md">
                        </div>
                        <!-- Face arrière -->
                        <div class="absolute w-full h-full backface-hidden rotate-y-180">
                            <img src="../ressources/images/Cartes/CartesRoles/Carte-dos-role.png" alt="Carte Pirate - arrière" class="object-cover rounded-md">
                        </div>
                    </div>
                </div>
                <div class="mt-4 text-center">
                    <h3 class="text-lg font-semibold text-[#00253e]">Pirate</h3>
                    <p class="text-gray-700">Leur but est d'empoisonner les marins sans se faire repérer. Pour noyer les soupçons, ils ont le choix entre une carte <i>ÎLE</i> ou une carte <i>POISON</i>.Ils connaissent leurs complices </p>
                </div>
            </div>
            <!-- Carte Marin -->
            <div class="bg-gray-50 p-4 rounded-lg shadow-md flex flex-col items-center">
                <div class="relative perspective">
                    <div class="card w-32 h-32 transition-transform duration-700 transform-style-preserve-3d hover:rotate-y-180">
                        <div class="absolute w-full h-full backface-hidden">
                            <img src="../ressources/images/Cartes/CartesRoles/Carte-marin.png" alt="Carte Marin" class="object-cover rounded-md">
                        </div>
                        <div class="absolute w-full h-full backface-hidden rotate-y-180">
                            <img src="../ressources/images/Cartes/CartesRoles/Carte-dos-role.png" alt="Carte Marin - arrière" class="object-cover rounded-md">
                        </div>
                    </div>
                </div>
                <div class="mt-4 text-center">
                    <h3 class="text-lg font-semibold text-[#00253e]">Marin</h3>
                    <p class="text-gray-700">Leur but est de choisir le bon équipage pour arriver sur l'île sans se faire empoisonner. Ils n'ont pas le choix et ne peuvent poser que des cartes <i>ÎLE</i>. Ils doivent démasquer les pirates et identifier leurs alliés</p>
                </div>
            </div>

            <!-- Carte Sirène -->
            <div class="bg-gray-50 p-4 rounded-lg shadow-md flex flex-col items-center">
                <div class="relative perspective">
                    <div class="card w-32 h-32 transition-transform duration-700 transform-style-preserve-3d hover:rotate-y-180">
                        <div class="absolute w-full h-full backface-hidden">
                            <img src="../ressources/images/Cartes/CartesRoles/Carte-sirene.png" alt="Carte Sirène" class="object-cover rounded-md">
                        </div>
                        <div class="absolute w-full h-full backface-hidden rotate-y-180">
                            <img src="../ressources/images/Cartes/CartesRoles/Carte-dos-role.png" alt="Carte Sirène - arrière" class="object-cover rounded-md">
                        </div>
                    </div>
                </div>
                <div class="mt-4 text-center">
                    <h3 class="text-lg font-semibold text-[#00253e]">Sirène</h3>
                    <p class="text-gray-700">La Sirène a une carte rôle à plusieurs options. Elle ouvre les yeux en même temps que les pirates mais eux ne peuvent pas qui est la sirène. Elle ne peut mettre que des cartes <i>ÎLE</i>
                    <p class="text-sm center flex flex-center">
                        ATTENTION : La sirène n’a pas le droit de déclarer son rôle, si elle est trop explicite
                        les joueurs peuvent mettre fin à la partie
                        Si les marins gagnent, elle gagne avec eux. Si les pirates gagnent, ils doivent
                        voter afin d’identifier la sirène, si la majorité se trompent la sirène gagne la
                        partie seule.
                    </p>
                    </p>
                </div>
            </div>
        </div>


        <h2 class="text-2xl font-semibold text-[#00253e] mt-6">Cartes Action</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-4">
            <!-- Carte Île -->
            <div class="bg-gray-50 p-4 rounded-lg shadow-md flex flex-col items-center">
                <div class="relative perspective">
                    <div class="card w-32 h-32">
                        <!-- Face avant -->
                        <div class="absolute w-full h-full backface-hidden">
                            <img src="../ressources/images/Cartes/CartesAction/Carte-île.png" alt="Carte île" class="object-cover rounded-md">
                        </div>
                        <!-- Face arrière -->
                        <div class="absolute w-full h-full backface-hidden rotate-y-180">
                            <img src="../ressources/images/Cartes/CartesAction/Carte-dos-action.png" alt="Carte île - arrière" class="object-cover rounded-md">
                        </div>
                    </div>
                </div>
                <div class="mt-4 text-center">
                    <h3 class="text-lg font-semibold text-[#00253e]">Île</h3>
                    <p class="text-gray-700">Permet d’arriver à destination.
                        S’il y a trois îles, la manche est gagnée
                        pour les marins et la sirène.
                    </p>
                </div>
            </div>
            <!-- Carte Poison -->
            <div class="bg-gray-50 p-4 rounded-lg shadow-md flex flex-col items-center">
                <div class="relative perspective">
                    <div class="card w-32 h-32 transition-transform duration-700 transform-style-preserve-3d hover:rotate-y-180">
                        <div class="absolute w-full h-full backface-hidden">
                            <img src="../ressources/images/Cartes/CartesAction/Carte-poison.png" alt="Carte Poison" class="object-cover rounded-md">
                        </div>
                        <div class="absolute w-full h-full backface-hidden rotate-y-180">
                            <img src="../ressources/images/Cartes/CartesAction/Carte-dos-action.png" alt="Carte Poison - arrière" class="object-cover rounded-md">
                        </div>
                    </div>
                </div>
                <div class="mt-4 text-center">
                    <h3 class="text-lg font-semibold text-[#00253e]">Poison</h3>
                    <p class="text-gray-700">L’équipage est empoisonné par les pirates.
                        S’il y a au moins un poison, la manche est gagnée
                        pour les pirates.
                    <p class=" text-sm">
                        Attention : S’il y a plusieurs poisons, un seul point est marqué et les pirates
                        seront repérés plus facilement.
                    </p>
                    </p>
                </div>
            </div>

            <!-- Carte Sirène -->
            <div class="bg-gray-50 p-4 rounded-lg shadow-md flex flex-col items-center">
                <div class="relative perspective">
                    <div class="card w-32 h-32 transition-transform duration-700 transform-style-preserve-3d hover:rotate-y-180">
                        <div class="absolute w-full h-full backface-hidden">
                            <img src="../ressources/images/Cartes/CartesRoles/Carte-sirene.png" alt="Carte Sirène" class="object-cover rounded-md">
                        </div>
                        <div class="absolute w-full h-full backface-hidden rotate-y-180">
                            <img src="../ressources/images/Cartes/CartesRoles/Carte-dos-role.png" alt="Carte Sirène - arrière" class="object-cover rounded-md">
                        </div>
                    </div>
                </div>
                <div class="mt-4 text-center">
                    <h3 class="text-lg font-semibold text-[#00253e]">Sirène</h3>
                    <p class="text-gray-700">La Sirène a une carte rôle à plusieurs options. Elle ouvre les yeux en même temps que les pirates mais eux ne peuvent pas qui est la sirène. Elle ne peut mettre que des cartes <i>ÎLE</i></p>
                </div>
            </div>
        </div>

        <h2 class="text-2xl font-semibold text-[#00253e] mt-6">Cartes Bonus</h2>

        <div class="flex justify-around items-center">
            <!-- Carte  1 -->
            <div class="flex items-center">
                <div class="w-8 h-8 bg-green-500 rounded-full mr-2"></div>
                <p class="text-gray-700">Utilisable lorsque les cartes Actions ont été dévoilées</p>
            </div>

            <!-- Carte  2 -->
            <div class="flex items-center">
                <div class="w-8 h-8 bg-purple-500 rounded-full mr-2"></div>
                <p class="text-gray-700">Utilisable à n'importe quel moment</p>
            </div>

            <!-- Carte  3 -->
            <div class="flex items-center">
                <div class="w-8 h-8 bg-yellow-500 rounded-full mr-2"></div>
                <p class="text-gray-700">Utilisable avant la phase de vote</p>
            </div>

            <!-- Carte  4 -->
            <div class="flex items-center">
                <div class="w-8 h-8 bg-blue-500 rounded-full mr-2"></div>
                <p class="text-gray-700">Utilisable avant la phase d'action</p>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-4">
            <!-- Carte Antidote -->
            <div class="bg-gray-50 p-4 rounded-lg shadow-md flex flex-col items-center">
                <div class="relative perspective">
                    <div class="card w-32 h-32 transition-transform duration-700 transform-style-preserve-3d hover:rotate-y-180">
                        <div class="absolute w-full h-full backface-hidden">
                            <img src="../ressources/images/Cartes/CartesBonus/Carte-Antidote.png" alt="Carte Antidote" class="object-cover rounded-md">
                        </div>
                        <div class="absolute w-full h-full backface-hidden rotate-y-180">
                            <img src="../ressources/images/Cartes/CartesBonus/Carte-dos-bonus.png" alt="Carte Antidote - arrière" class="object-cover rounded-md">
                        </div>
                    </div>
                </div>
                <div class="mt-4 text-center">
                    <h3 class="text-lg font-semibold text-[#00253e]">Antidote</h3>
                    <p class="text-gray-700">Si une carte poison est trouvée, l’antidote permet de
                        sauver l’équipage, le point pour les pirates est donc
                        annulé, mais aucun point n’est gagné pour les marins.
                        Cette carte annule donc la manche.
                    <p class="text-sm">
                        Attention : il faut qu’une carte poison soit découverte
                    </p>
                    </p>
                </div>
            </div>
            <!-- Carte Observateur -->
            <div class="bg-gray-50 p-4 rounded-lg shadow-md flex flex-col items-center">
                <div class="relative perspective">
                    <div class="card w-32 h-32 transition-transform duration-700 transform-style-preserve-3d hover:rotate-y-180">
                        <div class="absolute w-full h-full backface-hidden">
                            <img src="../ressources/images/Cartes/CartesBonus/Carte-observateur.png" alt="Carte Observateur" class="object-cover rounded-md">
                        </div>
                        <div class="absolute w-full h-full backface-hidden rotate-y-180">
                            <img src="../ressources/images/Cartes/CartesBonus/Carte-dos-bonus.png" alt="Carte Observateur - arrière" class="object-cover rounded-md">
                        </div>
                    </div>
                </div>
                <div class="mt-4 text-center">
                    <h3 class="text-lg font-semibold text-[#00253e]">Observateur</h3>
                    <p class="text-gray-700">L’observateur peut demander à voir la carte
                        non utilisée par un des joueurs, il est le seul à pouvoir
                        la voir et a donc la possibilité de mentir.
                    </p>
                </div>
            </div>
            <!-- Carte Perroquet -->
            <div class="bg-gray-50 p-4 rounded-lg shadow-md flex flex-col items-center">
                <div class="relative perspective">
                    <div class="card w-32 h-32 transition-transform duration-700 transform-style-preserve-3d hover:rotate-y-180">
                        <div class="absolute w-full h-full backface-hidden">
                            <img src="../ressources/images/Cartes/CartesBonus/Carte-Perroquet.png" alt="Carte Perroquet" class="object-cover rounded-md">
                        </div>
                        <div class="absolute w-full h-full backface-hidden rotate-y-180">
                            <img src="../ressources/images/Cartes/CartesBonus/Carte-dos-bonus.png" alt="Carte Perroquet - arrière" class="object-cover rounded-md">
                        </div>
                    </div>
                </div>
                <div class="mt-4 text-center">
                    <h3 class="text-lg font-semibold text-[#00253e]">Perroquet</h3>
                    <p class="text-gray-700">L’équipage qui a été choisi dans la manche précédente
                        repart en
                        mer.
                        C’est la seule
                        carte qui
                        permet

                        de
                        choisir deux
                        fois
                        d’affilé le même

                        équipage,
                        vous passez
                        votre
                        tour
                        après le
                        voyage.
                    <p class="text-sm"> Attention : Le résultat pourrait être différent, et le perroquet reproduit àl’identique le
                        tour précèdent.</p>
                    </p>
                </div>
            </div>
            <!-- Carte Voyage Express -->
            <div class="bg-gray-50 p-4 rounded-lg shadow-md flex flex-col items-center">
                <div class="relative perspective">
                    <div class="card w-32 h-32 transition-transform duration-700 transform-style-preserve-3d hover:rotate-y-180">
                        <div class="absolute w-full h-full backface-hidden">
                            <img src="../ressources/images/Cartes/CartesBonus/Carte-Voyage_express.png" alt="Carte Voyage Express" class="object-cover rounded-md">
                        </div>
                        <div class="absolute w-full h-full backface-hidden rotate-y-180">
                            <img src="../ressources/images/Cartes/CartesBonus/Carte-dos-bonus.png" alt="Carte Voyage Express - arrière" class="object-cover rounded-md">
                        </div>
                    </div>
                </div>
                <div class="mt-4 text-center">
                    <h3 class="text-lg font-semibold text-[#00253e]">Voyage Express</h3>
                    <p class="text-gray-700">Le détenteur de cette carte choisis un équipage et aucun vote
                        n’est requis,il peut s’inclure dans le voyage ou faire partir les autres
                        joueurs. Il peut faire
                        partir un voyage précédemment refusé, cette carte peut être
                        utilisée pour faire valider l’équipage d’un autre joueur.
                    <p class="text-sm"> Attention : Si deux de vos cartes sont refusées et que vous n’avez pas utilisé la carte
                        vous passez votre tour. </p>
                    </p>
                </div>
            </div>
            <!-- Carte Mal de mer -->
            <div class="bg-gray-50 p-4 rounded-lg shadow-md flex flex-col items-center">
                <div class="relative perspective">
                    <div class="card w-32 h-32 transition-transform duration-700 transform-style-preserve-3d hover:rotate-y-180">
                        <div class="absolute w-full h-full backface-hidden">
                            <img src="../ressources/images/Cartes/CartesBonus/Carte-Mal_de_mer.png" alt="Carte Voyage Express" class="object-cover rounded-md">
                        </div>
                        <div class="absolute w-full h-full backface-hidden rotate-y-180">
                            <img src="../ressources/images/Cartes/CartesBonus/Carte-dos-bonus.png" alt="Carte Mal de mer - arrière" class="object-cover rounded-md">
                        </div>
                    </div>
                </div>
                <div class="mt-4 text-center">
                    <h3 class="text-lg font-semibold text-[#00253e]">Mal de mer</h3>
                    <p class="text-gray-700">Un des joueurs a le mal de mer et ne peut pas partir
                        avec l’équipage.
                        La personne qui a le mal de mer l’aura jusqu’à la fin
                        de la manche.
                    <p class="text-sm"> Attention : Elle est utilisable lorsque le vote de l’équipage est accepté.</p>
                    </p>
                </div>
            </div>
            <!-- Carte Troc -->
            <div class="bg-gray-50 p-4 rounded-lg shadow-md flex flex-col items-center">
                <div class="relative perspective">
                    <div class="card w-32 h-32 transition-transform duration-700 transform-style-preserve-3d hover:rotate-y-180">
                        <div class="absolute w-full h-full backface-hidden">
                            <img src="../ressources/images/Cartes/CartesBonus/Carte-troc.png" alt="Carte Troc" class="object-cover rounded-md">
                        </div>
                        <div class="absolute w-full h-full backface-hidden rotate-y-180">
                            <img src="../ressources/images/Cartes/CartesBonus/Carte-dos-bonus.png" alt="Carte roc - arrière" class="object-cover rounded-md">
                        </div>
                    </div>
                </div>
                <div class="mt-4 text-center">
                    <h3 class="text-lg font-semibold text-[#00253e]">Troc</h3>
                    <p class="text-gray-700">Vous demandez à un joueur qui a posé sa carte
                        action, d’échanger sa carte avec celle qu’il n’a pas
                        posé.
                    <p class="text-sm"> Attention : Elle doit être utilisée avant que les cartes actions utilisées soient mélangée.</p>
                    </p>
                </div>
            </div>
            <!-- Carte Mer Agitée -->
            <div class="bg-gray-50 p-4 rounded-lg shadow-md flex flex-col items-center">
                <div class="relative perspective">
                    <div class="card w-32 h-32 transition-transform duration-700 transform-style-preserve-3d hover:rotate-y-180">
                        <div class="absolute w-full h-full backface-hidden">
                            <img src="../ressources/images/Cartes/CartesBonus/Carte-mer_agitée.png" alt="Carte Mer agitée" class="object-cover rounded-md">
                        </div>
                        <div class="absolute w-full h-full backface-hidden rotate-y-180">
                            <img src="../ressources/images/Cartes/CartesBonus/Carte-dos-bonus.png" alt="Carte Mer Agitée - arrière" class="object-cover rounded-md">
                        </div>
                    </div>
                </div>
                <div class="mt-4 text-center">
                    <h3 class="text-lg font-semibold text-[#00253e]">Mer Agitée</h3>
                    <p class="text-gray-700">La personne qui propose son équipage doit passer
                        son tour, si l’équipage avait déjà été choisis,
                        ils rendent leurs cartes.</p>
                </div>
            </div>
            <!-- Carte Medusa -->
            <div class="bg-gray-50 p-4 rounded-lg shadow-md flex flex-col items-center">
                <div class="relative perspective">
                    <div class="card w-32 h-32 transition-transform duration-700 transform-style-preserve-3d hover:rotate-y-180">
                        <div class="absolute w-full h-full backface-hidden">
                            <img src="../ressources/images/Cartes/CartesBonus/Carte-Medusa.png" alt="Carte Medusa" class="object-cover rounded-md">
                        </div>
                        <div class="absolute w-full h-full backface-hidden rotate-y-180">
                            <img src="../ressources/images/Cartes/CartesBonus/Carte-dos-bonus.png" alt="Carte Medusa - arrière" class="object-cover rounded-md">
                        </div>
                    </div>
                </div>
                <div class="mt-4 text-center">
                    <h3 class="text-lg font-semibold text-[#00253e]">Medusa</h3>
                    <p class="text-gray-700">Vous demandez à un joueur de dévoilé sa carte bonus
                        à tout le monde</p>
                </div>
            </div>
            <!-- Carte Malandrin -->
            <div class="bg-gray-50 p-4 rounded-lg shadow-md flex flex-col items-center">
                <div class="relative perspective">
                    <div class="card w-32 h-32 transition-transform duration-700 transform-style-preserve-3d hover:rotate-y-180">
                        <div class="absolute w-full h-full backface-hidden">
                            <img src="../ressources/images/Cartes/CartesBonus/Carte-Malandrin.png" alt="Carte Malandrin" class="object-cover rounded-md">
                        </div>
                        <div class="absolute w-full h-full backface-hidden rotate-y-180">
                            <img src="../ressources/images/Cartes/CartesBonus/Carte-dos-bonus.png" alt="Carte Malandrin - arrière" class="object-cover rounded-md">
                        </div>
                    </div>
                </div>
                <div class="mt-4 text-center">
                    <h3 class="text-lg font-semibold text-[#00253e]">Malandrin</h3>
                    <p class="text-gray-700">Le malandrin choisis un joueur qui n’a pas encore posé
                        sa carte bonus et la lui vole, il ne sait pas ce qu’il va
                        avoir, mais s’il a prêté attention au jeu il peut
                        en avoir une idée.</p>
                </div>
            </div>
            <!-- Carte Charlatin -->
            <div class="bg-gray-50 p-4 rounded-lg shadow-md flex flex-col items-center">
                <div class="relative perspective">
                    <div class="card w-32 h-32 transition-transform duration-700 transform-style-preserve-3d hover:rotate-y-180">
                        <div class="absolute w-full h-full backface-hidden">
                            <img src="../ressources/images/Cartes/CartesBonus/Carte-Charlatan.png" alt="Carte Charlantan" class="object-cover rounded-md">
                        </div>
                        <div class="absolute w-full h-full backface-hidden rotate-y-180">
                            <img src="../ressources/images/Cartes/CartesBonus/Carte-dos-bonus.png" alt="Carte Charlatan - arrière" class="object-cover rounded-md">
                        </div>
                    </div>
                </div>
                <div class="mt-4 text-center">
                    <h3 class="text-lg font-semibold text-[#00253e]">Charlatan</h3>
                    <p class="text-gray-700">Tous les joueurs donnent leurs cartes bonus à la personne de
                        gauche, si vous n’aviez plus de carte vous ne donnez rien
                        et récupérer la carte de votre voisin de droite.
                        La personne qui a joué la carte charlatan jette sa carte, et récupère
                        celle de son
                        voisin de
                        droite.</p>
                </div>
            </div>
        </div>
    </div>
</section>
</body>

</html>