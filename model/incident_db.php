<?php
class IncidentDB
{
    private static function bundleIncident($row)
    {
        $incident = new Incident(
            //$row['incidentID'],
            $row['customerID'],
            $row['productCode'],
            $row['dateOpened'],
            $row['title'],
            $row['description']
        );
        return $incident;
    }
    public static function addIncident($incident)
    {
        $db = Database::getDB();
        $query = 'INSERT INTO incidents
                    (customerID, productCode, dateOpened, title, description)
                 VALUES
                    (:customerID, :productCode, :dateOpened, :title, :description)';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':customerID', $incident->getCustomerID());
            $statement->bindValue(':productCode', $incident->getProductCode());
            $statement->bindValue(':dateOpened', $incident->getDateOpened());
            $statement->bindValue(':title', $incident->getTitle());
            $statement->bindValue(':description', $incident->getDescription());
            $statement->execute();
            $statement->closeCursor();
            return $db->lastInsertId();
        } catch (PDOException $e) {
            $error = Database::displayError($e->getMessage());
            include('../errors/error.php');
        }
    }
    public static function checkForRecord($lastIncidentID)
    {
        $db = Database::getDB();
        $query = 'SELECT EXISTS(SELECT * FROM incidents WHERE
                    incidentID = :incidentID) AS total';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':incidentID', $lastIncidentID);
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
