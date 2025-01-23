<?php
require_once (dirname(__DIR__).'/init.php');

class CarteController {

    public static function getAllCarte(){
        
        $pdo = PDOUtils::getSharedInstance();
        $results = $pdo->requestSQL('SELECT id, type, nom, couleur, dos, role_de_carte, path,  FROM carte');
        return $results;

    }

    public static function createCarte( Carte $carte){
        try{
            $pdo = PDOUtils::getSharedInstance();
            $results = $pdo->exeqSQL('INSERT INTO carte (type, nom, couleur, dos, role_de_carte, path) VALUES (?,?,?,?,?,?)', [$carte->getType(), $carte->getNom(), $carte->getCouleur(), $carte->getDos(), $carte->getRoleDeCarte(), $carte->getPath()]);
            
            $_SESSION['success'][] = 0;
            
        }catch (PDOException $e){

            $_SESSION['error'][] = 0 . $e->getMessage();
        }
        
    }

    


}