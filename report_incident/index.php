<?php

require_once('../model/database.php');
require_once('../model/customer.php');
require_once('../model/customer_db.php');
require_once('../model/product_db.php');
require_once('../model/product.php');
//require_once('../model/registration.php');
//require_once('../model/registration_db.php');
require_once('../model/incident.php');
require_once('../model/incident_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'customer_lookup_page';
    }
}

switch ($action) {
    case 'customer_lookup_page':
        $searchBy = "Email:";
        $buttonTxt = "Get Customer";
        include('customer_lookup.php');
        break;
    case 'show_results':
        $keyword = filter_input(INPUT_POST, 'keyword');
        if ($keyword == NULL) {
            $error = "Invalid Customer Email";
            include('../errors/error.php');
        } else {
            $customer = CustomerDB::getEmailResults($keyword);
            if (sizeof($customer) > 1 || $customer == NULL) {
                $error = "Invalid Customer Email";
                include('../errors/error.php');
            } else {
                foreach ($customer as $the_customer) :
                    $first = htmlspecialchars($the_customer->getFname());
                    $last = htmlspecialchars($the_customer->getLname());
                    $customerID = intval($the_customer->getID());
                    $customer_name = "{$first} {$last}";
                endforeach;
                $products = ProductDB::getAll();
                $result = 'unset';
                include('create_incident.php');
            }
        }
        break;
    case 'create_incident':
        $productCode = filter_input(INPUT_POST, 'productCode');
        $customerID = filter_input(INPUT_POST, 'customerID', FILTER_VALIDATE_INT);
        $title = filter_input(INPUT_POST, 'title');
        $description = filter_input(INPUT_POST, 'description');
        $dateOpened = date("Y-m-d H:i:s");

        if ($productCode == NULL || $customerID == NULL || $customerID == FALSE || $title == NULL || $description == NULL) {
            $error = "Failed. Invalid Data types or NULL values";
            include('../errors/error.php');
        } else {
            $incident = new Incident($customerID, $productCode, $dateOpened, $title, $description);
            $lastID = IncidentDB::addIncident($incident);
            $exists = IncidentDB::checkForRecord($lastID);
            if ($exists['total'] == NULL || $exists['total'] == FALSE || $exists['total'] == 0) {
                $error = "Failed. Incident not successfully added to database";
                include('../errors/error.php');
            } else {
                $result = 'added';
                include('create_incident.php');
            }
        }
        break;
}
