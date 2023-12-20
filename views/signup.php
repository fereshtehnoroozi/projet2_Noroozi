<?php
include "./public/headers.php";
require_once './models/UserModel.php';
require_once './models/RoleModel.php';


?>

<?php

?>

<section>
    <div class="registerfrm">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="login-container">
                        <center>
                            <h3 class="mb-3">SIGN UP</h3>
                        </center>
                        <form method="post">
                            <div class="container">
                                <div class="mb-3">
                                    <label for="username" class="form-label"><i class="bi bi-forward-fill"></i> <b>Username</b></label>
                                    <input type="text" name="username" class="form-control" id="username">
                                </div>
                                <div class="mb-3">
                                    <label for="lname" class="form-label"><i class="bi bi-forward-fill"></i> <b>Last Name</b></label>
                                    <input type="text" name="lname" class="form-control" id="lname">
                                </div>
                                <div class="mb-3">
                                    <label for="fname" class="form-label"><i class="bi bi-forward-fill"></i> <b>First Name</b></label>
                                    <input type="text" name="fname" class="form-control" id="fname">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label"><i class="bi bi-envelope-plus-fill"></i> <b>Email</b></label>
                                    <input type="email" name="email" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="mb-3">
                                    <label for="pwd" class="form-label"><i class="bi bi-incognito"></i> <b>Password</b></label>
                                    <input type="password" name="pwd" class="form-control" id="pwd">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputpassword" class="form-label"><i class="bi bi-incognito"></i> <b>Confirm Password</b></label>
                                    <input type="password" name="c-mot_de_passe" class="form-control" id="exampleInputpassword">
                                </div>
                                <br>
                                <div class="d-grid gap-2">
                                    <button type="submit" name="register" class="btn btn-primary">Register</button>
                                </div>
                                <label class="form-check-label" for="exampleCheck1">Already a member?</label><a href="connexion.php" style="color: navy; font-weight:bold; text-decoration:none;">
                                    Login</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</main>

</body>

</html>