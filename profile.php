<?php

include "connection.php";
session_start();
$user = $_SESSION["u"];

if (isset($_SESSION["u"])) {

    $rs = Database::search("SELECT * FROM `user` WHERE `id` = '" . $user["id"] . "'");
    $d = $rs->fetch_assoc();
?>
    <!DOCTYPE html>
    <html lang="en" data-bs-theme="dark">

    <head>
        <<meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="style.css" />
            <link rel="stylesheet" href="bootstrap.css" />
            <link rel="icon" href="images/logo.png" />
            <title> Gloomobile</title>
    </head>

    <body>
        <!-- navBar -->
        <?php include "navBar.php"; ?>
        <!-- navBar -->

        <div class="profile_Body">
       
            <div class="row container">
            <div class="profile_box col-3 mt-6">
                <div class="d-flex justify-content-center flex-column">
                

                    <div class="d-flex justify-content-center">
                        <img src="<?php

                                    if (!empty($d["img_path"])) {
                                        echo $d["img_path"];
                                    } else {
                                        echo ("images/profile_ico.png");
                                    }

                                    ?>" height="250px" id="i"/>
                    </div>

                    <div class="mt-3">
                        <label for="form-label">Profile image</label>
                        <input type="file" class="form-control  bg-transparent border-black" id="imgUploader">
                    </div>
                    <div class="mt-3">
                        <button class="btn btn-secondary col-12" onclick="uploadImg();">Upload</button>
                    </div>
                
                </div>
            </div>
                <div class="col-8">
                    <h2 class="text-center">User Profile Details</h2>

                    <div class="row mt-3">
                        <div class="col-6">
                            <label for="form-label">First Name</label>
                            <input type="text" class="form-control bg-transparent border-black" value="<?php echo $d["fname"] ?>" id="fname">
                        </div>
                        <div class="col-6">
                            <label for="form-label">Last Name</label>
                            <input type="text" class="form-control bg-transparent border-black" value="<?php echo $d["lname"] ?>" id="lname">
                        </div>
                    </div>

                    <div class="mt-3">
                        <label for="form-label">Email</label>
                        <input type="email" class="form-control" value="<?php echo $d["email"] ?>" disabled>
                    </div>

                    <div class="mt-3">
                        <label for="form-label">Mobile</label>
                        <input type="text" class="form-control bg-transparent border-black" value="<?php echo $d["mobile"] ?>" id="mobile">
                    </div>

                    <div class="mt-3">
                        <label for="form-label">Password</label>
                        <input type="password" class="form-control bg-transparent border-black" value="<?php echo $d["password"] ?>" id="password">
                    </div>
                   

                    <div class="mt-3">
                        <label for="form-label">Shipping Address</label>
                        <input type="text" class="form-control bg-transparent border-black" value="<?php echo $d["address"] ?>" id="address">
                    </div>
                    <div class="mt-3">
                        <button class="col-12 btn btn-outline-primary" onclick="updateData();">Update Your Profile</button>
                    </div>

                </div>
            </div>

        </div>

        </div>

          <!-- footer -->
         <?php include "footer.php" ?>



        <script src="script.js"></script>
        <script src="bootstrap.js"></script>
        <script src="bootstrap.bundle.js"></script>
    </body>

    </html>
<?php

} else {
    header("location: logIn.php");
}

?>