<?php
require_once (dirname(__DIR__).'/init.php');

class CardController {

    public static function getAllCard(){
        
        $pdo = PDOUtils::getSharedInstance();
        $results = $pdo->requestSQL('SELECT id, type, nom, couleur, dos, role_de_carte, path  FROM carte');
        return $results;

    }

    public static function createCard( Card $carte){
        try{
            $pdo = PDOUtils::getSharedInstance();
            $results = $pdo->execSQL('INSERT INTO carte (type, nom, couleur, dos, role_de_carte, path) VALUES (?,?,?,?,?,?)', [$carte->getType(), $carte->getNom(), $carte->getCouleur(), $carte->getDos(), $carte->getRoleDeCarte(), $carte->getPath()]);
            
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
                $_SESSION['error'] = "ID produit invalide.";
                header("Location: ../pages/dashboard.php");
                exit();
            }

            try {
                $pdo = PDOUtils::getSharedInstance();
                $sql = "DELETE FROM carte WHERE id = ?";
                $pdo->execSQL($sql, [$id_card]);

                $_SESSION['success'] = "La carte a été supprimé avec succès.";
                header("Location: ../pages/dashboard.php");
                exit();
            } catch (PDOException $e) {
                $_SESSION['error'] = "Erreur lors de la suppression : " . $e->getMessage();
                header("Location: ../pages/dashboard.php");
                exit();
            }
        }
    }

    public static function updateCard(Card $card)
    {
        $pdo = PDOUtils::getSharedInstance();
        $pdo->execSQL('UPDATE carte SET type = ?, nom = ?, couleur = ?, dos = ?, role_de_carte = ?, path = ? WHERE id = ?',
        [
            $card->getType(),
            $card->getNom(),
            $card->getCouleur(),
            $card->getDos(),
            $card->getRoleDeCarte(),
            $card->getPath(),
            $card->getId()
        ]);

        header("Location: ../pages/dashboard.php");
        exit();

    }

    


}