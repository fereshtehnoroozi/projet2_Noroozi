<?php

class CartController
{
    private $cartModel;

    public function __construct($cartModel)
    {
        $this->cartModel = $cartModel;
    }

    public function viewCart()
    {
        // Logic to retrieve and display the shopping cart contents
        $cartItems = $this->cartModel->getCartItems();
        include 'views/cart.php'; // Include the corresponding view
    }

    public function addToCart($productId, $quantity)
    {
        // Logic to add a product to the shopping cart
        $this->cartModel->addToCart($productId, $quantity);
        // Redirect or show a success message
        header('Location: ./cart.php');
        exit();
    }

    public function updateCart()
    {
        // Logic to update the shopping cart (e.g., change quantity, remove items)
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_cart'])) {
            $cartData = $_POST['cart'];
            $this->cartModel->updateCart($cartData);
        }
        // Redirect or show a success message
        header('Location: ./cart.php');
        exit();
    }

    public function removeFromCart($productId)
    {
        // Logic to remove a product from the shopping cart
        $this->cartModel->removeFromCart($productId);
        // Redirect or show a success message
        header('Location: ./cart.php');
        exit();
    }

    public function emptyCart()
    {
        // Logic to empty the entire shopping cart
        $this->cartModel->emptyCart();
        // Redirect or show a success message
        header('Location: ./cart.php');
        exit();
    }
}
