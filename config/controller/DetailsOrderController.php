<?php

require_once ($_SERVER['DOCUMENT_ROOT'] . '/config/init.php');

class DetailsOrderController
{
    public static function addOrderDetails(DetailsOrder $details){
        $pdo= PDOUtils::getSharedInstance();
        $pdo->execSQL('INSERT INTO detail_order (id, id_product, quantity, amount) VALUES (?, ?, ?, ?)', [$details->getidOrder(), $details->getidProduit(), $details->getQuantite(), $details->getPrix()]);
    }

    public static function getDetailsByOrderId($orderId){
        $pdo = PDOUtils::getSharedInstance();
        $result = $pdo->requestSQL('SELECT * FROM detail_order WHERE id_order = ?', [$orderId]);
        $details = [];
        foreach ($result as $detail)
        {
            $details[] = new DetailsOrder($detail['id'], $detail['id_order'], $detail['id_product'], $detail['quantity'], $detail['amount']);
        }
        return $details;
    }
}


