<?php 

$user_code = $_POST['code'];
// echo $user_code;


session_start();
$code = $_SESSION['code'];
// echo $code;

if ($user_code == $code) {
	echo 1;
} else {
	echo 0;
}



 ?>