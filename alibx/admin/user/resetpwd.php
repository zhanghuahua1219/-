<?php 
header("content-type:text/html;charset=utf8");

include "../public/checksession.php";

$oldpwd = $_POST['oldpwd'];


include "../public/mysql.php";

// id值在check.php中保存在
$id = $_SESSION['id'];

$sql = "select * from ali_user where user_id = $id";

$res = mysql_query($sql);

$user_info = mysql_fetch_assoc($res);
// print_r(md5($oldpwd)."------------------".$user_info['user_password']);die;
// print_r($_POST['newpwd']."------------------".$_POST['re-newpwd']);die;
if (md5($oldpwd) != $user_info['user_password']) {
	echo "旧密码不正确";
	header('Refresh:2;url=password-reset.php');
} else {
	if ($_POST['newpwd'] !== $_POST['re-newpwd']) {
		echo "两次新密码不一致";
		header('Refresh:2;url=password-reset.php');
		die;
	} else {
		$newpwd = md5($_POST['newpwd']);
		// print_r($newpwd);die;   e10adc3949ba59abbe56e057f20f883e
		$sql = "update ali_user set user_password = '$newpwd' where user_id=$id";
		// print_r($sql); die;   update ali_user set user_id=15
		$newpwdres = mysql_query($sql);
		// print_r($newpwdres);die;
		$num = mysql_affected_rows($link);
		// print_r($num);die;
		if ($num > 0 ) {
			echo "修改成功";
			header('Refresh:2;url=password-reset.php');
		} else {
			echo "修改失败";
			header('Refresh:2;url=users.php');
		}
	}
}




 ?>