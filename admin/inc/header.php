<!doctype html>
<html dir="rtl">
<head>
<meta charset="utf-8">
<title>Admin page</title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<script src="../js/jquery.min.js"></script>
	<script src="../js/popper.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>

	

</head>

<body>
	
	<nav class="navbar navbar-expand-sm bg-dark navbar-dark ">
<!-- Dropdown -->
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        دسته ها
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="categoryAdd.php">افزودن دسته</a>
        <a class="dropdown-item" href="categoryShow.php">مشاهده دسته ها</a>
        
      </div>
    </li>

  <!-- Links -->
  <ul class="navbar-nav">
   <!-- Dropdown -->
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
       کتاب ها
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="bookAdd.php">افزودن کتاب</a>
        <a class="dropdown-item" href="index.php">مشاهده کتاب ها</a>
        
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">نظرات</a>
    </li>

    <!-- Dropdown -->
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        تنظیمات
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="#">تغییر رمز</a>
        <a class="dropdown-item" href="../logout.php">خروج</a>
        
      </div>
    </li>
  </ul>
</nav>
<br>	