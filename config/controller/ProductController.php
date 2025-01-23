<?php 

require_once (dirname(__DIR__).'/init.php');


class ProductController {
    public static function  getAllProducts()
    {
        $pdo = PDOUtils::getSharedInstance();
        $results = $pdo->requestSQL('SELECT id, name, price, description, image FROM products');
        $products = [];
        foreach ($results as $row) {
            $products[] = new Product( $row['name'], $row['price'], $row['description'], $row['image'],$row['id']);
        }
        return $products;
    }

    public static function getProductById($productId)
    {
        $pdo = PDOUtils::getSharedInstance();
        $result = $pdo->requestSQL('SELECT * FROM products WHERE id = ?', [intval($productId)]);

        if ($result) {
            $product = $result[0]; // Prendre le premier élément du tableau (le produit)
            return new Product($product['name'], $product['price'], $product['description'], $product['image'], $product['id']);
        }
        return null; // Si aucun produit trouvé, retourne null
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

        header("Location: ../pages/admin/dashboard.php");
        exit();

    }

    public static function addProduct(Product $product)
    {   
        $pdo = PDOUtils::getSharedInstance();
        $pdo->execSQL('INSERT INTO products (name, price, description, image) VALUES (?, ?, ?, ?)', [$product->getName(), $product->getPrice(), $product->getDescription(), $product->getImage()]);

        header("Location: ../pages/admin/dashboard.php");
        exit();
    }

    public static function deleteProduct()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id_product = isset($_POST['id']) ? (int) $_POST['id'] : null;

            if ($id_product === null) {
                $_SESSION['error'] = "ID produit invalide.";
                header("Location: ../pages/admin/dashboard.php");
                exit();
            }

            try {
                $pdo = PDOUtils::getSharedInstance();
                $sql = "DELETE FROM products WHERE id = ?";
                $pdo->execSQL($sql, [$id_product]);

                $_SESSION['success'] = "Le produit a été supprimé avec succès.";
                header("Location: ../pages/admin/dashboard.php");
                exit();
            } catch (PDOException $e) {
                $_SESSION['error'] = "Erreur lors de la suppression : " . $e->getMessage();
                header("Location: ../../pages/admin/dashboard.php");
                exit();
            }
        }
    }
}