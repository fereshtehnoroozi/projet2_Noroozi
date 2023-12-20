<?php
require_once './models/UserModel.php';

class UserController
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function getUsers()
    {
        $users = $this->userModel->getUsers();
        // Load view to display users
        include_once './views/users.php';
    }

    public function getUserById($userId)
    {
        $user = $this->userModel->getUserById($userId);
        // Load view to display user details
        include_once './views/userDetails.php';
    }

    public function updateUserProfile($userData)
    {
        $this->userModel->updateProfile($userData);
        // Redirect to the user profile page
        header("Location: /Ecommerc_2/project2_Noroozi/profile/{$userData['id']}");
    }

    public function deleteUserById($userId)
    {
        $this->userModel->deleteUser($userId);
        // Redirect to the users page
        header("Location: /Ecommerc_2/project2_Noroozi/users");
    }
}
