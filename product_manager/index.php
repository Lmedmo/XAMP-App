<?php
require('../model/database.php');
require('../model/product.php');
require('../model/product_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'product_list_page';
    }
}

switch ($action) {
    case 'product_list_page':
        $products = ProductDB::getAll();
        include('product_list.php');
        break;
    case 'delete_product':
        $product_code = filter_input(INPUT_POST, 'product_code');
        ProductDB::deleteProduct($product_code);
        header("Location: .?action=product_list_page");
        break;
    case 'show_add_product':
        include('add_product.php');
        break;
    case 'add_product':
        $product_code = filter_input(INPUT_POST, 'code');
        $product_name = filter_input(INPUT_POST, 'name');
        $product_version = filter_input(INPUT_POST, 'version', FILTER_VALIDATE_FLOAT);
        $product_releaseDate = filter_input(INPUT_POST, 'date');
        if (
            $product_code == NULL || $product_name == NULL || $product_version == NULL ||
            $product_version === FALSE
        ) {
            $error = 'Invalid product data. Check all fields and try again.';
            include('../errors/error.php');
        } else {
            $product = new Product($product_code, $product_name, $product_version, $product_releaseDate);
            ProductDB::addProduct($product);
            // display added product
            header("Location: .?action=product_list_page");
        }
        break;
}
