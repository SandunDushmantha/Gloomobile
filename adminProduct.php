<?php

session_start();

if (isset($_SESSION["a"])) {

?>

    <!DOCTYPE html>
    <html lang="en" data-bs-theme="dark">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css" />
        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="icon" href="images/logo.png" />
        <title> gloomobile</title>
    </head>

    <body class="apBody">

        <!-- nav bar -->
        <?php include "adminNavBar.php"; ?>
        <!-- nav bar -->

        <div class="col-10">
            <h2 class="text-center admin_h3">Product Management</h2>

            <div class="row">

                <!-- Barand Register -->
                <div class="col-4 offset-1 mt-4">
                    <label class="form-lable">Brand Name</label>

                    <input class="form-control mb-3 bg-transparent" type="text" id="brand" />

                    <div class="d-none" id="msgDiv1" onclick="reload();">
                        <div class="alert alert-danger" id="msg1"></div>
                    </div>

                    <div class="mt-4">
                        <button class="col-12 btn btn-outline-primary" onclick="brandReg();">Brand Register</button>
                    </div>
                </div>
                <!-- Barand Register -->

                <!-- Category Register -->
                <div class="col-4 offset-2 mt-4">
                    <label class="form-lable">Category Name</label>

                    <input class="form-control mb-3 bg-transparent"" type="text" id="category" />

                    <div class="d-none" id="msgDiv2" onclick="reload();">
                        <div class="alert alert-danger" id="msg2"></div>
                    </div>

                    <div class="mt-4">
                        <button class="col-12 btn btn-outline-primary" onclick="catReg();">Category Register</button>
                    </div>
                </div>
                <!-- Category Register -->

            </div>

            <div class="row mt-5">

                <!-- Color Register -->
                <div class="col-4 offset-1 mt-4">
                    <label class="form-lable">Color</label>

                    <input class="form-control mb-3 bg-transparent" type="text" id="color" />

                    <div class="d-none" id="msgDiv3" onclick="reload();">
                        <div class="alert alert-danger" id="msg3"></div>
                    </div>

                    <div class="mt-4">
                        <button class="btn col-12 btn-outline-primary" onclick="colorReg();">Color Register</button>
                    </div>
                </div>
                <!-- Color Register -->

                <!-- Size Register -->
                <div class="col-4 offset-2 mt-4">
                    <label class="form-lable">Warrenty Time Period</label>

                    <input class="form-control mb-3 bg-transparent" type="text" id="warrenty" />

                    <div class="d-none" id="msgDiv4" onclick="reload();">
                        <div class="alert alert-danger" id="msg4"></div>
                    </div>

                    <div class="mt-4">
                        <button class=" col-12 btn btn-outline-primary" onclick="warrentyReg();">Warrenty Time Period Register</button>
                    </div>
                </div>
                <!-- Size Register -->

            </div>
        </div>
        </div>

        <!-- Footer -->
        <div class="fixed-bottom col-12">
            <p class="text-center">&copy; 2024 gloomobile.lk || All Right Reserved</p>
        </div>


        <script src="script.js"></script>
        <script src="bootstrap.js"></script>
        <script src="bootstrap.bundle.js"></script>
    </body>

    </html>

<?php

} else {
    echo ("You are not a Valid Admin");
}

?>