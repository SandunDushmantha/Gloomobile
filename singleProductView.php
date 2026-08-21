<?php

include "connection.php";
$stockId = $_GET["s"];

// echo($stockId);

if (isset($stockId)) {

    $q = "SELECT * FROM `stock`
INNER JOIN `product` ON `stock`.product_id = `product`.id
INNER JOIN `brand` ON `product`.brand_id = `brand`.brand_id
INNER JOIN `color` ON `product`.color_id = `color`.color_id
INNER JOIN `category` ON `product`.category_id = `category`.cat_id
INNER JOIN `warrenty` ON `product`.`warrenty_warrenty_id` = `warrenty`.`warrenty_id`
WHERE `stock`.stock_id = '" . $stockId . "'";

    $rs = Database::search($q);
    $d = $rs->fetch_assoc();

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css" />
        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="icon" href="images/logo.png" />
        <title> Gloomobile</title>

    </head>

    <body>
        <!-- navbar -->
        <?php include "navBar.php"; ?>
        <!-- navbar -->

        <div class="single_product_Body">

            <div class="col-8 row shadow-lg p-5 bg-body-tertiary rounded-2 m-auto">

                <div class="col-6">
                    <img src="<?php echo $d["path"] ?>" class="rounded-3 shadow-lg" width="300px" />
                </div>

                <div class="col-6">
                    <h4 class="mt-auto"><?php echo $d["name"] ?></h4>
                    <h6 class="mt-3">Category : <?php echo $d["cat_name"] ?></h6>
                    <h6 class="mt-3">Brand : <?php echo $d["brand_name"] ?></h6>
                    <h6 class="mt-3">Color : <?php echo $d["color_name"] ?></h6>
                    <h6 class="mt-3">Warrenty Time Period : <?php echo $d["warrenty_time_period"] ?></h6>
                    <p class="mt-3"><h6>Description :</h6> <?php echo $d["description"] ?></p>

                    <div class="row mt-5">
                        <div class="col-4">
                            <input type="text" placeholder="Enter the qty" class="form-control" id="qty" />
                        </div>
                        <div class="col-6 mt-2">
                            <h6 class="text-warning">Avalable Quantity : <?php echo $d["qty"] ?></h6>
                        </div>
                    </div>
                    <h5 class="mt-3"></h5>Price : <?php echo $d["price"] ?></h5>
                    <div class="d-flex justify-content-center mt-3">
                        <button class="btn btn-outline-dark col-6" onclick="addtoCart('<?php echo $d['stock_id'] ?>');">Add to cart</button>
                        <button class="btn btn-danger col-6 ms-2"onclick="buyNow('<?php echo $d['stock_id'] ?>');">Buy Now</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="fixed-bottom col-12">
            <p class="text-center">&copy;2024 gloomobile.lk || All Right Resevered</p>
        </div>

        <script src="script.js"></script>
        <script src="bootstrap.js"></script>
        <script src="bootstrap.bundle.js"></script>
        <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </body>

    </html>
<?php
} else {
    header("location: index.php");
}


?>