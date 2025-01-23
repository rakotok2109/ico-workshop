<?php
require_once (dirname(dirname(__DIR__)).'/config/init.php');

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tous les avis</title>
</head>
<body>
    <h1>Tous les avis</h1>
    <?php
    $feedbacks = FeedbackController::getAllFeedbacks();

    if (!empty($feedbacks)) {
        foreach ($feedbacks as $feedback) {
            echo "<div style='border: 1px solid #ccc; padding: 10px; margin-bottom: 10px;'>";
            echo "<p><strong>Prénom :</strong> " . htmlspecialchars($feedback['firstname']) . "</p>";
            echo "<p><strong>Note :</strong> " . htmlspecialchars($feedback['rate']) . " / 5</p>";
            echo "<p><strong>Avis :</strong> " . htmlspecialchars($feedback['wording']) . "</p>";
            echo "</div>";
        }
    } else {
        echo "<p>Aucun avis pour le moment.</p>";
    }
    ?>
    <a href="index.php">Retour à l'accueil</a>
</body>
</html>
