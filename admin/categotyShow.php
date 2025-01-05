<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('location:../login.php');
    exit();
}
?>
<?php include_once('inc/header.php');?>
<?php
require_once('./inc/config.php');
$sql = "SELECT * FROM category " ;
$result = mysqli_query($conn, $sql) ;
?>
<div class="container">
    <h2>دسته بندی کتاب ها</h2>
    <table class="table table-striped container table-bordred">
        <thead>
            <tr>
                <th>نام دسته</th>
                <th>توضیحات</th>
                <th>عملیات</th>
            </tr>
        </thead>
        <tbody>
            <?php
        while($row = mysqli_fetch_array($result)){
        ?>
            <tr>
                <td><?= $row['name']?></td>
                <td><?= $row['description']?></td>
                <td><a href="categoryDelete.php?id=<?= $row['id']?>">حدف</a></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>


<?php include_once('inc/footer.php') ;?>