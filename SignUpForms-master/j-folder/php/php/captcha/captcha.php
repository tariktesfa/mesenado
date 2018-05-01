<?php
	if (!isset($_SESSION)) session_start();

	// Create numbers
	$num1 = rand(3,7);
	$num2 = rand(2,6);
	$num3 = rand(0,4);
	$_SESSION['code'] = ($num1 + $num2) - $num3;

	// Create image
	$pic_code = '('.$num1.'+'.$num2.')-'.$num3.'=';
	$im = imagecreatefrompng('bg-captcha.png');
	$bg = imagecolorallocate($im, 224, 224, 224);
	$textcolor = imagecolorallocate($im, 140, 140, 140);
	imagestring($im, 5, 10, 16, $pic_code, $textcolor);

	// Output the image as a png
	header('Content-type: image/png');
	imagepng($im);
	imagedestroy($im);
?>