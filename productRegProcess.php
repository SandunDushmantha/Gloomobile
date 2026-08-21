<?php

include "connection.php";

$pname = $_POST["pname"];
$brand = $_POST["brand"];
$cat = $_POST["cat"];
$color = $_POST["color"];
$warrenty = $_POST["warrenty"];
$desc = $_POST["desc"];


if (empty($pname)) {
    echo "Please Enter Product Name";
} else if (empty($brand)) {
    echo "Please Enter Brand Name";
} else if (empty($cat)) {
    echo "Please Enter Category Name";
} else if (empty($color)) {
    echo "Please Enter Color";
} else if (empty($warrenty)) {
    echo "Please Enter warrenty";
} else if (empty($desc)) {
    echo "Please Enter Description";
} else {
    if (isset($_FILES["image"])) {
        $image = $_FILES["image"];
        $path = "images/produt_img/" . uniqid() . ".jpg";
        move_uploaded_file($image["tmp_name"], $path);

        $rs = Database::search("SELECT * FROM `product` WHERE `name` = '" . $pname . "'");
        $num = $rs->num_rows;

        if ($num > 0) {
            echo "Product Already Exist";
        } else {
            Database::iud("INSERT INTO `product`(`name`,`description`,`path`,`brand_id`,`color_id`,`category_id`,`warrenty_warrenty_id`) 
    VALUES('" . $pname . "','" . $desc . "','" . $path . "','" . $brand . "','" .$color. "','" . $cat . "','" . $warrenty . "')");

            echo "Success";
        }
    } else {
        echo "Please select image";
    }
}


    