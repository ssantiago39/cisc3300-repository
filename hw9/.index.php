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

if ($uriArray[1] === 'api' && $uriArray[2] === 'products' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $controller = new ProductController();
    $controller->getProducts();
}

if ($uriArray[1] === 'products' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $controller = new ProductController();
    $controller->productsView();
}

include 'public/assets/views/product/products.html'; 
exit();
