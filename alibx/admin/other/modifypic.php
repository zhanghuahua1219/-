<?php
header("content-type:text/html;charset=utf8");
include "../public/checksession.php";
$id = $_POST['id'];
$name = $_POST['name'];

include "../public/mysql.php";
$sql = "update ali_pic set pic_state = '$name' where pic_id = $id";

mysql_query($sql);

$num = mysql_affected_rows($link);

if($num > 0 ) {
    echo 1;
} else {
    echo 2;
}


?>