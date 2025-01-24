<?php
require_once (dirname(__DIR__).'/init.php');

class CardController {
    public static function getAllCards(){
        $pdo = PDOUtils::getSharedInstance();
        $results = $pdo->requestSQL('SELECT id, name, type, description, image  FROM cards');
        return $results;

    }

    public static function addCard( Card $card){
        try{
            $pdo = PDOUtils::getSharedInstance();
            $results = $pdo->execSQL('INSERT INTO cards (name, type, description, image) VALUES (?,?,?,?)', [$card->getName(), $card->getType(), $card->getDescription(), $card->getImage()]);
            
            $_SESSION['success'] = "Ajout de la carte avec succès";
            
        }catch (PDOException $e){

            $_SESSION['error'] ="Il y'a eu une erreur" . $e->getMessage();
        }
        
    }

    public static function deleteCard()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id_card = isset($_POST['id']) ? (int) $_POST['id'] : null;

            if ($id_card === null) {
                $_SESSION['error'] = "ID carte invalide.";
                header("Location: ../pages/admin/dashboard.php#cards");
                exit();
            }

            try {
                $pdo = PDOUtils::getSharedInstance();
                $sql = "DELETE FROM cards WHERE id = ?";
                $pdo->execSQL($sql, [$id_card]);

                $_SESSION['success'] = "La carte a été supprimé avec succès.";
                header("Location: ../pages/admin/dashboard.php#cards");
                exit();
            } catch (PDOException $e) {
                $_SESSION['error'] = "Erreur lors de la suppression : " . $e->getMessage();
                header("Location: ../pages/admin/dashboard.php#cards");
                exit();
            }
        }
    }

    public static function updateCard(Card $card)
    {
        $pdo = PDOUtils::getSharedInstance();
        $pdo->execSQL('UPDATE cards SET name = ?, type = ?, description = ?, image = ? WHERE id = ?',
        [
            $card->getName(),
            $card->getType(),
            $card->getDescription(),
            $card->getImage(),
            $card->getId()
        ]);
        exit();
    }

    


}