<?php
require('../model/database.php');
require('../model/technician.php');
require('../model/technician_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'technician_list_page';
    }
}

switch ($action) {
    case 'technician_list_page':
        $technicians = TechnicianDB::getAll();
        include('technician_list.php');
        break;
    case 'delete_technician':
        $tech_ID = filter_input(INPUT_POST, 'tech_ID', FILTER_VALIDATE_INT);
        TechnicianDB::deleteTechnician($tech_ID);
        header("Location: .?action=technician_list_page");
        break;
    case 'show_add_technician':
        include('add_technician.php');
        break;
    case 'add_technician':
        $tech_ID = TechnicianDB::nextID();
        $fname = filter_input(INPUT_POST, 'fname');
        $lname = filter_input(INPUT_POST, 'lname');
        $email = filter_input(INPUT_POST, 'email');
        $phone = filter_input(INPUT_POST, 'phone');
        $password = filter_input(INPUT_POST, 'password');
        if (
            $tech_ID == NULL || $fname == NULL || $lname == NULL ||
            $email == NULL || $phone == NULL || $password == NULL
        ) {
            $error = 'Invalid technician data. Check all fields and try again.';
            include('../errors/error.php');
        } else {
            $technician = new Technician($tech_ID, $fname, $lname, $email, $phone, $password);
            TechnicianDB::addTechnician($technician);
            // display added product
            header("Location: .?action=technician_list_page");
        }
        break;
}
