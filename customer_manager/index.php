<?php
require('../model/database.php');
require('../model/customer.php');
require('../model/customer_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'customer_list_page';
    }
}

switch ($action) {
    case 'customer_list_page':
        $customers = CustomerDB::getAll();
        $searchBy = "Last Name:";
        $buttonTxt = "Search";
        include('customer_list.php');
        break;
    case 'edit_customer':
        $customer_ID = filter_input(INPUT_POST, 'customer_ID', FILTER_VALIDATE_INT);

        if ($customer_ID == NULL || $customer_ID == FALSE) {
            $error = "Invalid data type or NULL";
            include('../errors/error.php');
        } else {
            $customer = CustomerDB::getCustomer($customer_ID);
            include('edit_customer.php');
        }
        break;
    case 'save_customer':
        $customer_ID = filter_input(INPUT_POST, 'customer_ID', FILTER_VALIDATE_INT);
        $firstName = filter_input(INPUT_POST, 'fname');
        $lastName = filter_input(INPUT_POST, 'lname');
        $address = filter_input(INPUT_POST, 'address');
        $city = filter_input(INPUT_POST, 'city');
        $state = filter_input(INPUT_POST, 'state');
        $postalCode = filter_input(INPUT_POST, 'postalCode', FILTER_VALIDATE_INT);
        $countryCode = filter_input(INPUT_POST, 'countryCode');
        $phone = filter_input(INPUT_POST, 'phone');
        $email = filter_input(INPUT_POST, 'email');
        $password = filter_input(INPUT_POST, 'password');
        if (
            $customer_ID == NULL || $customer_ID == FALSE || $firstName == NULL ||
            $lastName == NULL || $address == NULL || $city == NULL || $state == NULL ||
            $postalCode == FALSE || $postalCode == NULL || $countryCode == NULL ||
            $phone == NULL || $email == NULL || $password == NULL
        ) {
            $error = "Invalid data type or blank value. Check each field and try again.";
            include('../errors/error.php');
        } else {
            $customer = new Customer($customer_ID, $firstName, $lastName, $address, $city, $state, $postalCode, $countryCode, $phone, $email, $password);
            CustomerDB::updateCustomer($customer);
            header("Location: .?action=customer_list_page");
        }
        break;
    case 'show_results':
        $keyword = filter_input(INPUT_POST, 'keyword');
        if ($keyword == NULL) {
            header("Location: .?action=customer_list_page");
        } else {
            $customers = CustomerDB::getNameResults($keyword);
            //include('../view/search.php');
            $searchBy = "Last Name:";
            $buttonTxt = "Search";
            include('customer_list.php');
        }
        break;
}
