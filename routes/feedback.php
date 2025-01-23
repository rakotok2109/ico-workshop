<?php
require_once (dirname(__DIR__).'/config/init.php');

if($_GET['id'] == 'addFeedback') {
    $feedback = new Feedback(
        $_POST['firstname'],
        $_POST['wording'],
        $_POST['rate'] 
    );

    FeedbackController::addFeedback($feedback);
    header('Location: /pages/feedbacks.php');
}

else if($_GET['id'] == 'deleteFeedback') {
    FeedbackController::deleteFeedback();
    header('Location: /pages/feedbacks.php');

}


else if($_GET['id'] == 'updateFeedback') {
    $feedback = new Feedback(
        $_POST['firstname'],
        $_POST['wording'],
        $_POST['rate'],
        $_POST['id']
    );

    FeedbackController::updateFeedback($feedback);
    header('Location: /pages/feedbacks.php');

}

else{
    header('Location: /pages/home.php');
}