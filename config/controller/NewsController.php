<?php 

require_once (dirname(__DIR__).'/init.php');


class NewsController {
    public static function getAllNews()
    {
        $pdo = PDOUtils::getSharedInstance();
        $results = $pdo->requestSQL('SELECT id, title, wording, date FROM news');
        return $results;
    }

    public static function getNewsbyId($id)
    {
        $pdo = PDOUtils::getSharedInstance();
        $news = $pdo->requestSQL('SELECT * FROM news WHERE id = ?', [intval($id)]);
        if ($news) {
            return new News($news[0]['id'], $news[0]['title'], $news[0]['wording'], $news[0]['date']);
        } else {
            return null;
        }
    }
    public static function updateNews(News $news)
    {
        $pdo = PDOUtils::getSharedInstance();
        $pdo->execSQL('UPDATE news SET title = ?, wording = ?, date = ? WHERE id = ?',
        [
            $news->getTitle(),
            $news->getWording(),
            $news->getDate(),
            $news->getId()
        ]);

        header("Location: ../pages/DashboardAdminView.php");
        exit();

    }

    public static function addNews(News $news)
    {   
        $pdo = PDOUtils::getSharedInstance();
        $pdo->execSQL('INSERT INTO news (title, wording, date) VALUES (?, ?, ?)', [$news->getTitle(), $news->getWording(), $news->getDate()]);

        header("Location: ../pages/DashboardAdminView.php");
        exit();
    }

    public static function deleteNews()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id_news = isset($_POST['id']) ? (int) $_POST['id'] : null;

            if ($id_news === null) {
                $_SESSION['error'] = "ID produit invalide.";
                header("Location: ../pages/DashboardAdminView.php");
                exit();
            }

            try {
                $pdo = PDOUtils::getSharedInstance();
                $sql = "DELETE FROM news WHERE id = ?";
                $pdo->execSQL($sql, [$id_news]);

                $_SESSION['success'] = "L'actualité' a été supprimé avec succès.";
                header("Location: ../pages/DashboardAdminView.php");
                exit();
            } catch (PDOException $e) {
                $_SESSION['error'] = "Erreur lors de la suppression : " . $e->getMessage();
                header("Location: ../../pages/DashboardAdminView.php");
                exit();
            }
        }
    }
}