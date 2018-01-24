<?php 
header("content-type:text/html; charset=utf-8");
include "../public/checksession.php"; 
include "../public/mysql.php";
$name   = trim($_POST['name']);
$slug   = trim($_POST['slug']);
$icon   = trim($_POST['icon']);
$status = trim($_POST['status']);
$show   = trim($_POST['show']);

$sql = "insert into ali_cate values(
	null, '$name', '$slug', '$icon', '$status', '$show'
)";

mysql_query($sql);

$num = mysql_affected_rows($link);

if ($num > 0) {
	echo "添加分类成功";
	header('Refresh:2;url=categories.php');
} else {
	echo "添加分类失败";
	header('Refresh:2;url=addcate.php');
}


 ?>