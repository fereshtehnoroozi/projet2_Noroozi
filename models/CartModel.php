<?php

require_once './utils/Crud.php';

class CartModel extends Crud
{
    private $table = 'cart';

    public function addToCart($productId, $quantity)
    {
        // Check if the product is already in the cart
        $existingCartItem = $this->getCartItem($productId);

        if ($existingCartItem) {
            // Update the quantity if the product is already in the cart
            $newQuantity = $existingCartItem['quantity'] + $quantity;
            $this->updateCartItem($productId, $newQuantity);
        } else {
            // Add a new item to the cart
            $cartItem = [
                'product_id' => $productId,
                'quantity' => $quantity,
            ];

            $request = "INSERT INTO $this->table (product_id, quantity) VALUES (:product_id, :quantity)";
            $this->add($request, $cartItem);
        }
    }

    public function updateCart($cartData)
    {
        // Update the quantities of items in the cart
        foreach ($cartData as $productId => $quantity) {
            $this->updateCartItem($productId, $quantity);
        }
    }

    public function removeFromCart($productId)
    {
        // Remove a product from the cart
        $request = "DELETE FROM $this->table WHERE product_id = :product_id";
        $this->delete($request, $productId);
    }

    public function getCartItems()
    {
        // Get all items in the cart with product details
        $request = "SELECT c.product_id, c.quantity, p.name, p.price FROM $this->table c
                    JOIN product p ON c.product_id = p.id";
        return $this->getAll($request);
    }

    private function getCartItem($productId)
    {
        // Get a specific item in the cart by product ID
        $request = "SELECT * FROM $this->table WHERE product_id = :product_id";
        return $this->getById($request, $productId);
    }

    private function updateCartItem($productId, $quantity)
    {
        // Update the quantity of a specific item in the cart
        $request = "UPDATE $this->table SET quantity = :quantity WHERE product_id = :product_id";
        $cartItem = [
            'product_id' => $productId,
            'quantity' => $quantity,
        ];
        $this->updateById($request, $cartItem);
    }
}
