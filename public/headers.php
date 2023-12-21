<?php
require_once './models/UserModel.php';
require_once './controllers/AuthController.php';

// Initialize AuthController
$authController = new AuthController();

// Check if the user is authenticated
$authenticated = $authController;

// If not authenticated, redirect to the login page
if (!$authenticated) {
  header("Location: /Ecommerc_2/project2_Noroozi/login");
  exit;
}
?>

<!--Header and Navigation Section-->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="cache-control" content="no-cache">
  <title>Happy Busy Family</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="./css/style.css">
</head>

<header>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <a class="navbar-brand" href="home"><b><span class="firstWord">Happy Busy Family </span></b><span class="secondWord">
        LIVE IN STYLE</span></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <?php if ($authenticated) {
          // Replace $_SESSION['admin'] with the correct session variable for admin
          $isAdmin = isset($_SESSION['admin']);
          $isSuperAdmin = isset($_SESSION['superadmin']);
          $isClient = isset($_SESSION['client']);
          $user_fname = ''; // Initialize variables to avoid undefined variable notice
          $user_lname = '';
          $quantity = ''; // Initialize variable to avoid undefined variable notice

          if ($isAdmin) {
            $user_fname = $_SESSION['user_fname'];
            $user_lname = $_SESSION['user_lname'];
            $quantity = ''; // Set quantity based on your logic
          } elseif ($isSuperAdmin) {
            // Super admin logic

          }
        ?>
          <li class="nav-item">
            <a class="nav-link active" href="login"><i class="bi bi-shop"></i> Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="products"><i class="bi bi-shop"></i> Shop</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="profile"><i class="bi bi-person-badge"></i> My Profile</a>
          </li>
          <li class="nav-item">
            <a href="cart" class="btn btn-primary">
              <i class="bi bi-cart4"></i> <span class="badge text-bg-danger">
                <?php echo $quantity; ?>
              </span>
            </a>
          </li>
          <?php if ($isSuperAdmin) { ?>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-database-fill-lock"></i> Administration</a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="manageProduct"><i class="bi bi-basket-fill"></i> Manage Products</a>
                </li>
                <li><a class="dropdown-item" href="manageUsers"><i class="bi bi-people"></i> Users</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="manageCommands"><i class="bi bi-bag-fill"></i> Orders</a></li>
              </ul>
            </li>
          <?php } ?>
        <?php } elseif ($isClient) { ?>
          <li class="nav-item">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
            <a class="nav-link active" href="logout"><i class="bi bi-box-arrow-right"></i> Log Out</a>
          </li>
        <?php } else { ?>
          <li class="nav-item">
            <a class="nav-link active" href="login"><i class="bi bi-box-arrow-in-right"></i> Sign in</a>
          </li>
        <?php } ?>
      </ul>
    </div>
  </nav>
</header>

<body>