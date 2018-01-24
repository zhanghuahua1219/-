<?php 

header("content-type:image/png");
// 创建画布
$img = imagecreatetruecolor(200,200);

// 调色
// 创建背景
$bg = imagecolorallocate($img, 0, 0, 255);

// 把背景填充到画布上
imagefill($img, 0, 0, $bg);

// 绘图
$red = imagecolorallocate($img, 255, 0, 0);
imagesetpixel($img, 100, 100, $red);


// 保存图片
imagepng($img, );


// 销毁图片资源
imagedestroy($img);




 ?>