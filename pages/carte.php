<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interactive Cards</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            overflow: hidden; /* Pas de barre de défilement */
            height: 100vh;
        }
        .carousel-item {
            display: flex;
            align-items: center;
            height: 100vh;
        }
        .card-container {
            display: flex;
            gap: 30px;
            width: 100%;
        }
        .card {
            width: 300px;
            height: 400px;
            perspective: 1000px;
        }
        .card-inner {
            position: relative;
            width: 100%;
            height: 100%;
            transform-style: preserve-3d;
            transition: transform 0.6s;
        }
        .card:hover img {
            filter: blur(5px);
        }
        .card-front, .card-back {
            position: absolute;
            width: 100%;
            height: 100%;
            backface-visibility: hidden;
            border-radius: 15px;
        }
        .card-front {
            background-color: lightblue;
        }
        .card-back {
            background-color: lightcoral;
            transform: rotateY(180deg);
        }
        .card-inner.flipped {
            transform: rotateY(180deg);
        }
        .details {
            flex: 1;
        }
    </style>
</head>
<body>
    <div id="cardCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
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
        <button class="carousel-control-prev" type="button" data-bs-target="#cardCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#cardCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function toggleFlip(card) {
            const cardInner = card.querySelector('.card-inner');
            cardInner.classList.toggle('flipped');
        }
    </script>
</body>
</html>
