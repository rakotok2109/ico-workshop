<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Règles du Jeu</title>
    <script src="https://cdn.tailwindcss.com"></script>
  
    <script src="https://kit.fontawesome.com/5563162149.js" crossorigin="anonymous"></script>

    <style>
        .hidden {
            display: none;
        }

        .active-tab {
            background-color: #f5deb3 !important; /* Couleur beige */
        }
    </style>
</head>

<body class="bg-gray-100 text-gray-900 font-sans">
    <?php include(__DIR__ . '/../components/navbar.php') ?>

    <div class="max-w-6xl mx-auto p-6 bg-white shadow-lg mt-10 rounded-lg">
        <h1 class="text-4xl font-bold text-center text-[#af2127] mb-6">ICO</h1>

        <!-- Tabs -->
        <div class="flex justify-center mb-6">
            <button id="tab-rules" onclick="showTab('rules')" class="tab-button px-4 py-2 mx-2 bg-[#00253e] text-white rounded hover:bg-[#af2127]">Règles du jeu</button>
            <button id="tab-cards" onclick="showTab('cards')" class="tab-button px-4 py-2 mx-2 bg-[#00253e] text-white rounded hover:bg-[#af2127]">Cartes</button>
            <button id="tab-qr" onclick="showTab('qr')" class="tab-button px-4 py-2 mx-2 bg-[#00253e] text-white rounded hover:bg-[#af2127]">QR Code</button>
        </div>

        <!-- Content -->
        <div id="rules" class="tab-content">
            <?php include(__DIR__ . '/rules.php') ?>
        </div>

        <div id="cards" class="tab-content hidden">
            <h2 class="text-2xl font-semibold text-[#00253e] mb-4">Cartes</h2>
            <p class="text-gray-700 leading-relaxed">
                Voici les cartes du jeu...
            </p>
        </div>

        <div id="qr" class="tab-content hidden">
            <h2 class="text-2xl font-semibold text-[#00253e] mb-4">QR Code</h2>
            <p class="text-gray-700 leading-relaxed">
                Voici le QR Code...
            </p>
        </div>
    </div>

    <script>
        function showTab(tabId) {
            document.querySelectorAll('.tab-content').forEach(tab => {
                tab.classList.add('hidden');
            });
            document.getElementById(tabId).classList.remove('hidden');

            document.querySelectorAll('.tab-button').forEach(button => {
                button.classList.remove('active-tab');
            });
            document.getElementById('tab-' + tabId).classList.add('active-tab');
        }

        // Initialiser le premier onglet comme actif
        document.getElementById('tab-rules').classList.add('active-tab');
    </script>

</body>

</html>