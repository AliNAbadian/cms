<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('location:../login.php');
    exit; // Make sure to stop the script after redirect
}

require_once('inc/config.php');

// Check database connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM category";
$result = mysqli_query($conn, $sql);

// Check if query was successful
if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}
?>

<?php include_once("inc/header.php"); ?>

<div class="container mt-3">
  <h2>دسته بندی کتاب ها </h2>      
  <table class="table table-striped table-bordered">
    <thead>
      <tr>
        <th>نام دسته</th>
        <th>توضیحات</th>
        <th>عملیات</th>
      </tr>
    </thead>
    <?php if (mysqli_num_rows($result) > 0) { ?>
        <tbody>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?= htmlspecialchars($row['name']) ?></td>
                <td><?= htmlspecialchars($row['discription']) ?></td>
                <td><a href="#" class="delete-link" data-id="<?= $row['id'] ?>">حذف</a></td>
            </tr>
        <?php } ?>
        </tbody>
    <?php } else { ?>
        <tr><td colspan="3">No categories found</td></tr>
    <?php } ?>
  </table>
</div>

<script src="../js/sweetalert2.js"></script>
<script>
  // Add event listeners to all "حذف" links
  document.querySelectorAll('.delete-link').forEach(function(link) {
    link.addEventListener('click', function(event) {
      event.preventDefault(); // Prevent the default link behavior
      
      const itemId = this.getAttribute('data-id'); // Get the category ID
      const itemUrl = `categoryDelete.php?id=${itemId}`; // Prepare the URL for deletion
      
      // Show the SweetAlert confirmation dialog
      Swal.fire({
        title: "آیا می خواهید حذف کنید؟",
        text: "این عمل برگشت پذیر نیست!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "بلی",
        cancelButtonText: "خیر"
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = itemUrl; // Redirect to the deletion URL if confirmed
        }
      });
    });
  });
</script>

<?php include_once("inc/footer.php"); ?>
