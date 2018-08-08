<?php
function is_localhost(){
	$whitelist = array('127.0.0.1', '::1');
	if (in_array($_SERVER['REMOTE_ADDR'], $whitelist)) return true;
}
?>
<title>ComicBubbles - speech balloon JavaScript library</title>
<meta charset="utf-8">
<meta name="description" content="ComicBubbles is a JavaScript HTML5 canvas library which simplifies the process of adding speech bubbles to photos. ComicBubbles bubbles can be saved as JavaScript objects or merged with the original image.">
<meta name="keywords" content="add text to photo, add text to image, caption photo, add caption to image, adding captions to pictures, speech balloon, thought bubble, JavaScript library, html5, dialogue balloons, image, word bubbles, drawing, comic books, comics, adding speech balloons">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link href="sh_peachpuff.css" rel="stylesheet">
<link href="comicbubbles.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
<script src="sh_main.min.js"></script>
<script src="sh_javascript.min.js"></script>
<script src="sh_javascript_dom.min.js"></script>
<script src="sh_php.min.js"></script>
<?php
if (is_localhost()) {
?>
<script src="comicbubbles.js"></script>
<script src="comicbubbles_editor.js"></script>
<?php
}
else {
?>
<script src="comicbubbles.min.js"></script>
<script src="comicbubbles_editor.min.js"></script>
<?php
}
?>
