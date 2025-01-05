<?php include_once('inc/header.php'); ?>
<?php
if ($_POST) {
    $search = mysqli_real_escape_string($conn, $_POST['search']);
    $sql = "SELECT * FROM book WHERE name LIKE '%$search%' OR discription LIKE '%$search%'";
    $result = mysqli_query($conn, $sql);
}
?>
<div class="container">
  <h2>نتایج جست و جو</h2>
  <div class="row">
    <div class="col-md-8">
        <?php
        if (isset($result)) {
            while ($row = mysqli_fetch_assoc($result)) {  
        ?>
        <div class="card mb-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-2">
                        <img src="<?php echo 'admin/' . $row['imagePath']; ?>" width="100px">
                    </div>
                    <div class="col-md-10">
                        <h4><?php echo $row['name']; ?></h4>
                        <p><?php echo $row['discription']; ?></p>
                    </div>
                </div>  
            </div>
        </div>
        <?php  
            }  
        }
        ?>
    </div>
    
    <div class="col-md-4">
        <div class="card mb-3">
            <div class="card-header">دسته بندی موضوعی</div>
            <div class="card-body">
                <?php
                // Query to fetch categories or items for the sidebar
                $category_sql = "SELECT * FROM book";
                $category_result = mysqli_query($conn, $category_sql); 
                ?>
                <ul style="list-style-type:square;">
                    <?php
                    while ($category_row = mysqli_fetch_assoc($category_result)) {
                    ?>        
                    <li><?php echo $category_row['name']; ?></li>
                    <?php  
                    }
                    ?>
                </ul>
            </div>
        </div>
        
        <div class="card mb-3">
            <div class="card-header">جست و جو</div>
            <div class="card-body">
                <div class="container mt-3">
                    <form action="search.php" method="POST">
                        <div class="mb-3 mt-3">
                            <label for="search">جست و جو</label>
                            <input type="text" class="form-control" name="search">
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
