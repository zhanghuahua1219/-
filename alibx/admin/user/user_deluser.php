<?php 
include "../public/checksession.php"; 
include "../public/mysql.php";
$id = $_POST['id'];
$sql = "delete from ali_user where user_id = $id";
mysql_query($sql);
$num = mysql_affected_rows($link);
if ($num > 0) {
	echo 1;
} else {
	echo 2;
}



 ?>