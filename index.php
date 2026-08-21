<?php
include "connection.php"
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css" />
    <link rel="icon" href="images/logo.png" />
    <title> Gloomobile</title>
</head>

<body onload="loadProduct(0);"> 
    <!-- nav bar -->
    <?php include "navBar.php" ?>
    <!-- nav bar -->
    <!-- Basic search -->
    <div class="container d-flex justify-content-end search_bar">
        <div class="col-4 mt-3">
            <input type="text" class="form-control" placeholder="Product Name" id="product" onkeyup="searchProduct(0)">
        </div>
        <div>
            <button class="btn btn-outline-secondary mb-3 mt-3" onclick="viewFilter();">Filters</button>
        </div>
    </div>
    <!-- basic search -->

    <!-- Advance Search -->
    <div class="d-none" id="filterId">
            <div class="col-12  card mb-5 ">
                <div class="card-header bg-warning rounded-3 text-center">
                    Advance Search
                </div>
                <div class="card-body_as">



                    <div class="border border-info mt-4 p-5  mb-5 rounded-4">
                        <div class="row">

                            <div class=" row col-6 ms-3 ms-2 ms-auto">
                                <label class="form-label col-3">Category</label>
                                <select class="form-select  col-9" id="cat">
                                    <option value="0">Select Category</option>

                                    <?php
                                    $rs2 = Database::search("SELECT * FROM category");
                                    $num2 = $rs2->num_rows;

                                    for ($i = 0; $i < $num2; $i++) {
                                        $d2 = $rs2->fetch_assoc();
                                    ?>
                                        <option value="<?php echo $d2["cat_id"] ?>"><?php echo $d2["cat_name"] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>



                        
                            <div class="col-lg-6 col-md-12 col-sm-12 mt-3">
                                    <label class="form-label col-3">Brand</label>
                                    <select class="form-select  col-9 text-center" id="brand">
                                        <option value="0">Select Brand</option>
                                        <?php
                                        $rs3 = Database::search("SELECT * FROM brand");
                                        $num3 = $rs3->num_rows;

                                        for ($i = 0; $i < $num3; $i++) {
                                            $d3 = $rs3->fetch_assoc();
                                        ?>
                                            <option value="<?php echo $d3["brand_id"] ?>"><?php echo $d3["brand_name"] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>


                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <label class="form-label col-3">color</label>
                                <select class="form-select  col-9 text-center" id="color">
                                    <option value="0">Select color</option>

                                    <?php
                                    $rs1 = Database::search("SELECT * FROM color");
                                    $num1 = $rs1->num_rows;

                                    for ($i = 0; $i < $num1; $i++) {
                                        $d1 = $rs1->fetch_assoc();
                                    ?>
                                        <option value="<?php echo $d1["color_id"] ?>"><?php echo $d1["color_name"] ?></option>
                                    <?php
                                    }
                                    ?>


                                </select>
                            </div>


                            <div class="col-lg-6 col-md-12 col-sm-12 mt-3 ">
                                <label class="form-label col-3">warrenty</label>
                                <select class="form-select  col-9 text-center" id="warrenty">
                                    <option value="0">Select Warrenty Time Period</option>
                                    <?php
                                    $rs4 = Database::search("SELECT * FROM warrenty");
                                    $num4 = $rs4->num_rows;

                                    for ($i = 0; $i < $num4; $i++) {
                                        $d4 = $rs4->fetch_assoc();
                                    ?>
                                        <option value="<?php echo $d4["warrenty_id"] ?>"><?php echo $d4["warrenty_time_period"] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>



                            <div class="col-lg-6 col-md-12 col-sm-12 mt-4">
                                <input type="text" class="form-control" placeholder="Minimum price" id="min" />
                            </div>

                            <div class="col-lg-6 col-md-12 col-sm-12 mt-4 ">
                                <input type="text" class="form-control" placeholder="Maximum price" id="max" />
                            </div>


                            <div class="col-12 d-flex justify-content-center align-items-center mt-4">
                                <button class="btn btn-success col-lg-3 col-sm-4 col-md-4 " onclick="advSearchProduct(0);"> Search</button>
                            </div>

                        </div>

                    </div>
                </div>

            </div>

        </div>
        <!-- Advance Search -->

         <!--slider-->
         <div class="col-11 d-none d-lg-block mb-3 mt-4">
                        <div class="row">

                            <div id="carouselExampleIndicators" class=" carousel slide col-6 offset-2" data-bs-ride="true">
                                <div class="carousel-indicators">
                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                </div>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="images/hom_bg.jpg" class="d-block img-thumbnail poster-img-1 home_im w-100" />
                                        <div class="carousel-caption d-none d-md-block poster-caption">
                                        <img src="images/bg_1.png" class="imgs" >
                                            <h5 class="poster-title">50% OFF Lartest Mobile phones</h5>
                                            <a href="singleProductView.php?s=7" class="btn-btn-primary">shop now</a>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <img src="images/hom_bg2.jpg" class="d-block img-thumbnail poster-img-1" />
                                        <div class="carousel-caption d-none d-md-block poster-caption-1">
                                        <img src="images/bg_2.png" class="imgs" >
                                            <h5 class="poster-title">35% OFF Laterest Laptops</h5>
                                            <a href="singleProductView.php?s=16" class="btn-btn-primary">shop now</a>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <img src="images/hom_bg3.jpg" class="d-block img-thumbnail poster-img-1" />
                                        <div class="carousel-caption d-none d-md-block poster-caption-1">
                                        <img src="images/bg_3.png" class="imgs" >
                                            <h5 class="poster-title">65% OFF Laterest Smart Watches</h5>
                                            <a href="singleProductView.php?s=21" class="btn-btn-primary">shop now</a>
                                        </div>
                                    </div>
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>

                        </div>
                    </div>


    <!-- load product -->

    <div class="row col-10 offset-1" id="pid">



    </div>
    <!-- load product -->




    <!-- footer -->
   <?php include "footer.php" ?>





    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>