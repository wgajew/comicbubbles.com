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
	$path = 'empty';
	if (!getimagesize($img)) $img = $images[array_rand($images,1)];
	if (getimagesize($img)) {
		$imageString = file_get_contents($img);
		$path = 'my_images/'.basename($img);
		$save = file_put_contents($path, $imageString);
		list($width, $height) = getimagesize($img);
		$max_width = $_POST['image-max-width'];
		$resizing = false;
		if ($width > $max_width) {
			$width = $max_width;
			$resizing = true;
		}
		if ($height > $max_width) {
			$height = $max_width;
			$resizing = true;
		}
		if ($resizing) {
			$resize = new ResizeImage($path);
			$resize->resizeTo($width, $height, 'maxWidth');
			$resize->saveImage($path, 90);
		}
	}
	echo $path;
}
else if (isset($_POST['url-query'])) {
	require("ResizeImage.php");
	$path = 'empty';
	$img = $_POST['url-query'];
	if (getimagesize($img)) {
		$imageString = file_get_contents($img);
		$path = 'my_images/'.basename($img);
		$save = file_put_contents($path, $imageString);
		list($width, $height) = getimagesize($img);
		$max_width = $_POST['image-max-width'];
		$resizing = false;
		if ($width > $max_width) {
			$width = $max_width;
			$resizing = true;
		}
		if ($height > $max_width) {
			$height = $max_width;
			$resizing = true;
		}
		if ($resizing) {
			$resize = new ResizeImage($path);
			$resize->resizeTo($width, $height, 'maxWidth');
			$resize->saveImage($path, 90);
		}
	}
	echo $path;
}
else if (isset($_POST["upload"])) {
	require("ResizeImage.php");
	$path = 'my_images/'.basename($_FILES["image_file"]["name"]);
	$allow = array("jpg", "jpeg", "gif", "png");
	$info = explode('.', strtolower( $_FILES['image_file']['name']) );
	if (in_array(end($info), $allow)) {
		if (move_uploaded_file($_FILES['image_file']['tmp_name'], $path) && getimagesize($path)) {
			list($width, $height) = getimagesize($path);
			$max_width = $_POST['image-max-width'];
			$resizing = false;
			if ($width > $max_width) {
				$width = $max_width;
				$resizing = true;
			}
			if ($height > $max_width) {
				$height = $max_width;
				$resizing = true;
			}
			if ($resizing) {
				$resize = new ResizeImage($path);
				$resize->resizeTo($width, $height, 'maxWidth');
				$resize->saveImage($path, 90);
			}
		}
		else {
			$path = 'empty';
		}
	}
	else {
		$path = 'empty';
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
var container, my_comicbubbles, submit_on_error = true, image_max_width = 800;
function cb(){
	<?php include 'cb_is.php'; ?>

	document.getElementById("search-form").onsubmit = function(e) {
		e.preventDefault();
		submit_on_error = true;
		document.getElementById("search-error").value = "";
		if (resetContainer("search-query")) submitForm("search-form");
	}
	document.getElementById("url-form").onsubmit = function(e) {
		e.preventDefault();
		if (resetContainer("url-query")) submitForm("url-form");
	}
	document.getElementById("image-file").addEventListener("change", function(e) {
		if (resetContainer("image-file")) submitForm("file-form");
	}, false);
	document.getElementById("select-source").addEventListener("change", function(e) {
		var selected_item = this.value;
		var forms = document.getElementsByClassName("form");
		for (var i = 0; i < forms.length; i++) {
			forms[i].className = "form";
		}
		document.getElementById(selected_item).className = "form show";
	}, false);

	var pixabay = "https://cdn.pixabay.com/photo/2013/08/26/04/44/lions-175934_960_720.jpg";
	document.getElementById("url-query").onclick = function(e) {
		if (this.value == pixabay) this.value = "";
	}
	document.getElementById("search-query").onclick = function(e) {
		if (this.value == "dog") this.value = "";
	}
	container = document.getElementById("result-container");
	showWidth();
	image_max_width = container.offsetWidth;
	document.getElementById("url-query").value = pixabay;
	sh_highlightDocument();
	document.getElementById("select-source").options[0].selected = true;
}

function submitForm(form_id) {
	var sForm = document.getElementById(form_id);
	var xhr = new XMLHttpRequest();
	xhr.onload = function() {
		var img = document.createElement("img");
		img.id = "pict7";
		img.style.display = "none";
		img.onload = function() {
			if (img.width < 100 || img.height < 100) {
				container.innerHTML = "<p class='error'>Image too small</p>";
			}
			else {
				container.innerHTML = "";
				container.className = "";
				container.appendChild(img);
				container.style.width = img.width + "px";
				img.style.display = "inline";
				my_comicbubbles = new ComicBubbles("pict7", {canvas: {readonly: false, fontSize: '20px', opacity: 0.85}});
				if (my_comicbubbles) {
					var span = document.getElementById("double-click-span");
					span.className = "black";
					setTimeout(function(){ span.removeAttribute("class"); }, 5000);
				}
			}
		}
		img.onerror = function() {
			if (submit_on_error && form_id == "search-form") {
				console.log('1st submit error');
				sForm.value = xhr.responseText;
				setTimeout(function(){ if (document.getElementsByClassName("error").length == 0) submitForm(form_id); }, 1000);
				submit_on_error = false;
			}
			else {
				console.log('error');
				container.innerHTML = "<p class='error'>Image not available</p>";
			}
		}
		img.src = xhr.responseText;
	}
	xhr.open (sForm.method, sForm.action, true);
	var formData = new FormData(sForm);
	if (form_id == "file-form") {
		formData = new FormData();
		var files = document.getElementById("image-file").files;
		formData.append("image_file", files[0]);
		formData.append("upload", 1);
	}
	formData.append("image-max-width", image_max_width);
	xhr.send(formData);
}

function showWidth(){
	var c = document.getElementById("result-container");
	if (c.innerHTML == "") c.innerHTML = "<span id='result-container-info'>width: " + c.offsetWidth + " px</span>";	
}

window.addEventListener('resize', function(event){
	var rci = document.getElementById("result-container-info");
	if (rci) {
		rci.innerHTML = "width: " + document.getElementById("result-container").offsetWidth + " px";
	}
});

function resetContainer(query_field) {
	container = document.getElementById("result-container");
	showWidth();
	container.className = "empty";
	if (document.getElementById(query_field).value.length < 2) {
		return false;
	}
	else {
		container.innerHTML = "<div class='load-container'><div class='loader'></div></div>";
		return true;
	}
}

function save(comicbubbles_object,updateImage){
  var b_data = comicbubbles_object.getBubblesData();
  b_data['jpg_quality'] = 95;
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
	<h2>Load your photo and <span id="double-click-span">double click</span> to add speech balloons!</h2>
	<div class="left">
		<span class="source">Source of Image:&nbsp;</span>
		<select id="select-source" class="source">
			<option value="file-form">Local Computer</option>
			<option value="url-form">URL</option>
			<option value="search-form">Flickr</option>
		</select>
		<form id="search-form" class="form" action="my-bubbles.php" method="post">
			<input type="text" id="search-query" name="search-query" autocomplete="off" value="dog">
			<input type="hidden" id="search-error" name="search-error" value="">
			<input type="submit" id="query-submit" value="Flickr Search">
		</form>
		<form id="url-form" class="form" action="my-bubbles.php" method="post">
			<input type="text" id="url-query" name="url-query" autocomplete="off" value="">
			<input type="submit" id="url-submit" value="Load from URL">
		</form>
		<form id="file-form" class="form show" action="my-bubbles.php" method="post" enctype="multipart/form-data">
			<input type="file" id="image-file" name="image-file" autocomplete="off" value="">
		</form>
	</div>
	<div id="result-container" class="empty"></div>
	<div class="down"><button type="button" id="download1" onclick="save(my_comicbubbles)">download image</button></div>
</div>
<?php include 'footer.php'; ?>
</body>
</html>
<?php } ?>
