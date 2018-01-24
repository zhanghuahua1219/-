<?php
header("content-type:text/html;charset=utf8");
include "../public/checksession.php";
include "../public/mysql.php";
$text = $_POST['text'];
$links = $_POST['link'];

$upfile_path = '';
if($_FILES['image']['error'] == 0) {
    $ext = strrchr($_FILES['image']['name'], '.');
    $upfile_path = "../../uploads/".time().rand(100,999).$ext;
    move_uploaded_file($_FILES['image']['tmp_name'], $upfile_path);    
}


$sql = "insert into ali_pic(pic_id,pic_path, pic_txt,pic_link) values(null, '$upfile_path','$text','$links')";
$res = mysql_query($sql);
$num = mysql_affected_rows($link);

if($num > 0) {
    echo '添加新轮播图片成功';
    header('Refresh:2;url=slides.php');
} else {
    echo '添加新轮播图片失败';
    header('Refresh:2;url=slides.php');
}

?>