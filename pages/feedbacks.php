<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tous les avis</title>
    <link rel="stylesheet" href="../ressources/css/feedbacks.css">
</head>
<body>

    <?php
        require_once (__DIR__ . '/components/navbar.php');
        require_once(dirname(__DIR__) . '/config/init.php');
        $feedbacks = FeedbackController::getAllFeedbacks();
    ?>

    <div class="feedbacks-container">
        <h1 class="page-title">Tous les avis</h1>

        <?php if (!empty($feedbacks)): ?>
            <div class="feedback-list">
                <?php foreach ($feedbacks as $feedback): ?>
                    <div class="feedback-card">
                        <h2><?= htmlspecialchars($feedback['firstname']); ?></h2>
                        <p class="rating">Note : <?= htmlspecialchars($feedback['rate']); ?> / 5</p>
                        <p class="feedback-text"><?= htmlspecialchars($feedback['wording']); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p class="no-feedback">Aucun avis pour le moment.</p>
        <?php endif; ?>
    </div>

</body>
</html>