<?php 
header("content-type:text/html; charset=utf-8");
include "../public/checksession.php"; 
$id     = $_POST['id'];
$name   = $_POST['name'];
$slug   = $_POST['slug'];
$icon   = $_POST['icon'];
$status = $_POST['status'];
$show   = $_POST['show'];

include "../public/mysql.php";

$sql = "update ali_cate set cate_name = '$name', cate_slug = '$slug', cate_class = '$icon', cate_status = '$status', cate_show = '$show' where cate_id = '$id'";

mysql_query($sql);
$num = mysql_affected_rows($link);

if ($num > 0) {
	echo "修改成功";
	header('Refresh:2; url= categories.php');
} else {
	echo "修改失败";
	header('Refresh:2; url= update.php?id='.$id);
}

 ?>