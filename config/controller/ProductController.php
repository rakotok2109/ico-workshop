<?php

require_once (__DIR__ . '/../init.php');  


class ProductController
{
    public static function  getAllProducts()
    {
        $pdo = PDOUtils::getSharedInstance();
        $products = $pdo->requestSQL('SELECT * FROM products');
        $productList = [];
        foreach ($products as $product) {
            $productList[] = new Product($product['id'], $product['name'], $product['price'], $product['description'], $product['image']);
        }
        return $productList;
    }

    public static function getProduct($id)
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