<?php
  function is_localhost(){
    $whitelist = array('127.0.0.1', '::1');
    if (in_array($_SERVER['REMOTE_ADDR'], $whitelist)) return true;
  }
?>
<title>ComicBubbles - speech bubble JavaScript library</title>
<meta charset="utf-8">
<meta name="description" content="">
<meta name="keywords" content="">
<link href="sh_peachpuff.css" rel="stylesheet">
<link href="comicbubbles.css" rel="stylesheet">
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
