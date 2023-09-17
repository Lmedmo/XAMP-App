<?php
require_once('../model/database.php');
require_once('../model/customer.php');
require_once('../model/customer_db.php');
require_once('../model/product_db.php');
require_once('../model/product.php');
require_once('../model/registration.php');
require_once('../model/registration_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'customer_signin_page';
    }
}

switch ($action) {
    case 'customer_signin_page':
        $searchBy = "Email:";
        $buttonTxt = "Login";
        include('customer_signin.php');
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
                include('register_product.php');
            }
        }
        break;
    case 'register_product':
        $productCode = filter_input(INPUT_POST, 'productCode');
        $customerID = filter_input(INPUT_POST, 'customerID', FILTER_VALIDATE_INT);
        $exists = 'Database Error';

        if ($productCode == NULL || $customerID == NULL || $customerID == FALSE) {
            $error = "Failed. Invalid Data types or NULL values";
            include('../errors/error.php');
        } else {
            $exists = RegistrationDB::checkForRecord($customerID, $productCode);
        }

        if ($exists['total'] == NULL || $exists['total'] == FALSE || $exists['total'] == 0) {
            RegistrationDB::addRegistration($customerID, $productCode);
            $exists = RegistrationDB::checkForRecord($customerID, $productCode);
            if ($exists['total'] == NULL || $exists['total'] == FALSE || $exists['total'] == 0) {
                $error = "Failed. Product not successfully added to database";
                include('../errors/error.php');
            } else {
                include('registered.php');
            }
        } else if ($exists == 'Database Error') {
            $error = $exists;
            include('../errors/error.php');
        } else {
            $error = "Failed. Product already registered for this Customer";
            include('../errors/error.php');
        }
        break;
}
