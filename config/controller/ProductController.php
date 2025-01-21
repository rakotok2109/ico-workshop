<?php 

require_once ('../config/init.php');


class ProductController {
    public static function  getAllProducts()
    {
        $pdo = PDOUtils::getSharedInstance();
        $results = $pdo->requestSQL('SELECT id, name, price, description, image FROM products');
        return $results;
    }

    public static function getProductbyId($id)
    {
        $pdo = PDOUtils::getSharedInstance();
        $product = $pdo->requestSQL('SELECT * FROM products WHERE id = ?', [intval($id)]);
        if ($product) {
            return new Product($product[0]['id'], $product[0]['name'], $product[0]['price'], $product[0]['description'], $product[0]['image']);
        } else {
            return null;
        }
    }

    public static function addProduct(Product $product)
    {   
        $pdo = PDOUtils::getSharedInstance();
        $pdo->execSQL('INSERT INTO products (name, price, description) VALUES (?, ?, ?)', [$product->getNom(), $product->getPrix(), $product->getDescription()]);
    }
}