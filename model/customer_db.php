<?php
class CustomerDB
{
    private static function bundleCustomer($row)
    {
        $customer = new Customer(
            $row['customerID'],
            $row['firstName'],
            $row['lastName'],
            $row['address'],
            $row['city'],
            $row['state'],
            $row['postalCode'],
            $row['countryCode'],
            $row['phone'],
            $row['email'],
            $row['password']
        );
        return $customer;
    }

    public static function getAll()
    {
        $db = Database::getDB();
        $query = "SELECT * FROM customers";
        try {
            $statement = $db->prepare($query);
            $statement->execute();
            $rows = $statement->fetchAll();
            $statement->closeCursor();

            $customers = [];
            foreach ($rows as $row) {
                $customers[] = self::bundleCustomer($row);
            }
            return $customers;
        } catch (PDOException $e) {
            $error = Database::displayError($e->getMessage());
            include('../errors/error.php');
        }
    }

    public static function getCustomer($customer_id)
    {
        $db = Database::getDB();
        $query = 'SELECT * FROM customers WHERE customerID = :customerID';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':customerID', $customer_id);
            $statement->execute();
            $row = $statement->fetch();
            $statement->closeCursor();
            return self::bundleCustomer($row);
        } catch (PDOException $e) {
            $error = Database::displayError($e->getMessage());
            include('../errors/error.php');
        }
    }
    public static function updateCustomer($customer)
    {
        $db = Database::getDB();
        $query = 'UPDATE customers SET firstName = :fname, lastName = :lname,
                    address = :address, city = :city, state = :state, postalCode = :postal,
                    countryCode = :country, phone = :phone, email = :email, password = :password
                  WHERE customerID = :customerID';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':customerID', $customer->getID());
            $statement->bindValue(':fname', $customer->getFname());
            $statement->bindValue(':lname', $customer->getLname());
            $statement->bindValue(':address', $customer->getAddress());
            $statement->bindValue(':city', $customer->getCity());
            $statement->bindValue(':state', $customer->getState());
            $statement->bindValue(':postal', $customer->getPostal());
            $statement->bindValue(':country', $customer->getCountry());
            $statement->bindValue(':phone', $customer->getPhone());
            $statement->bindValue(':email', $customer->getEmail());
            $statement->bindValue(':password', $customer->getPassword());
            $statement->execute();
            $statement->closeCursor();
            return $db->lastInsertId();
        } catch (PDOException $e) {
            $error = Database::displayError($e->getMessage());
            include('../errors/error.php');
        }
    }

    public static function getNameResults($criteria)
    {
        $db = Database::getDB();
        $query = "SELECT * FROM customers WHERE lastName = :criteria";
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':criteria', $criteria);
            $statement->execute();
            $rows = $statement->fetchAll();
            $statement->closeCursor();

            $customers = [];
            foreach ($rows as $row) {
                $customers[] = self::bundleCustomer($row);
            }
            return $customers;
        } catch (PDOException $e) {
            $error = Database::displayError($e->getMessage());
            include('../errors/error.php');
        }
    }

    public static function getEmailResults($criteria)
    {
        $db = Database::getDB();
        $query = "SELECT * FROM customers WHERE email = :criteria";
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':criteria', $criteria);
            $statement->execute();
            $rows = $statement->fetchAll();
            $statement->closeCursor();

            $customers = [];
            foreach ($rows as $row) {
                $customers[] = self::bundleCustomer($row);
            }
            return $customers;
        } catch (PDOException $e) {
            $error = Database::displayError($e->getMessage());
            include('../errors/error.php');
        }
    }
}
