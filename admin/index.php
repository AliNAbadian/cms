<?php
session_start();
if(!$_SESSION['username']){
	header('location:../login.php');
}
?>
<?php include_once('inc/header.php');?>
<?php include_once('../inc/config.php');?>
<?php
$sql = "SELECT * FROM book";
$result = mysqli_query($conn, $sql);
?>
<div class="container">
<div class="row">
<div class="col-md-8">
<?php
 while($row = mysqli_fetch_assoc($result)) {	
	?>
	<div class="card mb-3">
		
  <div class="card-body">
	<div class="row">
	  <div class="col-md-2">
<img src="<?=$row['imagePath'] ?>" width="100px">
		</div>
		 <div class="col-md-10">
		<h4><?=$row['name'] ?> </h4>	 
		<p><?=$row['discription'] ?></p>
		<p align="left"><span><a href="bookEdit.php?id=<?=$row['id'] ?>">ویرایش</a><span>&nbsp;&nbsp;</span>حذف</span></p>
		</div>
	  </div>	
</div>
</div>
	<?php  }  ?>
</div>
	
	
<div class="col-md-4">
<div class="card mb-3">
  <div class="card-header">Header</div>
  <div class="card-body">Content</div>
</div>
<div class="card mb-3">
  <div class="card-header">Header</div>
  <div class="card-body">Content</div>
</div>
<div class="card mb-3">
  <div class="card-header">Header</div>
  <div class="card-body">Content</div>
</div>	
</div>	
</div>	
</div>	
<?php include_once('inc/footer.php');?>