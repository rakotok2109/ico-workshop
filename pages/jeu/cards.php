<?php 
require_once(dirname(__DIR__) . '/../config/init.php'); 
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les cartes</title>
    <style>
          .active-tab {
            background-color: #f5deb3 !important; /* Couleur beige */
         
        }
    </style>
        <script src="https://cdn.tailwindcss.com"></script>

</head>
<body>
    
<?php include(__DIR__ . '/../components/header.php') ?>



<div class="container-presentation-carte">
          <!-- Tabs -->
      <div class="flex justify-center mb-6">
     <a href="../jeu/rules.php">
     <button id="tab-rules"  class="tab-button px-4 py-2 mx-2 bg-[#00253e] text-white rounded hover:bg-[#af2127]">Règles du jeu</button>
     </a>
      <a href="#">
            <button id="tab-cards"  class="active-tab tab-button px-4 py-2 mx-2 bg-[#00253e] text-white rounded hover:bg-[#af2127]">Cartes</button>
    </a>
    <a href="">
        <button id="tab-qr" class="tab-button px-4 py-2 mx-2 bg-[#00253e] text-white rounded hover:bg-[#af2127]">QR Code</button>
    </a>
        </div>

    <div class="carousel-container">
        <div class="carousel-track">
            <!-- Card 1 -->
            <div class="carousel-item active">
                <div class="card-container">
                    <div class="card" onclick="toggleFlip(this)">
                        <div class="card-inner">
                            <div class="card-front">
                                <img src="https://via.placeholder.com/300x400" alt="Card 1" class="w-100 h-100">
                            </div>
                            <div class="card-back">
                                <p class="text-center">Card 1 Back</p>
                            </div>
                        </div>
                    </div>
                    <div class="details">
                        <h2>Card 1</h2>
                        <p>Description of Card 1.</p>
                        <p>Purpose: Example purpose of the card.</p>
                        <p>Mandatory: Yes</p>
                    </div>
                </div>
            </div>
            <!-- Card 2 -->
            <div class="carousel-item">
                <div class="card-container">
                    <div class="card" onclick="toggleFlip(this)">
                        <div class="card-inner">
                            <div class="card-front">
                                <img src="https://via.placeholder.com/300x400" alt="Card 2" class="w-100 h-100">
                            </div>
                            <div class="card-back">
                                <p class="text-center">Card 2 Back</p>
                            </div>
                        </div>
                    </div>
                    <div class="details">
                        <h2>Card 2</h2>
                        <p>Description of Card 2.</p>
                        <p>Purpose: Another example purpose.</p>
                        <p>Mandatory: No</p>
                    </div>
                </div>
            </div>
            <!-- Card 3 -->
            <div class="carousel-item">
                <div class="card-container">
                    <div class="card" onclick="toggleFlip(this)">
                        <div class="card-inner">
                            <div class="card-front">
                                <img src="https://via.placeholder.com/300x400" alt="Card 3" class="w-100 h-100">
                            </div>
                            <div class="card-back">
                                <p class="text-center">Card 3 Back</p>
                            </div>
                        </div>
                    </div>
                    <div class="details">
                        <h2>Card 3</h2>
                        <p>Description of Card 3.</p>
                        <p>Purpose: Another example purpose.</p>
                        <p>Mandatory: No</p>
                    </div>
                </div>
            </div>
            <!-- Card 4 -->
            <div class="carousel-item">
                <div class="card-container">
                    <div class="card" onclick="toggleFlip(this)">
                        <div class="card-inner">
                            <div class="card-front">
                                <img src="https://via.placeholder.com/300x400" alt="Card 4" class="w-100 h-100">
                            </div>
                            <div class="card-back">
                                <p class="text-center">Card 4 Back</p>
                            </div>
                        </div>
                    </div>
                    <div class="details">
                        <h2>Card 4</h2>
                        <p>Description of Card 4.</p>
                        <p>Purpose: Example purpose of the card.</p>
                        <p>Mandatory: Yes</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="controls">
            <button id="prev" onclick="moveCarousel(-1)">&lt;</button>
            <button id="next" onclick="moveCarousel(1)">&gt;</button>
        </div>
    </div>
    </div>

    <!-- JavaScript -->
    <script>
        let currentIndex = 0;
        const items = document.querySelectorAll('.carousel-item');

        function moveCarousel(direction) {
            const totalItems = items.length;
            items[currentIndex].classList.remove('active');
            currentIndex = (currentIndex + direction + totalItems) % totalItems;
            items[currentIndex].classList.add('active');
        }

        function toggleFlip(card) {
            const cardInner = card.querySelector('.card-inner');
            cardInner.classList.toggle('flipped');
        }
    </script>


</body>
</html>