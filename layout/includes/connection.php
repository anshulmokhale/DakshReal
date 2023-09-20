<?php

$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "starkina_daksh_real_estate";

// $dbServername = "localhost";
// $dbUsername = "root";
// $dbPassword = "";
// $dbName = "starkins_real_estate";

// $dbServername = "localhost";
// $dbUsername = "u238267711_daksh";
// $dbPassword = ">SiHgv9W";
// $dbName = "u238267711_daksh";
$mysql_connection = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName) or die;
session_start();
date_default_timezone_set('Asia/Kolkata');
?>