<?php 
header("content-type:text/html; charset=utf8");
$title    = $_POST['title'];
$content  = $_POST['content'];
$slug     = $_POST['slug'];
$category = $_POST['category'];
$created  = strtotime($_POST['created']);
$status   = $_POST['status'];
// print_r($created);die;

// 手动自定义数据
$desc     = substr($content, 0, 300);
session_start();
$author   = $_SESSION['id'];
$updtime  = $created;
$click    = rand(300,800);
$good     = rand(200,300);
$bad      = rand(5, 20);

// 特殊文件上传路径
$upfile_path = "";
if($_FILES['feature']['error'] == 0){
	$ext = strrchr($_FILES['feature']['name'],'.');
	$upfile_path = '../../uploads/'.time().$ext;
	move_uploaded_file($_FILES['feature']['tmp_name'], $upfile_path);
};

include "../public/mysql.php";
$sql = "insert into ali_post values (null, '$title', '$slug', '$desc', '$content', '$author', '$category', '$upfile_path', '$created', '$updtime', $click, $good, $bad, '$status')";
mysql_query($sql);
$num = mysql_affected_rows($link);
if ($num > 0) {
	echo "添加新文章成功";
	header('Refresh:2;url=posts.php');
} else {
	echo "添加新文章失败";
	header('Refresh:2;url=addposts.php');
}

 ?>