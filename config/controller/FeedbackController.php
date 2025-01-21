<?php 

require_once ('../config/init.php');


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
        if ($feeback) {
            return new Product($feeback[0]['id'], $feeback[0]['firstname'], $feeback[0]['wording'], $feeback[0]['rate']);
        } else {
            return null;
        }
    }

    public static function addFeedback(Feedback $feeback)
    {   
        $pdo = PDOUtils::getSharedInstance();
        $pdo->execSQL('INSERT INTO feedbacks (firstname, wording, rate) VALUES (?, ?, ?)', [$product->getFirstname(), $product->getWording(), $product->getRate()]);
    }

    public static function updateFeedback(Feedback $feeback)
    {
        $pdo = PDOUtils::getSharedInstance();
        $pdo->execSQL('UPDATE feedbacks SET fisrtname = ?, wording = ?, rate = ? WHERE id = ?',
        [
            $feeback->getFirstname(),
            $feeback->getWording(),
            $feeback->getRate(),
            $feeback->getId()
        ]);

        header("Location: ../pages/DashboardAdminView.php");
        exit();

    }

    public static function deleteFeedback()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id_feeback = isset($_POST['id']) ? (int) $_POST['id'] : null;

            if ($id_feeback === null) {
                $_SESSION['error'] = "ID feedback invalide.";
                header("Location: ../pages/DashboardAdminView.php");
                exit();
            }

            try {
                $pdo = PDOUtils::getSharedInstance();
                $sql = "DELETE FROM feebacks WHERE id = ?";
                $pdo->execSQL($sql, [$id_feebackt]);

                $_SESSION['success'] = "L'avis a été supprimé avec succès.";
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