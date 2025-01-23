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
}