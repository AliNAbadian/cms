<?php
session_start();
if(!$_SESSION['username']){
	header('location:../login.php');
}
?>
<?php include_once('inc/header.php');?>
<div class="container">
  <h2>افزودن دسته جدید</h2>
	<hr>
  <form action="#" method="post">
    <div class="form-group">
      <label for="name">نام دسته:</label>
      <input type="text" class="form-control"  placeholder="نام دسته" name="name">
    </div>
   <div class="form-group">
  <label for="discription">توضیحات:</label>
  <textarea class="form-control" rows="5" name="discription"></textarea>
</div>
    <button type="submit" class="btn btn-primary">ثبت</button>
  </form>
</div>
<?php
require_once('../inc/config.php');
if($_POST){
$name = $_POST['name'];
$discription = $_POST['discription'];	
$sql = "INSERT INTO `category` (`name`, `discription`) VALUES ('$name', '$discription')";
mysqli_query($conn,$sql);	
}
?>

<?php include_once('inc/footer.php');?>