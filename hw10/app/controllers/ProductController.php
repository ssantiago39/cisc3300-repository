<?php

namespace app\controllers;

use app\models\Product;

class ProductController
{
    public function validateProduct($inputData) {
        $errors = [];
        $flavor = $inputData['flavor'];
        $price = $inputData['price'];

        if ($flavor) {
            $flavor = htmlspecialchars($flavor, ENT_QUOTES | ENT_HTML5, 'UTF-8', true);
            if (strlen($flavor) < 2) {
                $errors['flavorShort'] = 'Flavor name is too short';
            }
        } else {
            $errors['requiredFlavor'] = 'Flavor name is required';
        }

        if ($price) {
            if (!is_numeric($price) || $price <= 0) {
                $errors['invalidPrice'] = 'Price must be a positive number';
            }
        } else {
            $errors['requiredPrice'] = 'Price is required';
        }

        if (count($errors)) {
            http_response_code(400);
            echo json_encode($errors);
            exit();
        }

        return [
            'flavor' => $flavor,
            'price' => $price,
        ];
    }

    public function getAllProducts() {
        $productModel = new Product();
        header("Content-Type: application/json");
        $query = $_GET['flavor'] ?? null;
        $products = $productModel->getProducts($query);

        echo json_encode($products);
        exit();
    }

    public function getProductByID($id) {
        $productModel = new Product();
        header("Content-Type: application/json");
        $product = $productModel->getProductById($id);

        echo json_encode($product);
        exit();
    }

    public function saveProduct() {
        $inputData = [
            'flavor' => $_POST['flavor'] ?? null,
            'price' => $_POST['price'] ?? null,
        ];

        $productData = $this->validateProduct($inputData);

        $product = new Product();
        $product->saveProduct([
            'flavor' => $productData['flavor'],
            'price' => $productData['price'],
        ]);

        http_response_code(200);
        echo json_encode(['success' => true]);
        exit();
    }

    public function updateProduct($id) {
        if (!$id) {
            http_response_code(404);
            exit();
        }

        parse_str(file_get_contents('php://input'), $_PUT);

        $inputData = [
            'flavor' => $_PUT['flavor'] ?? null,
            'price' => $_PUT['price'] ?? null,
        ];

        $productData = $this->validateProduct($inputData);

        $product = new Product();
        $product->updateProduct([
            'id' => $id,
            'flavor' => $productData['flavor'],
            'price' => $productData['price'],
        ]);

        http_response_code(200);
        echo json_encode(['success' => true]);
        exit();
    }

    public function deleteProduct($id) {
        if (!$id) {
            http_response_code(404);
            exit();
        }

        $product = new Product();
        $product->deleteProduct(['id' => $id]);
 
        http_response_code(200);
        echo json_encode(['success' => true]);
        exit();
    }

    public function productsView() {
        include 'public/assets/views/product/products-view.html';
        exit();
    }

    public function productsAddView() {
        include 'public/assets/views/product/products-add.html';
        exit();
    }

    public function productsDeleteView() {
        include 'public/assets/views/product/products-delete.html';
        exit();
    }

    public function productsUpdateView() {
        include 'public/assets/views/product/products-update.html';
        exit();
    }
}
