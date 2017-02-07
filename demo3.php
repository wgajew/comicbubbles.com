<?php

if (isset($_POST['search-query'])) {
	require("ResizeImage.php");
	$feed = file_get_contents("http://api.flickr.com/services/feeds/photos_public.gne?tags=".$_POST['search-query']);
	$xml = simplexml_load_string ($feed);
	$json = json_encode($xml);
	$array = json_decode($json,TRUE);
	$images = array();
	foreach ($array['entry'] as $item) {
		$images[] = $item['link'][1]['@attributes']['href'];
	}
	$key = array_rand($images,1);
	$img = $images[$key];
	if (!getimagesize($img)) $img = $images[array_rand($images,1)];
	if (getimagesize($img)) {
		$imageString = file_get_contents($img);
		$path = 'flickr/'.basename($img);
		$save = file_put_contents($path, $imageString);
		$resize = new ResizeImage($path);
		$resize->resizeTo(800, 800, 'maxWidth');
		$resize->saveImage($path, 90);
	}
	echo $path;
}
else {
?>

<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="Cache-control" content="no-cache">
	<title>ComicBubbles - speech bubble JavaScript library</title>
<?php
	include 'header.php';
?>
<script>
var flickr_comicbubbles;
function cb(){
  new ComicBubbles("main-cb", {bubble:
    {id: 'b1464800593928', text: "ComicBubbles is\na speech bubble\nJavaScript library", x: 40, y: 13, width: 108, height: 44, fontFamily: 'Verdana, Geneva, sans-serif', fontSize: '12px', textAlign: 'center', background: '#ffffff', color: '#000000', opacity: 0.7, bubbleStyle: 'speak', tailLocation: 'nw', tailX: 0, tailY: 0}
  });

  var submit_on_error = true, container = document.getElementById("result-container");
  function submitForm() {
    var sForm = document.getElementById("search-form");
    var xhr = new XMLHttpRequest();
    xhr.onload = function() {
      var img = document.createElement("img");
      img.id = "pict7";
      img.style.display = "none";
      img.onload = function() {
        container.innerHTML = "";
        container.className = "";
        container.appendChild(img);
        img.style.display = "inline";
        flickr_comicbubbles = new ComicBubbles("pict7", {canvas: {readonly: false}});
      }
      img.onerror = function() {
        if (submit_on_error) {
          console.log('1st submit error');
          document.getElementById("search-error").value = xhr.responseText;
          setTimeout(function(){ if (document.getElementsByClassName("error").length == 0) submitForm(); }, 1000);
          submit_on_error = false;
        }
        else {
          console.log('error');
          container.innerHTML = "<p class='error'>Error. Try again</p>";
        }
      }
      img.src = xhr.responseText;
    }
    xhr.open (sForm.method, sForm.action, true);
    xhr.send (new FormData(sForm));
  }
  document.getElementById("search-form").onsubmit = function(e) {
    e.preventDefault();
    submit_on_error = true;
    document.getElementById("search-error").value = "";
    if (document.getElementById("search-query").value.length < 2) return;
    container.className = "bg";
    container.innerHTML = "<div class='load-container'><div class='loader'></div></div>";
    var submit_timeout;
    setTimeout(function(){
      //if (document.getElementsByClassName("load-container").length > 0) container.innerHTML = "<p class='error'>Error. Try again</p>";
    }, 15000);
    submitForm();
  }

  im = document.getElementById("pict8");
  im_loader = document.getElementById("img-loader");
  sh_highlightDocument();
}

var im, im_loader;

function bedouin(){
  var bedouin_cb, saving;
  bedouin_cb = new ComicBubbles("pict6", {canvas: {width: 'auto', height: 'auto', fontSize: '17px', fontWeight: 'bold', textAlign: 'center', readonly: false}});
  bedouin_cb.addBubble({id: 'bedouin1', text: "I wish you\ncould speak", x: 127, y: 210, background: '#8b4513', color: '#ffffff', opacity: 0.9, bubbleStyle: 'speak', tailLocation: 'nw', tailX: 105, tailY: 145, visible: false});
  bedouin_cb.addBubble({id: 'camel1', text: "I wish you\nhad humps\non your back", x: 221, y: 25, background: '#ffa500', color: '#ffffff', opacity: 0.7, bubbleStyle: 'think', tailLocation: 's', tailX: 295, tailY: 176, visible: false});
  var b = bedouin_cb.getBubbleById('bedouin1'),
    c = bedouin_cb.getBubbleById('camel1');
  b.delay(2000).show(function(){
    c.delay(2000).show();
    bedouin_cb.onBubbleStateChange(function(data){
      clearTimeout(saving);
      saving = setTimeout(function(){
        im_loader.style.display = "block";
        save(bedouin_cb,function(){
          im.onload = function(){
            im_loader.style.display = "none";
          }
          im.src = "cb_images/bedouin.jpg?t=" + new Date().getTime();
        });
      },500);
    });
  });
}

function save(comicbubbles_object,updateImage){
  var b_data = comicbubbles_object.getBubblesData();
  b_data['jpg_quality'] = 85;
  b_data['png_quality'] = 8;
  var json = JSON.stringify(b_data)
  request = new XMLHttpRequest();
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
    b.innerHTML = "SHOW OUTPUT";
  }
  else {
    c.style.display = "block";
    b.innerHTML = "HIDE OUTPUT";
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
  <h2>Saving images with bubbles</h2>
  <div id="fifth-demo-output" class="demo-output">
    <div id="pict6-comic-bubbles-output"></div>
  </div>
  <div class="right">
    <div id="fifth-demo-output-btn" onclick="outputOnOff(this)">SHOW OUTPUT</div>
    <div class="img">
      <img id="pict6" src="bedouin.jpg" width="399" height="356" onload="bedouin()">
    </div>
    <div class="img" id="saved-image">
      <img id="pict8" width="399" height="356" src="bedouin.jpg">
    </div>
    <div class="img" id="img-loader">
      <div class="load-container"><div class="loader"></div></div>
    </div>
  </div>
  <div class="left">
<pre class="sh_javascript_dom">
function <button id="btn6" onclick="bedouin()">bedouin()</button>{

var saving, bedouin_cb = new ComicBubbles("pict6", {canvas: {width: 'auto', height: 'auto', fontSize: '17px', fontWeight: 'bold', textAlign: 'center', readonly: false}});

bedouin_cb.addBubble({id: 'bedouin1', text: "I wish you\ncould speak", x: 127, y: 210, background: '#8b4513', color: '#ffffff', opacity: 0.9, bubbleStyle: 'speak', tailLocation: 'nw', tailX: 105, tailY: 145, visible: false});
bedouin_cb.addBubble({id: 'camel1', text: "I wish you\nhad humps\non your back", x: 221, y: 25, background: '#ffa500', color: '#ffffff', opacity: 0.7, bubbleStyle: 'think', tailLocation: 's', tailX: 295, tailY: 176, visible: false});

var b = bedouin_cb.getBubbleById('bedouin1'),
  c = bedouin_cb.getBubbleById('camel1');

b.delay(2000).show(function(){
  c.delay(2000).show();
  bedouin_cb.onBubbleStateChange(function(data){
    clearTimeout(saving);
    saving = setTimeout(function(){
      im_loader.style.display = "block";
      save(bedouin_cb, function(){
        im.onload = function(){
          im_loader.style.display = "none";
        }
        im.src = "cb_images/bedouin.jpg?t=" + new Date().getTime();
      });
    },500);
  });
});

}

function save(comicbubbles_object, updateImage){
  var b_data = comicbubbles_object.getBubblesData();
  b_data['jpg_quality'] = 85;
  var json = JSON.stringify(b_data)
  request = new XMLHttpRequest();
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
<div class="demo-spacer">&nbsp;</div>
<div id="sixth-demo" class="demo">
  <h2>Downloading images with bubbles</h2>
  <div class="right">
    <div id="result-container" class="bg"></div>
  </div>
  <div class="left">
    <form id="search-form" action="demo3.php" method="post">
      <input type="text" id="search-query" name="search-query" autocomplete="off">
      <input type="hidden" id="search-error" name="search-error" value="">
      <input type="submit" id="query-submit" value="Flickr Search">
    </form>
    <br>
    <button type="button" id="download1" onclick="save(flickr_comicbubbles)">download image</button>
  </div>
  <div class="clear"></div>
</div>
<div class="cb-spacer"></div>
<?php include 'footer.php'; ?>
</body>
</html>
<?php } ?>
