<?php

require_once (__DIR__ . '/../init.php');  

class DetailsOrderController
{
    public static function addOrderDetails(DetailsOrder $details){
        $pdo= PDOUtils::getSharedInstance();
        $pdo->execSQL('INSERT INTO detail_orders (id, id_product, quantity, amount, id_order) VALUES (?, ?, ?, ?,?)', [$details->getidOrder(), $details->getidProduit(), $details->getQuantite(), $details->getPrix(), $details->getidOrder()]);
    }

    public static function getDetailsByOrderId($orderId){
        $pdo = PDOUtils::getSharedInstance();
        $result = $pdo->requestSQL('SELECT * FROM detail_orders WHERE id_order = ?', [$orderId]);
        $details = [];
        foreach ($result as $detail)
        {
            $details[] = new DetailsOrder($detail['id'], $detail['id_order'], $detail['id_product'], $detail['quantity'], $detail['amount']);
        }
        return $details;
    }
}


