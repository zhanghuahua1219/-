<?php
header("content-type:text/html;charset=utf8");
include "../public/checksession.php";
include "../public/mysql.php";

$id = $_POST['id'];
$name = $_POST['name'];

$sql = "update ali_comment set cmt_state = '$name' where cmt_id = $id";
$res = mysql_query($sql);

$num = mysql_affected_rows($link);

if($num > 0) {
    echo 1;
} else {
    echo 2;
}


?>