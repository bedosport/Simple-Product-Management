<?php
session_start();

// database initialiation
$servername = "localhost";
$username   = "root";
$password   = "";
$db_name    = "product_management_code";


// Create connection
$conn =  mysqli_connect($servername, $username, $password,$db_name);
mysqli_set_charset($conn,"utf8");
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}


// define base url 
define("URL","http://127.0.0.1/G-6/product_managment/");
define("FOLDER_PATH","");
define("PREV_FOLDER","../");
define("HANDELER_FOLDER","../../core/");


// set container for errors 
$errors = [];


// dire of file 
define("FILE_DIRE",__DIR__);