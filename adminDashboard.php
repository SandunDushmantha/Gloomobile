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

    <body class="dash_Body" onload="loadUser();">

        <!-- nav Bar -->
        <?php include "adminNavBar.php"; ?>
        <!-- nav Bar -->

        
  <div class="row">
    <div class="card">
      <img src="images/user_manage.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <a href="userManagement.php" class="btn btn-outline-info pm_btn">User Management</a>
      </div>
    </div>

    <div class="card">
      <img src="images/product_manage.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <a href="adminProduct.php" class="btn btn-outline-info pm_btn">Product Management</a>
      </div>
    </div>

    <div class="card">
      <img src="images/stock_manage.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <a href="adminStock.php" class="btn btn-outline-info pm_btn">Stock Management</a>
      </div>
    </div>

    <div class="card">
      <img src="images/reports.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <a href="adminReport.php" class="btn btn-outline-info rp_btn">Reports</a>
      </div>
    </div>

  </div>

        
        <!-- Footer -->
        <div class="fixed-bottom col-12">
            <p class="text-center">&copy; 2024 gloomobile.lk || All Right Reserved</p>
        </div>
        <!-- Footer -->

        <script src="script.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>

    </html>

<?php


} else {
    echo ("You are not a Valid Admin");
}













