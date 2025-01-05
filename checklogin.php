<?php
session_start();
require_once('inc/config.php');
 $user = mysqli_real_escape_string($conn,$_POST['username']);
$pass = mysqli_real_escape_string($conn,$_POST['pswd']);
$pass = md5($pass);
if(@$_POST['remember']){
	setcookie('myusername',$user,time()+60,'/');
	setcookie('myremember',1,time()+60,'/');
}

$sql = "SELECT * FROM users WHERE username = '$user' AND password = '$pass'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 1) {
$_SESSION['username'] = $user;
	header('location:admin/index.php');
}else{
	header('location:login.php');
	
}