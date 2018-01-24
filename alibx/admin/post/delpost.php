<?php
$id = $_POST['id'];
include "../public/mysql.php";
$sql = "delete from ali_post where post_id=$id";
mysql_query($sql);
$num = mysql_affected_rows($link);
if($num > 0) {
    echo 1;
} else {
    echo 2;
}












?>