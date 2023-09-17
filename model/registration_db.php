<?php
class RegistrationDB
{
    private static function bundleRegistration($row)
    {
        $registration = new Registration(
            $row['customerID'],
            $row['productCode'],
            $row['registrationDate']
        );
        return $registration;
    }
    public static function addRegistration($customerID, $productCode)
    {
        $db = Database::getDB();
        $query = 'INSERT INTO registrations
                    (customerID, productCode, registrationDate)
                  VALUES
                    (:custID, :prodCode, NOW())';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':custID', $customerID);
            $statement->bindValue(':prodCode', $productCode);
            $statement->execute();
            $statement->closeCursor();
            //return $db->lastInsertId();
        } catch (PDOException $e) {
            $error = Database::displayError($e->getMessage());
            include('../errors/error.php');
        }
    }
    public static function checkForRecord($customerID, $productCode)
    {
        $db = Database::getDB();
        $query = 'SELECT EXISTS(SELECT * FROM registrations WHERE
                    customerID = :custID AND productCode = :prodCode) AS total';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':custID', $customerID);
            $statement->bindValue(':prodCode', $productCode);
            $statement->execute();
            $row = $statement->fetch();
            $statement->closeCursor();
            return $row;
        } catch (PDOException $e) {
            $error = Database::displayError($e->getMessage());
            include('../errors/error.php');
        }
    }
}
