<?php

namespace app\models;

class Product extends Model {
    public function getProducts($flavor = null) {
        if ($flavor) {
            $query = "SELECT * FROM IceCream WHERE flavor LIKE :flavor";
            return $this->fetchAllWithParams($query, ['flavor' => '%' . $flavor . '%']);
        }
        return $this->fetchAll("SELECT * FROM IceCream");
    }
}