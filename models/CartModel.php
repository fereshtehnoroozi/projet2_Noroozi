<?php

require_once './utils/Crud.php';

class CartModel extends Crud
{
    public $product_id;
    public $qtty;
    public $price;
    public $user_order_id;
    public $table = 'order_has_product';

    public function addToCart($product_id, $quantity)
    {
        // Check if the product is already in the cart
        $existingCartItem = $this->getCartItem($product_id);

        if ($existingCartItem) {
            // Update the quantity if the product is already in the cart
            $newQuantity = $existingCartItem['qtty'] + $quantity;
            $this->updateCartItem($product_id, $newQuantity);
        } else {
            // Add a new item to the cart
            $cartItem = [
                'product_id' => $product_id,
                'qtty' => $quantity,
            ];

            $request = "INSERT INTO $this->table (product_id, qtty) VALUES (:product_id, :qtty)";
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

    public function removeFromCart($product_id)
    {
        // Remove a product from the cart
        $request = "DELETE FROM $this->table WHERE product_id = :product_id";
        $this->delete($request, $product_id);
    }

    public function getCartItems($userId)
    {
        // Get all items in the cart for a specific user
        $request = "SELECT * FROM $this->table WHERE  user_order_id  = : user_order_id ";
        return $this->getAll($request, ['order_has_product' => $userId]);
    }

    private function getCartItem($product_id)
    {
        // Get a specific item in the cart by product ID
        $request = "SELECT * FROM $this->table WHERE product_id = :product_id";
        return $this->getById($request, $product_id);
    }

    private function updateCartItem($product_id, $quantity)
    {
        // Update the quantity of a specific item in the cart
        $request = "UPDATE $this->table SET qtty = :qtty WHERE product_id = :product_id";
        $cartItem = [
            'product_id' => $product_id,
            'qtty' => $quantity,
        ];
        $this->updateById($request, $cartItem);
    }
}
