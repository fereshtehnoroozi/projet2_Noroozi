<?php
require_once './models/ProductModel.php';

class ProductController
{
    private $productModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
    }

    public function getProducts()
    {
        $products = $this->productModel->getProducts();
        // Load view to display products
        include_once './views/products.php';
    }

    public function getProductById($productId)
    {
        $product = $this->productModel->getProductById($productId);
        // Load view to display product details
        include_once './views/productDetails.php';
    }

    public function addProduct($productData)
    {
        $productId = $this->productModel->addProduct($productData);
        // Redirect to the product details page
        header("Location: /Ecommerc_2/project2_Noroozi/product/{$productId}");
    }

    public function updateProduct($productData)
    {
        $this->productModel->updateProduct($productData);
        // Redirect to the product details page
        header("Location: /Ecommerc_2/project2_Noroozi/product/{$productData['id']}");
    }

    public function deleteProductById($productId)
    {
        $this->productModel->deleteProduct($productId);
        // Redirect to the products page
        header("Location: /Ecommerc_2/project2_Noroozi/products");
    }
}
