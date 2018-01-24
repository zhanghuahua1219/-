<?php
include "../public/checksession.php";
$ids = $_POST['ids'];
include "../public/mysql.php";
$sql = "update ali_comment set cmt_state='批准' where cmt_id in ($ids)";

mysql_query($sql);
$num = mysql_affected_rows($link);
if($num > 0) {
    echo 1;
} else {
    echo 2;
}


?>