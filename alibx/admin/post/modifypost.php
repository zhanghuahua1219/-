<?php
header("content-type:text/html;charset=utf8");
include "../public/checksession.php";
include "../public/mysql.php";

$id = $_POST['id'];
// print_r($id);die;
// 接受表单数据
$title = $_POST['title'];
$content= $_POST['content'];
$slug = $_POST['slug'];
$category = $_POST['category'];
$created = time();//$_POST['created'];
$status = $_POST['status'];

// 接受表单没有提供的数据
$upfile_path = '';
if($_FILES['feature']['error'] == 0) {
    $ext = strrchr($_FILES['feature']['name'], '.');
    $name = '../uploads/'.time().rand(100,999).$ext;
    move_uploaded_file($_FILES['feature']['tmp_name'], $upfile_path);
    $sql = "select post_file from ali_post where post_id=$id";
    $res = mysql_query($sql);
    $file = mysql_fetch_assoc($res);
    $oldpath = $file['post_file'];
}

$upfile = '';
if($upfile_path != '') {
    $upfile = ",post_file='$upfile_path'";
}
$sql = "update ali_post set post_title = '$title', post_content = '$content', post_slug = '$slug', post_cateid = '$category', post_updtime = $created, post_state = '$status', post_file = '$upfile_path' where post_id = $id";
mysql_query($sql);
// print_r($sql); die;
$num = mysql_affected_rows($link);
if($num > 0) {
    if($oldpath != '') {
        unlink($oldpath); // unlink是删除老图片路径
    }
    echo "修改成功";
    header('Refresh:2;url=posts.php');
} else {
    echo "修改失败";
    header('Refresh:2;url=editpost.php?='.$id);
}


?>