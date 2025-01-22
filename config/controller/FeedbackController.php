<?php 

require_once (dirname(__DIR__).'/init.php');


class FeedbackController {
    public static function  getAllFeedbacks()
    {
        $pdo = PDOUtils::getSharedInstance();
        $results = $pdo->requestSQL('SELECT id, firstname, wording, rate FROM feedbacks');
        return $results;
    }

    public static function getFeedbackbyId($id)
    {
        $pdo = PDOUtils::getSharedInstance();
        $feedback = $pdo->requestSQL('SELECT * FROM feedbacks WHERE id = ?', [intval($id)]);
        if ($feedback) {
            return new Product($feedback[0]['id'], $feedback[0]['firstname'], $feedback[0]['wording'], $feedback[0]['rate']);
        } else {
            return null;
        }
    }

    public static function addFeedback(Feedback $feedback)
    {   
        $pdo = PDOUtils::getSharedInstance();
        $pdo->execSQL('INSERT INTO feedbacks (firstname, wording, rate) VALUES (?, ?, ?)', [$feedback->getFirstname(), $feedback->getWording(), $feedback->getRate()]);
    }

    public static function updateFeedback(Feedback $feedback)
    {
        $pdo = PDOUtils::getSharedInstance();
        $pdo->execSQL('UPDATE feedbacks SET fisrtname = ?, wording = ?, rate = ? WHERE id = ?',
        [
            $feedback->getFirstname(),
            $feedback->getWording(),
            $feedback->getRate(),
            $feedback->getId()
        ]);

        header("Location: ../pages/admin/dashboard.php");
        exit();

    }

    public static function deleteFeedback()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id_feedback = isset($_POST['id']) ? (int) $_POST['id'] : null;

            if ($id_feedback === null) {
                $_SESSION['error'] = "ID feedback invalide.";
                header("Location: ../pages/admin/dashboard.php");
                exit();
            }

            try {
                $pdo = PDOUtils::getSharedInstance();
                $sql = "DELETE FROM feedbacks WHERE id = ?";
                $pdo->execSQL($sql, [$id_feedback]);

                $_SESSION['success'] = "L'avis a été supprimé avec succès.";
                header("Location: ../pages/admin/dashboard.php");
                exit();
            } catch (PDOException $e) {
                $_SESSION['error'] = "Erreur lors de la suppression : " . $e->getMessage();
                header("Location: ../pages/admin/dashboard.php");
                exit();
            }
        }
    }
}