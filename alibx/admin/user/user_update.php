<?php 
header("content-type:text/html; charset=utf8");
include "../public/mysql.php";
include "../public/checksession.php"; 
$id         = $_POST['id'];
$email      = $_POST['email'];
$slug       = $_POST['slug'];
$nickname   = $_POST['nickname'];
$password   = $_POST['password'];
$state      = $_POST['state'];

$sql = "update ali_user set user_email = '$email', user_slug = '$slug', user_nickname = '$nickname', user_password = '$password', user_state = '$state' where user_id = $id";

// print_r($sql);
$res = mysql_query($sql);
$num = mysql_affected_rows($link);
if($num > 0) {
    echo "修改成功";
    header('Refresh:2; url=users.php');
} else {
    echo "修改失败";
    header('Refresh:2; url=user_edit.php?id='.$id);
}

 ?>
 