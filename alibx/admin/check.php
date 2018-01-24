<?php 
header("content-type:text/html;charset=utf8");

// 获取用户输入的验证码
$user_code = $_POST['code'];

// 获取系统产生的验证码
session_start();
$sys_code = $_SESSION['code'];

// 判断验证码是否一致
if ($user_code != $sys_code) {
	echo "验证码错误";
	header("Refresh:2;url=login.html");
	die;
}

$email = $_POST['email'];
$pwd = $_POST['pwd'];
// print_r($pwd);die;

include "public/mysql.php";
$sql = "select * from ali_user where user_email = '$email'";
$res = mysql_query($sql);
$user_info = mysql_fetch_assoc($res);

if ($user_info['user_password'] == md5($pwd)) {
	$_SESSION['id'] = $user_info['user_id'];
	$_SESSION['email'] = $user_info['user_email'];
	$_SESSION['nickname'] = $user_info['user_nickname'];
	echo "登录成功";
	header('Refresh:2;url=index.php');
} else {
	echo "用户名或密码错误";
	header('Refresh:2;url=login.html');
}


 ?>