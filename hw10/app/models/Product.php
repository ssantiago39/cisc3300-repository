<?php

namespace app\models;

// using the database class namespace
use app\models\Model;

class Product extends Model {

    public function getAllProductsByFlavor($flavor) {
        $query = "select * from IceCream where flavor like :flavor";
        return $this->query($query, [
            'flavor' => '%' . $flavor . '%',
        ]);
    }

    public function getAllProducts() {
        $query = "select * from IceCream";
        return $this->query($query);
    }
 
    public function getProductById($id) {
        $query = "select * from IceCream where id = :id";
        return $this->query($query, ['id' => $id]);
    }

    public function saveProduct($inputData) {
        $query = "insert into IceCream (flavor, price) values (:flavor, :price);";
        return $this->query($query, $inputData);
    }

    public function updateProduct($inputData) {
        $query = "update IceCream set flavor = :flavor, price = :price where id = :id";
        return $this->query($query, $inputData);
    }

    public function deleteProduct($inputData) {
        $query = "DELETE FROM IceCream where id = :id";
        return $this->query($query, $inputData);
    }
}
