<?php

class Product {
    private $id;
    private $name;
    private $description;
    private $price;
    private $category;

    public function __construct($id, $name, $description, $price, $category) {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->category = $category;
    }

    public function calculateTax() {
        // Business logic to calculate the tax
    }

    public function getDiscountedPrice() {
        // Business logic to calculate the discounted price
    }

    public function getRelatedProducts() {
        // Business logic to get the related products
    }
}