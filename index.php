<?php include_once('inc/header.php'); ?>
<?php
$sql = "SELECT * FROM book";
$result = mysqli_query($conn, $sql);
?>
<div class="container">
  <div class="row">
    <div class="col-md-8">
      <?php
      while ($row = mysqli_fetch_assoc($result)) {
      ?>
      <div class="card mb-3">
        <div class="card-body">
          <div class="row">
            <div class="col-md-2">
              <img src="<?php echo 'admin/' . $row['imagePath']; ?>" width="100px">
            </div>
            <div class="col-md-10">
              <h4><?php echo $row['name']; ?> </h4>
              <p><?php echo $row['discription']; ?></p>
            </div>
          </div>
        </div>
      </div>
      <?php } ?>
    </div>
    
    <div class="col-md-4">
      <div class="card mb-3">
        <div class="card-header">دسته بندی موضوعی</div>
        <div class="card-body">
          <?php
          // Re-query for the categories or books to display them
          $result = mysqli_query($conn, $sql);  
          ?>
          <ul style="list-style-type:square;">
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
            ?>        
            <li><?php echo $row['name']; ?></li>
            <?php } ?>
          </ul>
        </div>
      </div>

      <div class="card mb-3">
        <div class="card-header">جست و جو</div>
        <div class="card-body">
          <div class="container mt-3">
            <!-- Changed to method POST for form submission -->
            <form action="search.php" method="POST">
              <div class="mb-3 mt-3">
                <label for="search">جست و جو</label>
                <input type="text" class="form-control" name="search" id="search">
              </div>
              <button type="submit" class="btn btn-primary">بگرد</button>
            </form>
          </div>
        </div>
      </div>

      <div class="card mb-3">
        <div class="card-header">Header</div>
        <div class="card-body">Content</div>
      </div>
    </div>
  </div>
</div>

<?php include_once('inc/footer.php'); ?>
