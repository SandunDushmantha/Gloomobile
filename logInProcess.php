<?php

session_start();
include "connection.php";

$email = $_POST["em"];
$password = $_POST["p"];
$rememberme = $_POST["r"];

if (empty($email)) {
    echo ("Please enter your Email.");
} else if (strlen($email) > 100) {
    echo ("Username must contain LOWER THAN 100 characters.");
} else if (empty($password)) {
    echo ("Please enter your Password.");
} else if (strlen($password) > 20 || strlen($password) < 5) {
    echo ("Password must contain BETWEEN 5 to 20 characters.");
} else {

    $rs = Database::search("SELECT * FROM `user` WHERE `email` = '" . $email . "' AND `password` = '" . $password . "'");
    $num = $rs->num_rows;
    $d = $rs->fetch_assoc();

    if ($num == 1) {

        if ($d["status"] == 1) {
            // Active User
            echo ("Success");

            $_SESSION["u"] = $d;

            if ($rememberme == "true") {
                // Set Cookis
                setcookie("email", $email, time() + (60 * 60 * 24 * 365));
                setcookie("password", $password, time() + (60 * 60 * 24 * 365));
            } else {
                // Destroy Cookie
                setcookie("email", "", -1);
                setcookie("password", "", -1);
            }
            
        } else {
            // Inactive User
            echo ("Inactive User Account! Please Try again an Other Account.");
        }
    } else {
        echo ("Invalid Email OR Password");
    }
}
