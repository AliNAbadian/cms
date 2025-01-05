<!doctype html>
<html dir="rtl">
<head>
<meta charset="utf-8">
<title>LOGIN</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="js/jquery.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>

</head>

<body>
	<br><br>
<div class="container mr-auto" style="width: 50%">
<h1 align="center">ورود به مدیریت سیستم</h1>
  <form action="checklogin.php" method="post">
    <div class="form-group">
      <label for="username">نام کاربری:</label>
      <input type="text" class="form-control" placeholder="نام کاربری را وارد کنید" name="username" value="<?php @$_COOKIE['myusername']; ?>">
    </div>
    <div class="form-group">
      <label for="pwd">رمز عبور:</label>
      <input type="password" class="form-control" placeholder="رمز عبور را وارد کنید" name="pswd">
    </div>
    <div class="form-group form-check">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="remember" <?php
			   if(isset($_COOKIE['myremember'])){
				   echo 'checked="checked"';
			   }else{
				   echo '';
			   }
			   
			   ?>> یادآوری
      </label>
    </div>
    <button type="submit" name="submit" class="btn btn-primary">ورود</button>
  </form>
</div>	
</body>
</html>