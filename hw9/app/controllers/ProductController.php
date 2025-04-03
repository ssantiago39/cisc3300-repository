<?php
namespace app\controllers;
use app\models\Product;

class ProductController {
    public function getProducts() {
        $productModel = new Product();
        $query = !empty($_GET['flavor']) ? $_GET['flavor'] : null;
        $products = $productModel->getProducts($query);
        echo json_encode($products);
        exit();
    }

    public function productsView() {
        include 'public/assets/views/product/products.html';
        exit();
    }
}
