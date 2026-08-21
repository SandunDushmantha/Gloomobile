<?php
include "connection.php";

$pageno = 0;
$page = $_POST["pg"];

$color = $_POST["co"];
$cat = $_POST["cat"];
$brand = $_POST["b"];
$warrenty = $_POST["warrenty"];
$minPrice = $_POST["min"];
$maxPrice = $_POST["max"];

// echo ($minPrice);

$status = 0; // No condition

if (0 != $page) {
    $pageno = $page;
} else {
    $pageno = 1;
}

$q = "SELECT * FROM `stock` 
INNER JOIN `product` ON `stock`.`product_id`=`product`.`id` 
INNER JOIN `brand` ON `product`.`brand_id`=`brand`.`brand_id`
INNER JOIN `color` ON `product`.`color_id`=`color`.`color_id` 
INNER JOIN `category` ON `product`.`category_id`=`category`.`cat_id` 
INNER JOIN `warrenty` ON `product`.`warrenty_warrenty_id`=`warrenty`.`warrenty_id`";

// Search by color------------------------------------------------------------------------

if ($status == 0 && $color != 0) {
    // 1st time search by color (WHERE)
    $q .= " WHERE `color`.`color_id`='" . $color . "'";
    $status = 1;
} elseif ($status != 0 && $color != 0) {
    // 2nd time search by color (AND)
    $q .= " AND `color`.`color_id`='" . $color . "'";
}

// Search by color-------------------------------------------------------------------------




// Search by Category----------------------------------------------------------------------

if ($status == 0 && $cat != 0) {
    // 1st time search by color (WHERE)
    $q .= " WHERE `category`.`cat_id`='" . $cat . "'";
    $status = 1;
} elseif ($status != 0 && $cat != 0) {
    // 2nd time search by color (AND)
    $q .= " AND `category`.`cat_id`='" . $cat . "'";
}

// Search by Category----------------------------------------------------------------------






// Search by Brand-------------------------------------------------------------------------

if ($status == 0 && $brand != 0) {
    // 1st time search by color (WHERE)
    $q .= " WHERE `brand`.`brand_id`='" . $brand . "'";
    $status = 1;
} elseif ($status != 0 && $brand != 0) {
    // 2nd time search by color (AND)
    $q .= " AND `brand`.`brand_id`='" . $brand . "'";
}


// Search by Brand-------------------------------------------------------------------------






// Search by warrenty---------------------------------------------------------------------------

if ($status == 0 && $warrenty != 0) {
    // 1st time search by color (WHERE)
    $q .= " WHERE `warrenty`.`warrenty_id`='" . $warrenty . "'";
    $status = 1;
} elseif ($status != 0 && $warrenty != 0) {
    // 2nd time search by color (AND)
    $q .= " AND `warrenty`.`warrenty_id`='" . $warrenty . "'";
}




// Search by Min Price---------------------------------------------------------------------
if (!empty($minPrice) && empty($maxPrice)) {
    if ($status == 0) {
        $q .= " WHERE `stock`.`price` >= '" . $minPrice . "' ORDER BY `stock`.`price` ASC";
        $status = 1;
    } elseif ($status != 0) {
        $q .= " AND `stock`.`price` >= '" . $minPrice . "' ORDER BY `stock`.`price` ASC";
    }
}
// Search by Min Price---------------------------------------------------------------------



// Search by MaxPrice----------------------------------------------------------------------
if (empty($maxPrice) && !empty($maxPrice)) {
    if ($status == 0) {
        $q .= " WHERE `stock`.`price` <= '" . $maxPrice . "' ORDER BY `stock`.`price` ASC";
        $status = 1;
    } elseif ($status != 0) {
        $q .= " AND `stock`.`price` <= '" . $minPrice . "' ORDER BY `stock`.`price` ASC";
    }
}
// Search by MaxPrice----------------------------------------------------------------------




// Search by Price range-------------------------------------------------------------------
if (!empty($maxPrice) && !empty($maxPrice)) {
    if ($status == 0) {
        $q .= " WHERE `stock`.`price` BETWEEN '" . $minPrice . "' AND '" . $maxPrice . "' ORDER BY `stock`.`price` ASC";
        $status = 1;
    } elseif ($status != 0) {
        $q .= " AND `stock`.`price` BETWEEN '" . $minPrice . "' AND '" . $maxPrice . "' ORDER BY `stock`.`price` ASC";
    }
}

// Search by Price range-------------------------------------------------------------------

$rs = Database::search($q);
$num = $rs->num_rows;

$results_per_page = 8;
$num_of_pages = ceil($num / $results_per_page);
$page_results = ($pageno - 1) * $results_per_page;

$q2 = $q . " LIMIT $results_per_page OFFSET $page_results";
$rs2 = Database::search($q2);
$num2 = $rs2->num_rows;

if ($num2 == 0) {
    # Search No result
?>
    <div class="d-flex  flex-column mt-5">
        <h5>Search No Results</h5>
        <p>We're Sorry , We cannot find any matches for your search term...</p>
    </div>
    <?php
} else {
    # Load page
    for ($i = 0; $i < $num2; $i++) {
        $d = $rs2->fetch_assoc();

    ?>
        <!-- card -->
        <div class=" col-3 mt-5 d-flex justify-content-center">

            <div class="card" style="width: 300px;">
                <a href="singleProductView.php?s=<?php echo $d["stock_id"] ?>"><img src="<?php echo $d["path"] ?>" class="card-img-top"></a>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $d["name"] ?></h5>
                    <p class="card-text"><?php echo $d["description"] ?></p>
                    <p class="card-text">Rs: <?php echo $d["price"] ?></p>
                    <div class="d-flex justify-content-center">
                        <button class="btn btn-outline-primary col-6">Add To Cart</button>
                        <button class="btn btn-outline-warning col-6 ms-2">Buy Now</button>
                    </div>

                </div>
            </div>

        </div>
        <!-- card -->

    <?php
    }

    ?>



    <div class="mt-5 mb-4">

        <!-- pagination -->
        <nav aria-label="Page navigation example ">
            <ul class="pagination justify-content-end">
                <!-- <li class="page-item"><a class="page-link" href="#">Previous</a></li> -->

                <li class="page-item">
                    <a class="page-link" <?php

                                            if ($pageno <= 1) {
                                                echo ("#");
                                            } else {
                                            ?>onclick="advSearchProduct(<?php echo ($pageno - 1) ?>);" <?php
                                                                                                    }
                                                                                                        ?> aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>

                <?php
                for ($y = 1; $y <= $num_of_pages; $y++) {

                    if ($y == $pageno) {
                ?>
                        <li class="page-item active"> 
                            <a class="page-link" onclick="advSearchProduct(<?php echo $y ?>);"><?php echo $y ?></a>
                        </li>
                    <?php
                    } else {
                    ?>
                        <li class="page-item">
                            <a class="page-link" onclick="advSearchProduct(<?php echo $y ?>);"><?php echo $y ?></a>
                        </li>
                <?php
                    }
                }
                ?>



                <li class="page-item">
                    <a class="page-link" <?php

                                            if ($pageno >= $num_of_pages) {
                                                echo ("#");
                                            } else {
                                            ?>onclick="advSearchProduct(<?php echo ($pageno + 1) ?>);" <?php
                                                                                                    }
                                                                                                        ?> aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- pagination -->

    </div>
<?php
}
