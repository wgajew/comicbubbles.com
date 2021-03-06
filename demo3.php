<!doctype html>
<html lang="en">
<head>
<meta http-equiv="Cache-control" content="no-cache">
<?php
	include 'header.php';
?>
<script>
var flickr_comicbubbles;
function cb(){	
	im = document.getElementById("pict8");
	im_loader = document.getElementById("img-loader");
	sh_highlightDocument();
  bedouin();
}

var Camel, im, im_loader;

function bedouin(){
  DestroyComicBubbles(Camel);
  
  Camel = new ComicBubbles("pict6", {canvas: {width: 'auto', height: 'auto', fontSize: '17px', textAlign: 'center', lineHeight: 1.5, readonly: false, responsive: true}});
  
  var saving;
  
  Camel.onCanvasLoad(function(){
    this.addBubble({id: 'bedouin1', text: "I wish you\ncould speak", x: 127, y: 210, background: '#b22222', color: '#ffffff', opacity: 0.9, bubbleStyle: 'speak', tailLocation: 'nw', tailX: 105, tailY: 145, visible: false});
    this.addBubble({id: 'camel1', text: "I wish you\nhad humps\non your back", x: 221, y: 25, background: '#ffa500', color: '#ffffff', opacity: 0.7, bubbleStyle: 'think', tailLocation: 's', tailX: 295, tailY: 176, visible: false});
    var b = this.getBubbleById('bedouin1'),
      c = this.getBubbleById('camel1');
    b.delay(2000).show(function(){
      c.delay(2000).show();
      Camel.onBubbleStateChange(function(data){
        clearTimeout(saving);
        saving = setTimeout(function(){
          im_loader.style.display = "block";
          save(Camel,function(){
            im.onload = function(){
              im_loader.style.display = "none";
            }
            im.src = "cb_images/bedouin.jpg?t=" + new Date().getTime();
          });
        },500);
      });
    });
  });
}

function save(comicbubbles_object,updateImage){
  var b_data = comicbubbles_object.getBubblesData();
  b_data['jpg_quality'] = 95;
  b_data['png_quality'] = 8;
  var json = JSON.stringify(b_data);
  var request = new XMLHttpRequest();
  request.onreadystatechange = function(){
    if (request.readyState == 4 && request.status == 200) {
      if (typeof updateImage === "function") {
        setTimeout(function(){ updateImage(); },500);
      }
      else {
        location.href = request.responseText;
      }
    }
  };
  if (typeof updateImage === "function") {
    request.open("POST", "comicbubbles_save.php", true);
  }
  else {
    request.open("POST", "comicbubbles_download.php", true);
  }
  request.setRequestHeader("Content-type", "application/json; charset=UTF-8");
  request.send(json);
}

function outputOnOff(b){
  var c = document.getElementById("fifth-demo-output");
  if (c.style.display == "block") {
    c.style.display = "none";
    b.innerHTML = "SHOW";
  }
  else {
    c.style.display = "block";
    b.innerHTML = "HIDE";
  }
}

</script>
</head>
<body onload="cb()">
<?php
	$page = "demo3";
	include 'menu.php';
?>
<div id="fifth-demo" class="demo">
  <h2>Saving images with bubbles <span>(autosave example)</span></h2>
  <div class="right">
    <div class="img">
			<p>Image with ComicBubbles object <span id="fifth-demo-output-btn" onclick="outputOnOff(this)">(SHOW)</span></p>
      <img id="pict6" src="bedouin.jpg">
    </div>
    <div class="img" id="saved-image">
			<p>Image with hardcoded speech balloons</p>
      <img id="pict8" src="bedouin.jpg">
    </div>
    <div id="img-loader">
      <div class="load-container"><div class="loader"></div></div>
    </div>
  </div>
	<div id="fifth-demo-output" class="demo-output">
		<div id="pict6-comic-bubbles-output"></div>
	</div>
  <div class="left">
<pre class="sh_javascript_dom">
var Camel, im, im_loader;
function <button id="btn6" onclick="bedouin()">bedouin()</button>{

DestroyComicBubbles(Camel);

Camel = new ComicBubbles("pict6", {canvas: {width: 'auto', height: 'auto', fontSize: '17px', textAlign: 'center', lineHeight: 1.5, readonly: false, responsive: true}});

var saving;

Camel.onCanvasLoad(function(){
  
  this.addBubble({id: 'bedouin1', text: "I wish you\ncould speak", x: 127, y: 210, background: '#b22222', color: '#ffffff', opacity: 0.9, bubbleStyle: 'speak', tailLocation: 'nw', tailX: 105, tailY: 145, visible: false});
  this.addBubble({id: 'camel1', text: "I wish you\nhad humps\non your back", x: 221, y: 25, background: '#ffa500', color: '#ffffff', opacity: 0.7, bubbleStyle: 'think', tailLocation: 's', tailX: 295, tailY: 176, visible: false});
  
  var b = this.getBubbleById('bedouin1'), c = this.getBubbleById('camel1');
  
  b.delay(2000).show(function(){
    c.delay(2000).show();
    Camel.onBubbleStateChange(function(data){
      clearTimeout(saving);
      saving = setTimeout(function(){
        im_loader.style.display = "block";
        save(Camel,function(){
          im.onload = function(){
            im_loader.style.display = "none";
          }
          im.src = "cb_images/bedouin.jpg?t=" + new Date().getTime();
        });
      },500);
    });
  });
  
});
  
}

function save(comicbubbles_object, updateImage){
	
var b_data = comicbubbles_object.getBubblesData();
b_data['jpg_quality'] = 95;
var json = JSON.stringify(b_data);
var request = new XMLHttpRequest();
request.onreadystatechange = function(){
	if (request.readyState == 4 && request.status == 200) {
		if (typeof updateImage === "function") {
			setTimeout(function(){ updateImage(); },500);
		}
	}
};
request.open("POST", "comicbubbles_save.php", true);
request.setRequestHeader("Content-type", "application/json; charset=UTF-8");
request.send(json);

}

</pre>
<pre class="sh_php">

//comicbubbles_save.php
&lt;?php
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
?&gt;
</pre>
  </div>
  <div class="clear"></div>
</div>
<?php include 'footer.php'; ?>
</body>
</html>
