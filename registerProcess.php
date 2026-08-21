<?php

session_start();
include "connection.php";

$fname = $_POST["f"];
$lname = $_POST["l"];
$email = $_POST["e"];
$mobile = $_POST["m"];
$password = $_POST["p"];

if (empty($fname)) {
    echo ("Please enter your first name.");
} else if (strlen($fname) > 15) {
    echo ("YOur First Name Should be less than 20 Character.");
} else if (empty($lname)) {
    echo ("Please enter your Last name.");
} else if (strlen($lname) > 15) {
    echo ("YOur First Name Should be less than 20 Character.");
} else if (empty($email)) {
    echo ("Please enter your Email Address.");
} else if (strlen($email) > 100) {
    echo ("Email Address must contain LOWER THAN 100 Characters.");
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo ("Invalid Email Address.");
} else if (empty($mobile)) {
    echo ("Please enter your Mobile Number.");
} else if (strlen($mobile) != 10) {
    echo ("Mobile Number must contain 10 Characters.");
} else if (!preg_match("/07[0,1,2,4,5,6,7,8]{1}[0-9]{7}/", $mobile)) {
    echo ("Invalid Mobile Number.");
} else if (empty($password)) {
    echo ("Please enter your Password");
} else if (strlen($password) < 5 || strlen($password) > 45) {
    echo ("The Password must contain 5 to 45 characters.");
} else {

    $rs = Database::search("SELECT * FROM `user` WHERE `email`='".$email."' OR `mobile`='".$mobile."'");
    $n = $rs->num_rows;

    if ($n > 0) {
        echo ("Email OR Mobile Already Exsists");
    } else {

        $d = new DateTime();
        $tz = new DateTimeZone("Asia/Colombo");
        $d->setTimezone($tz);
        $date = $d->format("Y-m-d H:i:s");

        Database::iud ("INSERT INTO `user`
        (`fname`,`lname`,`email`,`joined_date`,`mobile`,`password`,`status`,`user_type_id`) VALUES
        ('".$fname."','".$lname."','".$email."','".$date."','".$mobile."','".$password."','1','2')");

        echo ("Success");
    }
}
