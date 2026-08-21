<!DOCTYPE html>
    <html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>

<nav class="navbar navbar-expand-lg bg-bg-body-tertiary fixed-top main_nav">
    <div class="container-fluid">

        <a class="navbar-brand h1 mb-0 mico" href="index.php">
            <img class="me-3" src="images/logo.png" height="55px;"/>
            Gloomobile</a>


        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="d-flex justify-content-end">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-5">

                   
                    <li class="nav-item me-5 mt-2">
                        <a class="nav-link active " aria-current="page" href="#">History</a>
                    </li>

                    <li class="nav-item me-5 mt-2 ">
                        <a class="nav-link active" aria-current="page" href="aboutus.php">About Us</a>
                    </li>

                    <li class="nav-item me-4 " >
                        <a class="nav-link active" aria-current="page" href="cart.php" >
                            <img class="me-3" src="images/crt.png"  height="30px;" />
                        </a>
                    </li>


                    <li class="nav-item me-3">
                        <a class="nav-link active" aria-current="page" href="adminLogIn.php" >
                           <button class="btn btn-outline-light ">Admin Log In</button>
                        </a>
                    </li>

                    <li class="nav-item me-6 uico">
                       <a class="nav-link active" aria-current="page" href="profile.php">
                            <img class="me-3" src="images/user_icon.png"  height="30px;" />
                        </a>
                    </li>

                    <li class="nav-item me-9 lgot">
                        <a class="nav-link active" aria-current="page" href="" onclick="signout();">
                            <img class="me-3" src="images/lg_out.png"  height="30px;" />
                        </a>
                    </li>

                </ul>

            </div>
        </div>

    </div>
</nav>