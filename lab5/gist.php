<?php

require_once "connect.php";

$size_x = 210;
$size_y = 250;

$q = "select * from visit_logger where drink_id=1";
$r = $con->query($q);
$water_cnt = $r->num_rows;

$q = "select * from visit_logger where drink_id=2";
$r = $con->query($q);
$wine_cnt = $r->num_rows;

$q = "select * from visit_logger where drink_id=3";
$r = $con->query($q);
$juice_cnt = $r->num_rows;

$q = "select * from visit_logger where drink_id=4";
$r = $con->query($q);
$cola_cnt = $r->num_rows;

$pixels_per_unit = ($size_y - 35) / max($wine_cnt , $cola_cnt , $juice_cnt , $water_cnt);

$im=@imagecreate($size_x, $size_y) or die ("Cant Initialize GD");
$white_color = imagecolorallocate($im, 196, 196, 196);

$water_color = imagecolorallocate($im, 10, 10, 196);
$wine_color = imagecolorallocate($im, 196, 10, 10);
$juice_color = imagecolorallocate($im, 196, 196, 10);
$cola_color = imagecolorallocate($im, 10, 10, 10);

$water_label = "Water";
$wine_label = "Wine";
$juice_label = "Juice";
$cola_label = "Cola";

imagestring ($im , 3 , 10 , $size_y - 15, $water_label , $cola_color);
imagestring ($im , 3 , 60 , $size_y - 15, $wine_label , $cola_color);
imagestring ($im , 3 , 100 , $size_y - 15, $juice_label , $cola_color);
imagestring ($im , 3 , 160 , $size_y - 15, $cola_label , $cola_color);

imagestring ($im , 3 , 30 , 0, $water_cnt , $cola_color);
imagestring ($im , 3 , 80 , 0, $wine_cnt , $cola_color);
imagestring ($im , 3 , 120 , 0, $juice_cnt , $cola_color);
imagestring ($im , 3 , 180 , 0, $cola_cnt , $cola_color);

imagefilledrectangle ($im, 10, $size_y - 20, 50, ($size_y - 20) - ($water_cnt * $pixels_per_unit), $water_color);
imagefilledrectangle ($im, 60, $size_y - 20, 100, ($size_y - 20) - ($wine_cnt * $pixels_per_unit), $wine_color);
imagefilledrectangle ($im, 110, $size_y - 20, 150, ($size_y - 20) - ($juice_cnt * $pixels_per_unit), $juice_color);
imagefilledrectangle ($im, 160, $size_y - 20, 200, ($size_y - 20) - ($cola_cnt * $pixels_per_unit), $cola_color);

imagepng ($im);


header ("Content-type: image/png");
?>