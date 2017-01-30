<?php

if (empty($_GET['file'])) {	
	$json = file_get_contents("php://input");
	$bubbles = json_decode($json, true);
	$png_img = $bubbles['png'];
	$jpg_quality = $bubbles['jpg_quality'];
	$png_quality = $bubbles['png_quality'];
	$image_name = $bubbles['img_src'];
	if (!empty($image_name)) {
		$new_image = "img/".basename($image_name);
		if (copy($image_name, $new_image)) {
			$ext = strtolower(pathinfo($new_image, PATHINFO_EXTENSION));
			if ($ext == "jpeg" || $ext == "jpg" || $ext == "gif" || $ext == "png") {
				$new_png_image = $new_image.".png";
				$png = str_replace("data:image/png;base64,", "", $png_img);
				$png = str_replace(" ","+",$png);
				$png_data = base64_decode($png);
				$writing_successful = file_put_contents($new_png_image, $png_data);
				if ($writing_successful) {
					$size = getimagesize($new_image);
					$width = $size[0];
					$height = $size[1];
					if ($ext=="jpeg" || $ext=="jpg") {
						$png_bubbles = imagecreatefrompng($new_png_image);   
						$background_image = imagecreatefromjpeg($new_image);  
						imagecopy($background_image, $png_bubbles, 0, 0, 0, 0, $width, $height);
						if (imagejpeg($background_image, $new_image, $jpg_quality)) {
							echo $_SERVER['PHP_SELF']."?file=".urlencode(basename($image_name));
						}
						imagedestroy($background_image);
						imagedestroy($png_bubbles);
					}
					else if ($ext == "gif") {
						$animation = $new_image;
						$watermark = $new_png_image;
						$cmd = "$animation -coalesce -gravity Center -geometry +0+0 null: $watermark -layers composite -layers optimize ";
						$output = array();
						$return = 0;
						exec("convert ".$cmd.$new_image, $output, $return);
						if ($return == 0) {
							echo $_SERVER['PHP_SELF']."?file=".urlencode(basename($image_name));
						}
					}
					else if ($ext == "png") {
						$png_bubbles = imagecreatefrompng($new_png_image);
						$background_image = imagecreatefrompng($new_image);  
						imagecopy($background_image, $png_bubbles, 0, 0, 0, 0, $width, $height);
						if (imagepng($background_image, $new_image, $png_quality)) {
							echo $_SERVER['PHP_SELF']."?file=".urlencode(basename($image_name));
						}
						imagedestroy($background_image);
						imagedestroy($png_bubbles);						
					}
					@unlink($new_png_image);
				}
			}
		}
	}
}
else {
	$image_name = urldecode($_GET['file']);	
	header("Content-Type: application/octet-stream");
	header("Content-Disposition: attachment; filename=\"".$image_name."\"");
	readfile("img/".$image_name);	
}

?>