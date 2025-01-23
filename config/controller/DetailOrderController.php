<?php

require_once (dirname(__DIR__).'/init.php');

class DetailOrderController
{
    public static function addOrderDetails(DetailsOrder $details){
        $pdo= PDOUtils::getSharedInstance();
     $result=   $pdo->execSQL('INSERT INTO detail_orders (id, quantity, amount, id_product, id_order) VALUES (?, ?, ?, ?, ?)', [$details->getId(), $details->getQuantity(), $details->getAmount(), $details->getidProduct(), $details->getidOrder()]);
     return $result;
    }

    public static function getDetailsByOrderId($orderId){
        $pdo = PDOUtils::getSharedInstance();
        $result = $pdo->requestSQL('SELECT * FROM detail_orders WHERE id_order = ?', [$orderId]);
        $details = [];
        foreach ($result as $detail)
        {
            $details[] = new DetailsOrder( $detail['quantity'], $detail['amount'], $detail['id_order'], $detail['id_product'],$detail['id']);
        }
        return $details;
    }

    public static function getAllOrders(){

        $pdo = PDOUtils::getSharedInstance();
        $result = $pdo->requestSQL('SELECT * FROM detail_orders');

        return $result;
    }
    
    public static function getAdminAllOrders(){

        $pdo = PDOUtils::getSharedInstance();
        $result = $pdo->requestSQL('SELECT 
            users.id AS id_user, 
            users.name AS name,
            users.firstname AS firstname,
            users.mail AS email,
            orders.id AS id_order,
            orders.date AS date_order,  
            products.id AS id_product,
            products.name AS product_name,
            products.price AS price,
            detail_orders.quantity AS quantity,
            (products.price * detail_orders.quantity) AS total_amount  
            FROM 
                users
            INNER JOIN 
                orders ON users.id = orders.id_user
            INNER JOIN 
                detail_orders ON orders.id = detail_orders.id_order
            INNER JOIN 
                products ON detail_orders.id_product = products.id
            ORDER BY 
                orders.date DESC');

        return $result;
    }

    
}