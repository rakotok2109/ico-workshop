<?php

require_once (dirname(dirname(__DIR__)).'/config/init.php');
$feedbacks = FeedbackController::getAllFeedbacks();
$recentFeedbacks = array_slice($feedbacks, -5);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Avis</title>
    <style>
        h1, h2 {
            color: #333;
        }
        form {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        label {
            font-weight: bold;
        }
        input, textarea, button {
            width: 100%;
            margin-top: 10px;
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            background: #007BFF;
            color: #fff;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background: #0056b3;
        }
        .star-rating {
            display: flex;
            gap: 5px;
            cursor: pointer;
        }
        .star-rating input[type="radio"] {
            display: none;
        }
        .star {
            font-size: 20px;
            color: #ccc;
        }
        .star:hover, .star:hover ~ .star, .star-rating input[type="radio"]:checked ~ .star {
            color: #ffcc00;
        }
        .feedback-item {
            background: #fff;
            padding: 10px;
            border-radius: 8px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            margin-bottom: 10px;
        }
        .feedback-item strong {
            display: block;
            font-size: 14px;
            color: #555;
        }
        .feedback-item p {
            margin: 5px 0;
        }
        .see-more {
            display: inline-block;
            margin-top: 10px;
            padding: 10px 20px;
            background: #007BFF;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }
        .see-more:hover {
            background: #0056b3;
        }
    </style>
</head>
    <h1>Laissez votre évaluation</h1>
    <form action="../../routes/feedback.php?id=addFeedback" method="POST">
        <label for="firstname">Votre prénom :</label>
        <input type="text" id="firstname" name="firstname" required>

        <label for="rate">Note (1 à 5) :</label>
        <div class="star-rating">
            <?php for ($i = 5; $i >= 1; $i--): ?>
                <input type="radio" id="star-<?= $i ?>" name="rate" value="<?= $i ?>" required>
                <label class="star" for="star-<?= $i ?>">★</label>
            <?php endfor; ?>
        </div>

        <label for="wording">Votre avis :</label>
        <textarea id="wording" name="wording" rows="4" required></textarea>

        <button type="submit">Envoyer</button>
    </form>

    <h2>Derniers avis</h2>
    <?php if (!empty($recentFeedbacks)): ?>
        <?php foreach (array_reverse($recentFeedbacks) as $feedback): ?>
            <div class="feedback-item">
                <strong>Prénom :</strong> <?= htmlspecialchars($feedback['firstname']) ?>
                <p><strong>Note :</strong> <?= htmlspecialchars($feedback['rate']) ?> / 5</p>
                <p><strong>Avis :</strong> <?= htmlspecialchars($feedback['wording']) ?></p>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Aucun avis pour le moment.</p>
    <?php endif; ?>
    <a href="all_feedbacks.php" class="see-more">Voir tous les avis</a>
</html>