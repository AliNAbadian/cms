<?php
session_start();
if(!$_SESSION['username']){
	header('location:../login.php');
}
?>
<?php include_once('inc/header.php');?>
<?php
require_once('../inc/config.php');?>
<div class="container">
  <h2 align="center">فرم افزودن کتاب </h2>
	<hr>
  <form action="#" method="post" enctype="multipart/form-data">
	<div class="form-group">
<?php
	$sql = "SELECT * FROM category";
$result = mysqli_query($conn, $sql);
	
		?>
  <label for="sel1">انتخاب دسته:</label>
  <select class="form-control" id="category" name="category">
	     <option>انتخاب دسته</option>
	 <?php
		while($row = mysqli_fetch_assoc($result)){
		?>
    <option value="<?=$row['id']  ?>"><?=$row['name']  ?></option>
    <?php } ?>
  </select>
</div>  
    <div class="form-group">
      <label for="name">نام کتاب:</label>
      <input type="text" class="form-control"  placeholder="نام دسته" name="name">
    </div>
   <div class="form-group">
  <label for="discription">توضیحات:</label>
  <textarea class="form-control" rows="5" name="discription"></textarea>
</div>
	   <div class="form-group">
      <input type="file" class="form-control-file " name="image">
    </div>
    <button type="submit" class="btn btn-primary">ثبت</button>
  </form>
</div>



<?php
if($_POST){
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);	
$category_id = $_POST['category'];
$name = $_POST['name'];	
$discription = $_POST['discription'];	
$sql = "INSERT INTO book (category,name, discription,imagePath) VALUES ($category_id,'$name', '$discription','$target_file')";
mysqli_query($conn,$sql);
mysqli_close($conn);	
}
?>
<?php include_once('inc/footer.php');?>