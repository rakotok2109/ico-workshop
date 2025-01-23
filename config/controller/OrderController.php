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
            echo 'Erreur de base de données : ' . $e->getMessage();
             return null;
        } catch (Exception $e) {
            echo 'Erreur : ' . $e->getMessage();
             return null;
        }
       
    }

    public static function getOrdersForUser($idUser) {
        $pdo = PDOUtils::getSharedInstance();
        $result = $pdo->requestSQL('SELECT * FROM orders WHERE id_user = ?', [$idUser]);


        $orders = [];
        foreach ($result as $row) {
            $order = new Order($row['id'],  $row['id_user'], $row['date']);
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