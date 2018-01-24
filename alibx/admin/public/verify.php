<?php 
header("content-type:image/png");
//1 创建验证码
// 定义字符串，验证码中的字符都必须从$str获取
$str = '2345678abcdefhjkmnpqrstuuvwxyz';

// 要产生一个四位的验证码。每次产生一个
$len = strlen($str);
$code = '';
for($i = 0; $i < 4; $i++) {
	$code .= $str[rand(0, $len - 1)];
}
// echo $code;
// 将验证码保存在session中
session_start();
$_SESSION['code'] = $code;

// 绘制验证码
// 创建画布
$img = imagecreatetruecolor(100, 40);
$red = imagecolorallocate($img, 255, 0, 0);
$green= imagecolorallocate($img, 0, 255, 0);
$blue = imagecolorallocate($img, 0, 0, 255);
$white = imagecolorallocate($img, 255, 255, 255);
$black = imagecolorallocate($img, 0, 0, 0);
$green1= imagecolorallocate($img, 255, 255, 0);
$blue1 = imagecolorallocate($img, 0, 255, 255);
$white1 = imagecolorallocate($img, 255, 0, 255);

// $arr = [0 =>'$green', 1 =>'$red', 2 =>'$while', 3 =>'$black',4 =>'$green1', 5 =>'$blue1', 6 =>'$white1'];


// 填充画布颜色
imagefill($img, 0, 0, $white);

// 绘制验证码
for($i = 0; $i < 4; $i++) {
	imagettftext(
		$img,       // 画布资源
		rand(15,25),  // 字体大小
		rand(-30,30), // 倾斜角度
	    10 + $i * 20,           // 绘制文字的起始位置
		30, 		  // 绘制文字的结束位置
		imagecolorallocate($img, rand(10,255), rand(10,255), rand(10,255)), 	  // 绘制文字颜色
		'msyh.ttf',   // 绘制文字所使用的字形
		$code[$i]     // 绘制的文字
	);
}

imagepng($img);

imagedestroy($img);




 ?>