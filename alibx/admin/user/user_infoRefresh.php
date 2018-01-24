<?php
header("content-type:text/html; charset=utf8");
include "../public/checksession.php";
include "../public/mysql.php";

$id = $_SESSION['id'];

$email = $_POST['email'];
$nickname = $_POST['nickname'];
$slug = $_POST['slug'];

$sql = "update ali_user set user_email = '$email', user_nickname = '$nickname', user_slug = '$slug' where user_id = $id";

// print_r($sql);die;
$res = mysql_query($sql);
// $row = mysql_fetch_assoc($res);
// print_r($row);die;

$num = mysql_affected_rows($link);
// print_r($num);die;
if($num > 0) {
    echo "修改成功";
    header('Refresh:2; url=users.php');
} else {
    echo "修改失败";
    header('Refresh:2; url=profile.php');
}





?>