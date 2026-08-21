<?php

session_start();
include "connection.php";

if (isset($_SESSION["a"])) {

?>

    <!DOCTYPE html>
    <html lang="en" data-bs-theme="dark">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="bootstrap.css" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="style.css" />
        <link rel="icon" href="images/logo.png" />
        <title>Gloomobile</title>
    </head>

    <body class="stk_Body">
        <?php
        include "adminNavBar.php";
        ?>

        <div class="container-fluid" style="margin-top: 80px;">

            <div class="row ">
                <div class="col-5 offset-1 pr_box">

                    <h2 class="text-center">Product Registration</h2>

                    <div class="mb-3">
                        <label class="form-label" for="">Product Name</label>
                        <input type="text" class="form-control bg-transparent" id="pname" placeholder="Enter Product Name">
                    </div>

                    <div class="row">
                        <div class="mb-3 col-6">
                            <label class="form-label" for="">Brand</label>
                            <select class="form-select" id="brand">
                                <option value="0">Select</option>
                                <?php
                                $rs = Database::search("SELECT * FROM `brand`");
                                $num = $rs->num_rows;

                                for ($i = 0; $i < $num; $i++) {
                                    $data = $rs->fetch_assoc();
                                ?>
                                    <option value="<?php echo ($data["brand_id"]); ?>"><?php echo ($data["brand_name"]); ?></option>
                                <?php
                                }

                                ?>
                            </select>
                        </div>

                        <div class="mb-3 col-6">
                            <label class="form-label" for="">Category</label>
                            <select class="form-select" id="cat">
                                <option value="0">Select</option>
                                <?php
                                $rs = Database::search("SELECT * FROM `category`");
                                $num = $rs->num_rows;

                                for ($i = 0; $i < $num; $i++) {
                                    $data = $rs->fetch_assoc();
                                ?>
                                    <option value="<?php echo ($data["cat_id"]); ?>"><?php echo ($data["cat_name"]); ?></option>
                                <?php
                                }

                                ?>
                            </select>
                        </div>
                        <div class="mb-3 col-6">
                            <label class="form-label" for="">color</label>
                            <select class="form-select" id="color">
                                <option value="0">Select</option>
                                <?php
                                $rs = Database::search("SELECT * FROM `color`");
                                $num = $rs->num_rows;

                                for ($i = 0; $i < $num; $i++) {
                                    $data = $rs->fetch_assoc();
                                ?>
                                    <option value="<?php echo ($data["color_id"]); ?>"><?php echo ($data["color_name"]); ?></option>
                                <?php
                                }

                                ?>
                            </select>
                        </div>
                        <div class="mb-3 col-6">
                            <label class="form-label" for="">warrenty</label>
                            <select class="form-select" id="warrenty">
                                <option value="0">Select</option>
                                <?php
                                $rs = Database::search("SELECT * FROM `warrenty`");
                                $num = $rs->num_rows;

                                for ($i = 0; $i < $num; $i++) {
                                    $data = $rs->fetch_assoc();
                                ?>
                                    <option value="<?php echo ($data["warrenty_id"]); ?>"><?php echo ($data["warrenty_time_period"]); ?></option>
                                <?php
                                }

                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="">Description</label>
                        <textarea class="form-control bg-transparent" id="desc"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="">Product Image</label>
                        <input id="file" class="form-control bg-transparent" type="file" multiple>
                    </div>
                    <div class="d-grid">
                        <button class="btn btn-success" onclick="regProduct();">Register Product</button>
                    </div>
                </div>

                <div class="col-5 stk_box">

                    <h2 class="text-center">Stock Update</h2>

                    <div class="mb-3">
                        <label for="">Product Name</label>
                        <select class="form-select" id="selectProduct">
                            <option>Select</option>
                            <?php
                            $rs = Database::search("SELECT * FROM `product`");
                            $num = $rs->num_rows;

                            for ($i = 0; $i < $num; $i++) {
                                $d = $rs->fetch_assoc();
                            ?>
                                <option value="<?php echo ($d["id"]); ?>"><?php echo ($d["name"]); ?></option>
                            <?php
                            }

                            ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="">Qty</label>
                        <input class="form-control bg-transparent" type="text" id="qty" />
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Unit Price</label>
                        <input type="text" class="form-control bg-transparent" id="uprice">
                    </div>

                    <div class="d-grid">
                        <div class="btn btn-success" onclick="updateStock();">Update Stock</div>
                    </div>

                </div> 

            </div> 

        </div>

        <div class="fixed-bottom col-3  stk_bg"></div>
        

      

        <!-- footer -->
        <div class="fixed-bottom col-12">
            <p class="text-center">&copy; 2024 gloomobile.lk || All Right Reserved</p>
        </div>
        <!-- footer -->

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="script.js"></script>
    </body>

    </html>

<?php
} else {
    echo ("You're not an admin");
}

?>