<?php

$server  = "localhost";
$user = "root";
$pass = "";
$dbname = "test";

$conn = new mysqli($server, $user, $pass, $dbname);


if (!$conn){
    echo "error in connection";
} 

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);