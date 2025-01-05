<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cms_db";

$conn = mysqli_connect($servername, $username, $password, $dbname);
mysqli_set_charset($conn,"utf8");
