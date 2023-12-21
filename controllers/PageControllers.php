<?php

require_once './models/ProductModel.php';
require_once './models/UserModel.php';
require_once './models/CartModel.php';

class PageController
{
    private $productModel;
    private $userModel;
    private $cartModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
        $this->userModel = new UserModel();
        $this->cartModel = new CartModel();
    }


    public function home()
    {
        // Implement logic to display the home page
        include 'views/home.php'; // Adjust the view file path
    }

    public function products()
    {
        // Implement logic to display a list of products
        $products = $this->productModel->getAll('product');
        include 'views/products.php'; // Adjust the view file path
    }

    public function viewProduct($productId)
    {
        // Implement logic to retrieve and display the details of a specific product
        $product = $this->productModel->getProductById($productId);
        include 'views/product.php'; // Adjust the view file path
    }

    public function cart()
    {
        // Implement logic to handle the shopping cart
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Check if it's an add to cart, update cart, or remove from cart operation
            if (isset($_POST['add_to_cart'])) {
                $productId = $_POST['product_id'];
                $quantity = $_POST['quantity'];
                $this->cartModel->addToCart($productId, $quantity);
            } elseif (isset($_POST['update_cart'])) {
                $cartData = $_POST['cart'];
                $this->cartModel->updateCart($cartData);
            } elseif (isset($_POST['remove_from_cart'])) {
                $productId = $_POST['product_id'];
                $this->cartModel->removeFromCart($productId);
            }

            header('Location: ./cart');
            exit();
        }

        $cartItems = $this->cartModel->getCartItems('id');
        include 'views/cart'; // Adjust the view file path
    }

    public function signup()
    {
        // Implement logic to handle user registration
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register'])) {
            $userData = [
                'email' => $_POST['email'],
                'username' => $_POST['username'],
                'fname' => $_POST['fname'],
                'lname' => $_POST['lname'],
                'pwd' => $_POST['pwd'],
            ];

            $this->userModel->addUser($userData);
            header('Location: ./login');
            exit();
        }

        include 'views/signup.php'; // Adjust the view file path
    }

    public function login()
    {
        // Implement logic to handle user login
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
            $this->userModel;
            // Redirect or show a success message
            header('Location: ./home');
            exit();
        }

        include 'views/login.php'; // Adjust the view file path
    }

    public function logout()
    {
        //traitement de log out 
        session_start();
        session_unset();
        session_destroy();

        // Redirect or show a success message
        header('Location: ./home');
        exit();
    }


    public function users()
    {

        //get all my users 
        $oUserModel = new UserModel;
        $users = $oUserModel->getUsers();

        $viewData = [
            'users' => $users
        ];
        global $viewData;
        // Redirect or show a success message
        include 'views/manageUsers.php';
        exit();
    }


    public function profile()
    {

        $oUserModel = new UserModel;
        $profile = $oUserModel->getUsers();

        $viewData = [
            'users' => $profile
        ];
        global $viewData;

        // Redirect or show a success message
        include 'views/profile.php';
        exit();
    }

    public function deleteUserById()
    {
    }

    public function getProductById()
    {
    }
}
