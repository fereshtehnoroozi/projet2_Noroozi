<?php
//session_start();
require_once './controllers/PageControllers.php';
$url = $_SERVER['REQUEST_URI'];


$urltrim = ltrim($url, '/Ecommerc_2/project2_Noroozi');
$explodeUrl = explode('/', $url);
var_dump($explodeUrl[3]);
switch ($explodeUrl[3]) {

    case 'products':

        $page = new PageController;
        $page->products();

        break;


    case 'product':
        // Récupérer l'ID du produit à partir de la requête GET
        $productId = isset($explodeUrl[4]) ? $explodeUrl[4] : null;
        if ($productId) {
            $page = new PageController;
            $page->products($productId);
            // echo " je suis dans product";
        } else {
            echo "Product ID is missing.";
        }

        break;


    case 'cart':
        $page = new PageController;
        $page->cart();
        break;

    case 'signup':
        $page = new PageController;
        $page->signup();
        break;


    case 'login':
        $page = new PageController;
        $page->login();
        // ou PageController::login

        break;

    case 'users':
        $page = new PageController;
        $userId = isset($explodeUrl[4]) ? $explodeUrl[4] : null;
        if (isset($_SESSION['auth']['role_id']) && ($_SESSION['auth']['role_id'] === 2 || $_SESSION['auth']['role_id'] === 1)) {

            if ($userId) {
                $page->deleteUserById($explodeUrl[4]);
                echo " je suis dans user ";
            } else {
                $page->users();
            }
        }
        break;

    case 'user':

        $userId = isset($explodeUrl[4]) ? $explodeUrl[4] : null;
        if ($userId) {
            $page = new PageController;
            $page->users($userId);
            echo " je suis dans users ";
        } else {
            echo "UserID is missing.";
        }

        $page = new PageController;
        $page->users();


        break;




    case 'profile':
        // Récupérer l'ID du user à partir de la requête GET
        $id = isset($explodeUrl[4]) ? $explodeUrl[4] : null;
        if ($id) {
            $page = new PageController;
            $page->profile($id);
            //echo " je suis dans profile";
        } else {
            echo "Profile ID is missing.";
        }

        break;



    default:
        $page = new PageController;
        $page->home();
        break;
}
