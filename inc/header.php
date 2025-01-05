<!doctype html>
<html dir="rtl">
<head>
<meta charset="utf-8">
<title>Home page</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="js/jquery.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>

	

</head>

<body>
	<div class="container bg-warning">
	<div class="row">
		<div class="col-md-4">
		<img src="img/Logo.jpg" class="float-right">
		</div>
		<div class="col-md-4">
		</div>
		<div class="col-md-4">
		<img src="img/ads.gif" class="float-left">
		</div>
		</div>
	</div>
<?php
require_once('inc/config.php');
$sql = "SELECT * FROM category";
$result = mysqli_query($conn, $sql);
	
	?>
	<nav class="navbar navbar-expand-sm bg-dark navbar-dark container">
  <!-- Brand -->
  <a class="navbar-brand" href="#">خانه</a>

  <!-- Links -->
  <ul class="navbar-nav">
	  <?php
	  while($row = mysqli_fetch_assoc($result)){
	  ?>
    <li class="nav-item">
      <a class="nav-link" href="#"><?=$row['name']?></a>
    </li>
   <?php  }   ?>
  </ul>
</nav>
<br>	