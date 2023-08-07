<?php

class ProductMapper {
    private $dataSource;

    public function __construct($dataSource) {
        $this->dataSource = $dataSource;
    }

    public function save(Product $product) {
        if ($product->getId()) {
            $this->dataSource->updateProduct($product);
        } else {
            $this->dataSource->insertProduct($product);
        }
    }

    public function delete(Product $product) {
        $this->dataSource->deleteProduct($product);
    }

    public function findById($id) {
        $productData = $this->dataSource->selectProductById($id);

        return new Product($productData['id'], $productData['name'], $productData['description'], $productData['price'], $productData['category']);
    }

    public function findAll() {
        $productDataList = $this->dataSource->selectAllProducts();
        $productList = array();

        foreach ($productDataList as $productData) {
            $productList[] = new Product($productData['id'], $productData['name'], $productData['description'], $productData['price'], $productData['category']);
        }

        return $productList;
    }

    public function findByCategory($category) {
        $productDataList = $this->dataSource->selectProductsByCategory($category);
        $productList = array();

        foreach ($productDataList as $productData) {
            $productList[] = new Product($productData['id'], $productData['name'], $productData['description'], $productData['price'], $productData['category']);
        }

        return $productList;
    }

    // Data source operations
    private function insert(Product $product) {
        // Insert the product into the data source
    }

    private function update(Product $product) {
        // Update the product in the data source
    }

    private function deleteFromDataSource(Product $product) {
        // Delete the product from the data source
    }

    private function selectById($id) {
        // Select a product by its ID from the data source
    }

    private function selectAll() {
        // Select all products from the data source
    }

    private function selectByCategory($category) {
        // Select products by category from the data source
    }
}