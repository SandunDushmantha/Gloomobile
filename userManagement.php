<?php

session_start();

if (isset($_SESSION["a"])) {

?>

    <!DOCTYPE html>
    <html lang="en" data-bs-theme="dark">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="style.css" />
        <link rel="icon" href="images/logo.png" />
        <title>gloomobile</title>
    </head>

    <body class="umBody" onload="loadUser();">

        <!-- nav Bar -->
        <?php include "adminNavBar.php"; ?>
        <!-- nav Bar -->

        <div class="col-10">
            <h2 class="text-center admin_h2">User Management</h2>

            <div class="row d-flex justify-content-end mt-4">

                <div class="d-none" id="msgDiv" onclick="reload();">
                    <div class="d-none alert alert-danger" id="msg"></div>
                </div>

                <div class="col-2">
                    <input type="text" class="form-control  bg-transparent" placeholder=" Enter the User Id" id="uid"/>
                </div>

                <button class="btn btn-outline-warning col-2" onclick="updateUserStatus();">Change Status</button>

            </div>

            <div class="mt-3">
                <table class="table table-hover table-info">
                    <thead>
                        <tr>
                            <th scope="col">User Id</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Mobile</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody id="tb">
                        <!-- Table Row -->

                        <!-- Table Row -->
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Footer -->
        <div class="fixed-bottom col-12">
            <p class="text-center">&copy; 2024 gloomobile.lk || All Right Reserved</p>
        </div>
        <!-- Footer -->

        <script src="script.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>

    </html>

<?php


} else {
    echo ("You are not a Valid Admin");
}
