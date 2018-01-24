<?php 
header("content-type:text/html; charset=utf8");
include "../public/mysql.php";
include "../public/checksession.php"; 
$email      = trim($_POST['email']);
$slug       = trim($_POST['slug']);
$nickname   = trim($_POST['nickname']);
$password   = trim(md5($_POST['password']));
$state      = trim($_POST['state']);
// $pic        = trim($_POST['pic']);

$sql = "insert into ali_user values (null, '$email', '$slug', '$nickname', '$password', '$state','')";

$res = mysql_query($sql);
// die($sql);
$num = mysql_affected_rows($link);

if ($num > 0) {
	echo "添加成功";
	header('Refresh:2;url=users.php');
} else {
	echo "添加失败";
	header('Refresh:2;url=user_adduser.php');
}

 ?>