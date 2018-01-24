<?php 
header("content-type:text/html; charset=utf-8");
include "../public/checksession.php";
include "../public/mysql.php";
$id = $_GET['id'];
$sql = "delete from ali_cate where cate_id=$id";

mysql_query($sql);
$num = mysql_affected_rows($link);
if ($num > 0) {
	echo "删除成功";
	header('Refresh:2;url=categories.php');
} else {
	echo "删除失败";
	header('Refresh:2;url=categories.php');
}


 ?>