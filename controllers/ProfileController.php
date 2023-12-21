<?php
require_once './models/UserModel.php';

class ProfileController
{
    public function profile($userId)
    {
        $userModel = new UserModel();
        $user = $userModel->getUserById($userId);


        include 'views/profile.php';
    }

    public function editProfile($userId)
    {
        $userModel = new UserModel();
        $user = $userModel->getUserById($userId);


        include 'views/edit_profile.php';
    }

    public function updateProfile($userId)
    {
        $userModel = new UserModel();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Handle form submission to update user profile
            $updatedData = array(
                'username' => $_POST['username'],
                'email' => $_POST['email'],
                // Add other fields as needed
            );

            $userModel->updateProfile($userId, $updatedData);
            // Redirect or show a success message
            header("Location: ./profile/$userId");
            exit();
        }
    }
}
