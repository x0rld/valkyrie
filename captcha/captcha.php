<?php

session_start();
header("Content-type: image/png");

$picture = imagecreate(200,50);



$red = imagecolorallocate($picture, 255, 0, 0);
$blue = imagecolorallocate($picture, 0, 0, 255);
$white = imagecolorallocate($picture, 255, 255, 255);
$black = imagecolorallocate($picture, 0, 0, 0);
$orange = imagecolorallocate($picture, 255, 128, 0);

imagefill($picture, 0, 0, $white);

$array_colors=array($red,$black,$orange,$blue);
$array_angles=array(-10,1,2);
$array_fonts=array("./arial.ttf","./batmfa__.ttf");
$chars="AZERTYUIOPQSDFGHJKLMWXCVBN1234567890";
$nb_chars=strlen($chars);
$str="";

for ($i=0 ;$i<6;$i++){
  $char=$chars[ rand(0, ($nb_chars-1)) ];
  $angle=$array_angles[array_rand($array_angles)];
  $fonts=$array_fonts[array_rand($array_fonts)];
  $str = $str.$char;
  $colors=$array_colors[array_rand($array_colors)];
  imagettftext($picture , 20, $angle , $i*30,20 , $colors ,$fonts,$char);
}
$_SESSION['captcha']=$str;

imagepng($picture);
