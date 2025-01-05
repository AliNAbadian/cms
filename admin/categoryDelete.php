<?php
$id = intval($_GET['id']);
 include_once('../inc/config.php');
$sql = "DELETE FROM category WHERE id=$id";
mysqli_query($conn, $sql);
header('location:categoryShow.php');