<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  
$json = file_get_contents("php://input");
$bubbles = json_decode($json, true);
$png_img = $bubbles['png'];
$jpg_quality = $bubbles['jpg_quality'];
$image_name = $bubbles['img_src'];
$new_image = "cb_images/".basename($image_name);
if (copy($image_name, $new_image)) {
  $new_png_image = $new_image.".png";
  $png = str_replace("data:image/png;base64,", "", $png_img);
  $png = str_replace(" ","+",$png);
  $png_data = base64_decode($png);
  $writing = file_put_contents($new_png_image, $png_data);
  if ($writing) {
    $size = getimagesize($new_image);
    $width = $size[0];
    $height = $size[1];
    $png_bubbles = imagecreatefrompng($new_png_image);   
    $jpeg_image = imagecreatefromjpeg($new_image);  
    imagecopy($jpeg_image, $png_bubbles, 0, 0, 0, 0, $width, $height);
    imagejpeg($jpeg_image, $new_image, $jpg_quality);
    imagedestroy($jpeg_image);
    imagedestroy($png_bubbles);
    @unlink($new_png_image);
  }
}
 
}

?>