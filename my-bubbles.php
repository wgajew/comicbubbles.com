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
<html lang="en">
<head>
<meta http-equiv="Cache-control" content="no-cache">
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

  sh_highlightDocument();
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

</script>
</head>
<body onload="cb()">
<?php
	$page = "my-bubble";
	include 'menu.php';
?>
<div id="sixth-demo" class="demo">
  <h2>Downloading images with bubbles</h2>
  <div class="right">
    <div id="result-container" class="bg"></div>
  </div>
  <div class="left">
    <form id="search-form" action="my-bubbles.php" method="post">
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
