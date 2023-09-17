<?php
class ProductDB
{
    private static function bundleProduct($row)
    {
        $product = new Product(
            $row['productCode'],
            $row['name'],
            $row['version'],
            $row['releaseDate']
        );
        return $product;
    }

    public static function getAll()
    {
        $db = Database::getDB();
        $query = "SELECT * FROM products";
        try {
            $statement = $db->prepare($query);
            $statement->execute();
            $rows = $statement->fetchAll();
            $statement->closeCursor();

            $products = [];
            foreach ($rows as $row) {
                $products[] = self::bundleProduct($row);
            }
            return $products;
        } catch (PDOException $e) {
            $error = Database::displayError($e->getMessage());
            include('../errors/error.php');
        }
    }

    public static function deleteProduct($product_code)
    {
        $db = Database::getDB();
        $query = 'DELETE FROM products
                  WHERE productCode = :product_code';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':product_code', $product_code);
            $success = $statement->execute();
            $statement->closeCursor();
            return $success;
        } catch (PDOException $e) {
            $error = Database::displayError($e->getMessage());
            include('../errors/error.php');
        }
    }

    public static function addProduct($product)
    {
        $db = Database::getDB();
        $query = 'INSERT INTO products
                    (productCode, name, version, releaseDate)
                 VALUES
                    (:code, :name, :version, :date)';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':code', $product->getCode());
            $statement->bindValue(':name', $product->getName());
            $statement->bindValue(':version', $product->getVersion());
            $statement->bindValue(':date', $product->getReleaseDate());
            $statement->execute();
            $statement->closeCursor();
            return $db->lastInsertId();
        } catch (PDOException $e) {
            $error = Database::displayError($e->getMessage());
            include('../errors/error.php');
        }
    }
}
