<?php

require_once (dirname(__DIR__).'/init.php');

class DetailOrderController
{
    public static function addOrderDetails(DetailsOrder $details){
        $pdo= PDOUtils::getSharedInstance();
        $pdo->execSQL('INSERT INTO detail_orders (id, quantity, amount, id_product, id_order) VALUES (?, ?, ?, ?, ?)', [$details->getid(), $details->getQuantity(), $details->getAmount(), $details->getidProduct(), $details->getidOrder()]);
    }

    public static function getDetailsByOrderId($orderId){
        $pdo = PDOUtils::getSharedInstance();
        $result = $pdo->requestSQL('SELECT * FROM detail_orders WHERE id_order = ?', [$orderId]);
        $details = [];
        foreach ($result as $detail)
        {
            $details[] = new DetailsOrder($detail['id'], $detail['quantity'], $detail['amount'], $detail['id_order'], $detail['id_product']);
        }
        return $details;
    }

    public static function getAllOrders(){

        $pdo = PDOUtils::getSharedInstance();
        $result = $pdo->requestSQL('SELECT * FROM detail_orders');

        return $result;
    }
    
    public static function getAdminAllOrder(){

        $pdo = PDOUtils::getSharedInstance();
        $result = $pdo->requestSQL('SELECT 
                u.id AS user_id, 
                u.name AS user_name,
                u.firstname AS user_firstname,
                u.mail AS user_email,
                o.id AS order_id,
                o.date AS order_date,
                p.id AS product_id,
                p.name AS product_name,
                p.price AS product_price,
                d.quantity AS product_quantity,
                d.amount AS total_amount
            FROM 
                users u
            JOIN 
                orders o ON u.id = o.id_user
            JOIN 
                detail_orders d ON o.id = d.id_order
            JOIN 
                products p ON d.id_product = p.id
            ORDER BY 
                o.date DESC');

        return $result;
    }

    
}