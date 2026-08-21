<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="icon" href="images/logo.png" />
    <title> gloomobile</title>
</head>

<body class="adminLogInBody">

    <div class="adminLogIn_Box">

     <div class="col-12 logo"></div>

        <h2 class="text-center">Admin Login</h2>

    
        
        <div class="mb-3 mt-3">
            <label for="form-label"> Email Adress</label>
            <input type="email" class="form-control"  id="em"/>
        </div>

        <div class="mt-3 mb-3">
            <label for="form-label">Password</label>
            <input type="password" class="form-control" id="pw"/>
        </div>


        <div class="d-none" id="msgDiv"> 
            <div class="d-none alert alert-danger" id="msg"></div>
        </div>

        <div class="mt-4">
            <button class="btn btn-primary col-12" onclick="adminLogIn();">Log In</button>
        </div>

        
        <div class="mt-2">
           <a href="LogIn.php" class="btn btn-outline-danger col-12">Back to User Log In</a>
        </div>

    </div>

    <!-- Footer -->
    <div class="fixed-bottom col-12">
        <p class="text-center">&copy;2024 gloomobile.lk || All Right Resevered</p>
    </div>
        
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="script.js"></script>
    <script src="bootstrap.bundle.js"></script>
    <script src="bootstrap.js"></script>
</body>

</html>