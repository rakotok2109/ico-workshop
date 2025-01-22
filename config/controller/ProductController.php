<?php 

require_once (dirname(__DIR__).'/init.php');


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
    public static function updateProduct(Product $product)
    {
        $pdo = PDOUtils::getSharedInstance();
        $pdo->execSQL('UPDATE products SET name = ?, price = ?, description = ?, image = ? WHERE id = ?',
        [
            $product->getName(),
            $product->getPrice(),
            $product->getDescription(),
            $product->getImage(),
            $product->getId()
        ]);

        header("Location: ../pages/admin/dashboard.php#products");
        exit();

    }

    public static function addProduct(Product $product)
    {   
        $pdo = PDOUtils::getSharedInstance();
        $pdo->execSQL('INSERT INTO products (name, price, description, image) VALUES (?, ?, ?, ?)', [$product->getName(), $product->getPrice(), $product->getDescription(), $product->getImage()]);

        header("Location: ../pages/admin/dashboard.php#products");
        exit();
    }

    public static function deleteProduct()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id_product = isset($_POST['id']) ? (int) $_POST['id'] : null;

            if ($id_product === null) {
                $_SESSION['error'] = "ID produit invalide.";
                header("Location: ../pages/admin/dashboard.php#products");
                exit();
            }

            try {
                $pdo = PDOUtils::getSharedInstance();
                $sql = "DELETE FROM products WHERE id = ?";
                $pdo->execSQL($sql, [$id_product]);

                $_SESSION['success'] = "Le produit a été supprimé avec succès.";
                header("Location: ../pages/admin/dashboard.php#products");
                exit();
            } catch (PDOException $e) {
                $_SESSION['error'] = "Erreur lors de la suppression : " . $e->getMessage();
                header("Location: ../../pages/admin/dashboard.php#products");
                exit();
            }
        }
    }
}