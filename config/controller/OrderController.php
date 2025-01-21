<?php

require_once ($_SERVER['DOCUMENT_ROOT'] . '/config/init.php');


class OrderController {
    public static function addOrder(Order $order) {
        $pdo = PDOUtils::getSharedInstance();
        $pdo->execSQL('INSERT INTO orders (id_user, date) VALUES (?, ?)', [$order->getIdUser(), $order->getDate()]);
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
}