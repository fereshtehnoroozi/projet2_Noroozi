<?php
require_once './models/UserModel.php';

class AuthController
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Assuming you have a form with input fields named 'username' and 'password'
            $username = $_POST['username'];
            $password = $_POST['password'];

            // Implement authentication logic
            $user = $this->userModel->getUserByUsername($username);

            if ($user && password_verify($password, $user['pwd'])) {
                // Authentication successful
                session_start();
                $_SESSION['auth'] = [
                    'user_id' => $user['id'],
                    'username' => $user['username'],
                    'role_id' => $user['role_id'],
                ];

                // Redirect to a protected page or home page
                header("Location: /Ecommerc_2/project2_Noroozi/home");
                exit;
            } else {
                // Authentication failed
                echo "Invalid username or password. Please try again.";
            }
        }

        // Load the login form view
        include_once './views/login.php';
    }

    public function logout()
    {
        // Clear the session data
        session_start();
        session_unset();
        session_destroy();

        // Redirect to the home page or login page
        header("Location: /Ecommerc_2/project2_Noroozi/home");
        exit;
    }

    public function signup()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Assuming you have a registration form with required input fields
            $userData = [
                'email' => $_POST['email'],
                'username' => $_POST['username'],
                'fname' => $_POST['fname'],
                'lname' => $_POST['lname'],
                'pwd' => password_hash($_POST['password'], PASSWORD_DEFAULT),
            ];

            // Implement user registration logic
            $userId = $this->userModel->addUser($userData);

            if ($userId) {
                // Registration successful
                // You may choose to automatically log in the user after registration
                // or redirect them to the login page
                header("Location: /Ecommerc_2/project2_Noroozi/login");
                exit;
            } else {
                // Registration failed
                echo "Registration failed. Please try again.";
            }
        }

        // Load the signup form view
        include_once './views/signup.php';
    }
}
