<?php 

class PDOUtils {
    private $pdo_;
    private static $sharedInstance_;

    private function __construct() {
        $config = require(dirname(__DIR__) . '/config/config');
        
        // Définir l'environnement ici (par exemple, 'development' ou 'production')
        $environment = 'production'; 
        // $environment = 'development'; 
        $dbConfig = $config[$environment];

        $dsn = "mysql:host={$dbConfig['host']};dbname={$dbConfig['dbname']};charset=utf8";
        $this->pdo_ = new PDO($dsn, $dbConfig['username'], $dbConfig['password'], [
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        ]);
    }

    public static function getSharedInstance()
    {
        if (!isset(PDOUtils::$sharedInstance_)) {
            PDOUtils::$sharedInstance_ = new PDOUtils();
        }
    
        return PDOUtils::$sharedInstance_;
    }

    public function requestSQL($sql, $params = null) {
        $statement = $this->pdo_->prepare($sql);
        
        // Vérifie si la préparation de la requête a réussi
        if ($statement) {
            // Exécute la requête avec les paramètres fournis
            if ($statement->execute($params)) {
               
                $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                unset($statement);
                return $result;
            } else {
                // Gérer les erreurs d'exécution
                throw new Exception('Erreur lors de l\'exécution de la requête : ' . implode(", ", $statement->errorInfo()));
            }
        } else {
            // Gérer les erreurs de préparation
            throw new Exception('Erreur lors de la préparation de la requête : ' . implode(", ", $this->pdo_->errorInfo()));
        }
    }
    public function execSQL($sql, $params = null) {
        $statement = $this->pdo_->prepare($sql);
        if($statement && $statement->execute($params)) {
           
            unset($statement);
            return true;
        }
        return false;
       
    }

    public function lastInsertId() {
        return $this->pdo_->lastInsertId();
    }
}