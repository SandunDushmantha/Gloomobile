<?php

include "connection.php";
session_start();
$user = $_SESSION["u"];

$fname = $_POST["fname"];
$lname = $_POST["lname"];
$mobile = $_POST["mobile"];
$password = $_POST["password"];
$address = $_POST["address"];


if (empty($fname)) {
    echo("Please Enter Your First Name");
} else if (strlen($fname) > 20) {
    echo ("Your first Name Should Be More Than 20 Characters");
} else if (empty($lname)) {
    echo ("Please Enter Your Last Name");
} else if (strlen($lname) > 20) {
    echo ("Your last Name Should Be More Than 20 Characters");
} else if (empty($mobile)) {
    echo ("Please Enter Your Mobile");
} else if (strlen($mobile)!= 10) {
    echo ("Your mobile Number must contain 10 Characters");
} else if (!preg_match("/07[0,1,2,4,5,6,7,8]{1}[0-9]{7}/", $mobile)) {
    echo ("Your mobile Number is Invalid");
} else if (empty($password)) {
    echo ("Please Enter Your Password");
} else if (strlen($password) < 5 || strlen($password) > 15) {
    echo ("Your password should be must contain than 5 - 15 characters");
} else if (empty($address)) {
    echo ("Please Enter Your Address");
} else if  (strlen($address) > 50) {
    echo ("Your Address Should be less than 50 Charaters");
} else {
    $rs = Database::iud("UPDATE `user` SET `fname` = '".$fname. "',`lname` = '".$lname."',`mobile` = '".$mobile."',
    `password` = '".$password."',`address` = '".$address."' WHERE `id` = '". $user["id"]. "'");
    
    $rs = Database::search("SELECT * FROM `user` WHERE `id` = '". $user["id"]. "'");
    $d = $rs->fetch_assoc();
    $_SESSION["u"] = $d;

    echo ("Update Successfully");
}

?>