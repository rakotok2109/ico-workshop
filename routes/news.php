<?php
require_once ('../config/init.php');

if($_GET['id'] == 'addNews') {
    $news = new News(
        $_POST['title'],
        $_POST['wording'],
        $_POST['date']  
    );

    NewsController::addNews($news);
}

else if($_GET['id'] == 'deleteNews') {
    NewsController::deleteNews();
}


else if($_GET['id'] == 'updateNews') {
    $news = new News(
        $_POST['title'],
        $_POST['wording'],
        $_POST['date'],
        $_POST['id']
    );

    NewsController::updateNews($news);
}

else{
    header('Location: /pages/home.php');
}