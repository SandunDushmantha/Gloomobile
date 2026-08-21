<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="icon" href="images/logo.png" />
    <title> Gloomobile</title>

</head>

<body class="logIn_body">

    <!---Log In Box -->

    <div class="logIn_Box" id="logInBox">

    <div class="col-12 logo"></div>

    <div class="col-12">
        <p class="text-center title1">Welcome back to Gloomobile</p>
    </div>

    <h2 class="text-center">Log In</h2>

        <?php

        $email = "";
        $password = "";

        if (isset($_COOKIE["email"])) {
            $email = $_COOKIE["email"];
        }

        if (isset($_COOKIE["password"])) {
            $email = $_COOKIE["password"];
        }
        ?>

        <div class="mt-3">
            <label for="form-label">E mail</label>
            <input type="text" class="form-control" id="em" value="<?php echo $email ?>" />
        </div>

        <div class="mt-2">
            <label for="form-label">Password</label>
            <input type="password" class="form-control" id="pw" value="<?php echo $password ?>" />
        </div>

        <div class="mt-2 mb-2">
            <input type="checkbox" class="form-check-input" id="rm" />
            <label for="form-label" >Remember Me</label>
        </div>

        <div class=" mt-3 text-end">
            <a href="#" class="link-primary" onclick="forgotPassword();">Forgot Password?</a>
        </div>

        <div class=" d-none" id="msgDiv2">
            <div class="d-none alert alert-danger" id="msg2"></div>
        </div>

        <div class="mt-2">
            <button class="btn btn-success col-12" onclick="logIn();">Log In</button>
        </div>

        <div class="mt-2">
           <a href="adminLogIn.php" class="btn btn-warning col-12" onclick="adminLogIn();">Admin Log In</a>
        </div>

        <div class="mt-2">
            <button class="btn btn-outline-primary col-12" onclick="changeView();">Don't have an Account? Please Register</button>
        </div>
    </div>

        <!-- Register box -->
        <div class="register_Box d-none" id="registerBox">
        <div class="col-12 logo"></div>

    <div>
        <h2 class="text-center">Register</h2>
    </div>

    <div class="row">

        <div class="mt-3 col-6">
            <label for="form-lable">First Name</label>
            <input type="text" class="form-control" id="fname" />
        </div>

        <div class="mt-3 col-6">
            <label for="form-lable">Last Name</label>
            <input type="text" class="form-control" id="lname" />
        </div>

    </div>

    <div class="mt-3">
        <label for="form-lable">E-mail</label>
        <input type="email" class="form-control" id="email" />
    </div>

    <div class="mt-3">
        <label for="form-lable">Mobile</label>
        <input type="text" class="form-control" id="mobile" />
    </div>

    <div class="mt-3 mb-3">
        <label for="form-lable">Password</label>
        <input type="password" class="form-control" id="password" />
    </div>

    <div class="mt-3 mb-3">
        <input type="checkbox" class="form-check-input" id="term" />
        <label for="form-lable">I accept the Terms and Conditions</label>
    </div>

    <div  class=" d-none " id="msgDiv1">
        <div class=" d-none alert alert-danger" role="alert" id="msg1"></div>
    </div>
   

    <div class="mt-3">
        <button class="btn btn-success col-12" onclick="register();">Register </button>
    </div>

    <div class="mt-3">
        <button class="btn btn-outline-primary col-12 " onclick="changeView();"> Already Registered to Gloomobile? Log In</button>
    </div>

</div>

<!-- Footer -->
<div class="fixed-bottom col-12">
    <p class="text-center">&copy;2024 gloomobile.lk || All Right Resevered</p>
</div>


     
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="script.js"></script>
<script src="bootstrap.js"></script>
</body>

</html>