<?php
namespace SeansIceCream;

class IceCream {
    private $flavor;
    private $price;
    private $size;

    public function __construct($flavor, $price, $size) {
        $this->flavor = $flavor;
        $this->price = $price;
        $this->size = $size;
    }

    public function getFlavor() {
        return $this->flavor;
    }

    public function getPrice() {
        return $this->price;
    }

    public function getSize() {
        return $this->size;
    }
}


?>
