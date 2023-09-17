<?php
class TechnicianDB
{
    private static function bundleTechnician($row)
    {
        $technician = new Technician(
            $row['techID'],
            $row['firstName'],
            $row['lastName'],
            $row['email'],
            $row['phone'],
            $row['password']
        );
        return $technician;
    }

    public static function getAll()
    {
        $db = Database::getDB();
        $query = "SELECT * FROM technicians";
        try {
            $statement = $db->prepare($query);
            $statement->execute();
            $rows = $statement->fetchAll();
            $statement->closeCursor();

            $techs = [];
            foreach ($rows as $row) {
                $techs[] = self::bundleTechnician($row);
            }
            return $techs;
        } catch (PDOException $e) {
            $error = Database::displayError($e->getMessage());
            include('../errors/error.php');
        }
    }

    public static function deleteTechnician($tech_ID)
    {
        $db = Database::getDB();
        $query = 'DELETE FROM technicians
                  WHERE techID = :tech_ID';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':tech_ID', $tech_ID);
            $success = $statement->execute();
            $statement->closeCursor();
            return $success;
        } catch (PDOException $e) {
            $error = Database::displayError($e->getMessage());
            include('../errors/error.php');
        }
    }

    public static function addTechnician($technician)
    {
        $db = Database::getDB();
        $query = 'INSERT INTO technicians
                    (techID, firstName, lastName, email, phone, password)
                 VALUES
                    (:tech_ID, :fName, :lName, :email, :phone, :password)';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':tech_ID', $technician->getID());
            $statement->bindValue(':fName', $technician->getFname());
            $statement->bindValue(':lName', $technician->getLname());
            $statement->bindValue(':email', $technician->getEmail());
            $statement->bindValue(':phone', $technician->getPhone());
            $statement->bindValue(':password', $technician->getPassword());
            $statement->execute();
            $statement->closeCursor();
            return $db->lastInsertId();
        } catch (PDOException $e) {
            $error = Database::displayError($e->getMessage());
            include('../errors/error.php');
        }
    }

    public static function nextID()
    {
        $db = Database::getDB();
        $query = "SELECT techID FROM technicians ORDER BY techID DESC LIMIT 1";
        try {
            $statement = $db->prepare($query);
            $statement->execute();
            $lastID = $statement->fetch();
            $statement->closeCursor();

            $nextID = $lastID[0] + 1;
            return $nextID;
        } catch (PDOException $e) {
            $error = Database::displayError($e->getMessage());
            include('../errors/error.php');
        }
    }
}
