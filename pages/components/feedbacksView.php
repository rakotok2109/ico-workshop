<?php
require_once(dirname(dirname(__DIR__)) . '/config/init.php');
$feedbacks = FeedbackController::getAllFeedbacks();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Avis et Formulaire</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 0; 
        padding: 0; 
      }
    h1 {
        text-align: center;
        color: #333;
        margin-top: 40px;
    }
    .footer-container {
        display: flex;
        justify-content: space-around;
        align-items: flex-start;
        background-color: #3B60BC;
        width: 100%;
        padding: 20px 0;
        box-sizing: border-box; 
    }
    .form-section, .feedback-section {
        width: 35%; 
        background: #fff;
        padding: 15px; 
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    label {
        font-weight: bold;
        font-size: 14px;
    }
    input, textarea, button {
        width: 100%;
        margin-top: 8px;
        margin-bottom: 15px;
        padding: 6px; 
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 11px;
    }
    textarea {
        height: 70px;
    }
    button {
        background-color: #007BFF;
        color: #fff;
        border: none;
        cursor: pointer;
        padding: 8px;
        font-size: 14px;
    }
    button:hover {
        background-color: #0056b3;
    }
    .star-rating {
        display: flex;
        justify-content: flex-start;
        gap: 5px;
    }
    .star-rating input[type="radio"] {
        display: none;
    }
    .star-rating label {
        font-size: 20px;
        color: #ccc;
        cursor: pointer;
    }
    .star-rating input[type="radio"]:checked ~ label,
    .star-rating label:hover,
    .star-rating label:hover ~ label {
        color: #ffcc00;
    }
    .carousel {
        position: relative;
        height: 200px;
        overflow: hidden;
    }
    .feedback-items {
        display: flex;
        flex-direction: column;
        transform: translateY(0);
        transition: transform 0.5s ease;
    }
    .feedback-item {
        padding: 20px;
        text-align: center;
        min-height: 200px;
        box-sizing: border-box;
    }
    .feedback-item strong {
        font-size: 14px;
        color: #555;
    }
    .feedback-item p {
        margin: 10px 0;
        font-size: 16px;
    }
    .feedback-stars {
        display: flex;
        justify-content: center;
        gap: 5px;
        margin: 10px 0;
    }
    .feedback-stars .star {
        font-size: 20px;
    }
    .feedback-stars .star.filled {
        color: #ffcc00;
    }
    .ss {
    display: flex;
    justify-content: space-between; 
    align-items: center; 
    gap: 10px; 
}

.star-rating {
    display: flex;
    gap: 5px;
}

</style>


</head>
<body>
    <div style="background-color: #3B60BC;" >
        <div class="title-footer">
            <h1 style="color: #FFFFFF;">Partagez et Consultez les Avis</h1>
        </div>
        <div class="footer-container" style="background-color: #3B60BC;">
            <div class="form-section">
                <form action="../../routes/feedback.php?id=addFeedback" method="POST">
                    <div class="ss">
                        <label for="firstname">Votre prénom </label>
                        <input type="text" id="firstname" name="firstname" required>

                        <label for="rate">Note </label>
                        <div class="star-rating">
                            <?php for ($i = 5; $i >= 1; $i--): ?>
                                <input type="radio" id="star-<?= $i ?>" name="rate" value="<?= $i ?>" required>
                                <label for="star-<?= $i ?>">★</label>
                            <?php endfor; ?>
                        </div>
                    </div>
                    <label for="wording">Votre avis :</label>
                    <textarea id="wording" name="wording" rows="3" required></textarea>
                    <button type="submit">Envoyer</button>
                </form>
            </div>
            <div class="feedback-section">
                <div class="carousel">
                    <div class="feedback-items">
                        <?php if (!empty($feedbacks)): ?>
                            <?php foreach ($feedbacks as $feedback): ?>
                                <div class="feedback-item">
                                    <strong>Prénom :</strong> <?= htmlspecialchars($feedback['firstname']) ?><br>
                                    <div class="feedback-stars">
                                        <?php for ($i = 1; $i <= 5; $i++): ?>
                                            <span class="star <?= $i <= $feedback['rate'] ? 'filled' : '' ?>">★</span>
                                        <?php endfor; ?>
                                    </div>
                                    <p><strong>Avis :</strong> <?= htmlspecialchars($feedback['wording']) ?></p>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <div class="feedback-item">
                                <p>Aucun avis pour le moment.</p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<script>
    const items = document.querySelector('.feedback-items');
    const feedbackCount = <?= count($feedbacks) ?>;
    let currentIndex = 0;

    function slideNext() {
        currentIndex = (currentIndex + 1) % feedbackCount; 
        items.style.transform = `translateY(-${currentIndex * 200}px)`;
    }

    if (feedbackCount > 1) {
        setInterval(slideNext, 3000); 
    }
</script>
</html>