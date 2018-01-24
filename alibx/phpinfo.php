<?php
header("content-type:image/png");

// 1、创建真色画布
// $img 返回的是资源型
$img = imagecreatetruecolor(200, 200);

// 2、 创建画笔
// 参数1：画布资源
// 参数2：红绿蓝三色值
// 返回值是一个颜色（背景色）
$red = imagecolorallocate($img, 255, 0, 0);

// 3、填充画布颜色
// 参数1：画布资源
// 参数2：代表画布中的一个点（目前的取值范围0-199）
imagefill($img, 0, 0, $red);


// 绘图
$black = imagecolorallocate($img, 100, 50, $black);
imagesetpixel(image, x, y, color)


// 4、绘图（使用GD库中的各种绘图函数）
imagestring($img（画布资源）, font(1-7), x(位置起）, y（位置尾）, string（绘制的字符串如‘abcd’）, color（字符串的颜色）);

// 绘制实心椭圆
imagefilledarc($img画布资源, cx圆心的x坐标点, cy圆心的y坐标点, width圆的宽, height圆的高, start（起始角度）, end（结束角度）, color圆的颜色, style（圆的样式）);




// 5、显示和保存绘制的图片
// 显示和保存时互斥的，只能选择其中的一种
// 函数格式：imagepng   imagejpeg   imagegif
// 1 画布资源
// 2 图片的保存路劲  如果有参数1 则进行图片保存 ;没有参数2 则进行图片显示
imagepng($img);

// 6 销毁画布资源
imagedestroy($img);









 ?>