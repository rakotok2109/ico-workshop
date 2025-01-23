<?php

require_once (dirname(__DIR__).'/init.php');


class OrderController {
    public static function addOrder(Order $order) {
        try{
            $pdo = PDOUtils::getSharedInstance();
            $pdo->execSQL('INSERT INTO orders (id_user, date) VALUES (?, ?)', [$order->getIdUser(), $order->getDate()]);
    
            return $pdo->lastInsertId();
        }
        catch (PDOException $e) {
            // Affiche le message d'erreur en cas d'exception PDO
            echo 'Erreur de base de données : ' . $e->getMessage();
             return null; // Retourne null en cas d'échec
        } catch (Exception $e) {
            // Affiche le message d'erreur pour d'autres exceptions
            echo 'Erreur : ' . $e->getMessage();
             return null; // Retourne null en cas d'échec
        }
       
    }

    public static function getOrdersForUser($idUser) {
        $pdo = PDOUtils::getSharedInstance();
        $result = $pdo->requestSQL('SELECT * FROM orders WHERE id_user = ?', [$idUser]);


        $orders = [];
        foreach ($result as $row) {
            $order = new Order($row['id'], $row['date'], $row['id_user'] );
            $orders[] = $order;
        }
      
        return $orders;
    }

   
        public static function getAllOrderDetails() {
            $pdo = PDOUtils::getSharedInstance();
            
            // Requête SQL pour récupérer les informations sur les commandes, prix, date, quantité
            $sql = 'SELECT u.name AS user_name, u.firstname AS user_firstname, o.id AS order_id, 
                            p.name AS product_name, do.quantity, p.price, o.date
                    FROM orders o
                    JOIN users u ON o.id_user = u.id
                    JOIN detail_orders do ON o.id = do.id_order
                    JOIN products p ON do.id_product = p.id';
            
            $result = $pdo->requestSQL($sql);
            return $result;  // Retourne tous les résultats
        }
    
    
    
    
}