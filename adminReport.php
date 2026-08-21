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
        <title>Gloomobile</title>

    </head>

    <body class="adminrepBody">

    <!-- nav Bar -->
    <?php include "adminNavBar.php"; ?>
    <!-- nav Bar -->

    <div class="col-10">
        <h2 class="text-center admin_h3">Reports</h2>

        <div class="row mt-5 report_row">
            
            <div class="card-rep" style="width: 18rem;">
                <img src="images/stockreport.jpg" class="card-img-top" alt="...">
                <div class="card-body_rep">
                    <a href="adminReportStock.php" class="btn btn-outline-primary rep_btn">Stock Report</a>
                </div>
            </div>

            
            <div class="card_rep" style="width: 18rem;">
                <img src="images/productreport.jpg" class="card-img-top" alt="...">
                <div class="card-body_rep">
                    <a href="adminReportProduct.php" class="btn btn-outline-primary rpo-btn mt-3">Product Report</a>
                </div>
            </div>

            <div class="card-rep" style="width: 18rem;">
                <img src="images/userreport.jpg" class="card-img-top" alt="...">
                <div class="card-body_rep">
                    <a href="adminUserReports.php" class="btn btn-outline-primary rep_btn">User Report</a>
                </div>
            </div>


                
        </div>
    </div>

        

            
   <!-- Footer -->
   <div class="fixed-bottom col-12">
        <p class="text-center">&copy; 2024 gloomobile.lk || All Right Reserved</p>
    </div>


    <script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>

    </body>

    </html>

<?php

} else {
    //Login
    echo ("You are not a Valid Admin.");
}

?>