<?php 
// 	session_start(); 
// 	$chars = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
//   $string = '';
//   for ($i=0; $i < $len; $i++) {
//     $pos = rand(0, strlen($chars)-1);
//     $string .= $chars[$pos];
//   }
// // 	$text = rand(10000,99999); 
// 	$_SESSION["vercode"] = $string; 
// 	$height = 25; 
// 	$width = 65;   
// 	$image_p = imagecreate($width, $height); 
// 	$black = imagecolorallocate($image_p, 0, 0, 0); 
// 	$white = imagecolorallocate($image_p, 255, 255, 255); 
// 	$font_size = 14; 
// 	imagestring($image_p, $font_size, 5, 5, $string, $white); 
// 	imagejpeg($image_p, null, 80);
  session_start();
  $width = 85;
  $height = 35;
  $im = imagecreate($width, $height);
  $bg = imagecolorallocate($im, 0, 0, 0);
  $len = 6;
  $chars = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $string = '';
  for ($i=0; $i < $len; $i++) {
    $pos = rand(0, strlen($chars)-1);
    $string .= $chars[$pos];
  }
  $_SESSION['vercode'] = $string;
  $bgR = mt_rand(100, 200);
  $bgG = mt_rand(100, 200);
  $bgB = mt_rand(100, 200);
  $noise_color = imagecolorallocate($im, abs(255 - $bgR), abs(255 - $bgG), abs(255 - $bgB));
  for ($i=0; $i < ($width*$height) / 3; $i++) {
    imagefilledellipse($im, mt_rand(0,$width), mt_rand(0,$height), 3, rand(2,5), $noise_color);
  }
  $text_color = imagecolorallocate($im, 240, 240, 240);
  $rand_x = rand(0, $width - 50);
  $rand_y = rand(0, $height - 15);
  imagestring($im, 12, $rand_x, $rand_y, $string, $text_color);
  header ("Content-type: image/png");
  imagepng($im);
?>
