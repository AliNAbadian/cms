<?php
session_start();
if(!$_SESSION['username']){
	header('location:../login.php');
}
$id = intval($_GET['id']);
?>
<?php include_once('inc/header.php');?>
<?php
require_once('../inc/config.php');

$sqlbook = "SELECT * FROM book WHERE id = $id";
$resultbook = mysqli_query($conn, $sqlbook);
$rowbook = mysqli_fetch_assoc($resultbook);
?>
<div class="container">
  <h2 align="center">فرم ویرایش کتاب </h2>
  <hr>
  <form action="#" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <?php
      $catid = $rowbook['category'];
      $sqlcat = "SELECT * FROM category WHERE id = $catid";
      $resulcat = mysqli_query($conn, $sqlcat);
      $rowcat = mysqli_fetch_assoc($resulcat);
      ?>
      <label for="sel1">انتخاب دسته:</label>
      <select class="form-control" id="category" name="category">
        <option value="<?=$rowcat['id']?>"><?=$rowcat['name']?></option>
        <?php
        $sql = "SELECT * FROM category WHERE id != $catid";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <option value="<?=$row['id']?>"><?=$row['name']?></option>
        <?php } ?>
      </select>
    </div>  

    <div class="form-group">
      <label for="name">نام کتاب:</label>
      <input type="text" class="form-control" placeholder="نام کتاب" name="name" value="<?= htmlspecialchars($rowbook['name']); ?>">
    </div>

    <div class="form-group">
      <label for="discription">توضیحات:</label>
      <textarea class="form-control" rows="5" name="discription"><?= htmlspecialchars($rowbook['discription']); ?></textarea>
    </div>

    <div class="form-group">
      <input type="file" class="form-control-file" name="image">
    </div>
    <button type="submit" class="btn btn-primary">ثبت</button>
  </form>
</div>

<?php
if ($_POST) {
  if ($_FILES['image']['size'] > 0) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);	
    $category_id = $_POST['category'];
    $name = $_POST['name'];	
    $discription = $_POST['discription'];	
    $sql = "UPDATE book SET category = $category_id, name = '$name', discription = '$discription', imagePath = '$target_file' WHERE id = $id";
    mysqli_query($conn, $sql);
    mysqli_close($conn);	
    header('location:index.php');
  } else {
    $category_id = $_POST['category'];
    $name = $_POST['name'];	
    $discription = $_POST['discription'];	
    $target_file = $rowbook['imagePath'];
    $sql = "UPDATE book SET category = $category_id, name = '$name', discription = '$discription', imagePath = '$target_file' WHERE id = $id";
    mysqli_query($conn, $sql);
    mysqli_close($conn);	
    header('location:index.php');
  }
}
?>
<?php include_once('inc/footer.php');?>
