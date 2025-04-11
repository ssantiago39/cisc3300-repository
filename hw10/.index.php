<?php

require_once "app/models/Model.php";
require_once "app/models/Product.php";
require_once "app/controllers/ProductController.php";

$env = parse_ini_file('.env');
define('DBNAME', $env['DBNAME']);
define('DBHOST', $env['DBHOST']);
define('DBUSER', $env['DBUSER']);
define('DBPASS', $env['DBPASS']);

use app\controllers\ProductController;

$uri = strtok($_SERVER["REQUEST_URI"], '?');
$uriArray = explode("/", $uri);

$controller = new ProductController();

if (isset($uriArray[2]) && $uriArray[1] === 'api' && $uriArray[2] === 'products' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $controller->getAllProducts();
}

if (isset($uriArray[2]) && $uriArray[1] === 'api' && $uriArray[2] === 'products' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->saveProduct();
}

if (isset($uriArray[2]) && $uriArray[1] === 'api' && $uriArray[2] === 'products' && $_SERVER['REQUEST_METHOD'] === 'PUT') {
    $id = $uriArray[3] ?? null;
    $controller->updateProduct($id);
}

if (isset($uriArray[2]) && $uriArray[1] === 'api' && $uriArray[2] === 'products' && $_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $id = $uriArray[3] ?? null;
    $controller->deleteProduct($id);
} 

if (isset($uriArray[1]) && $uriArray[1] === 'products' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $controller->productsView();
}

if (isset($uriArray[1]) && $uriArray[1] === 'add-product' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $controller->productsAddView();
}

if (isset($uriArray[1]) && $uriArray[1] === 'update-product' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $controller->productsUpdateView();
}

if (isset($uriArray[1]) && $uriArray[1] === 'delete-product' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $controller->productsDeleteView();
}
