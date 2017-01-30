<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Demo2</title>
<?php
	include 'header.php';
?>
	<script>
	
	function cb(){
		new ComicBubbles("main-cb", {bubble: 
			{id: 'b1464800593928', text: "ComicBubbles is\na word bubble\nJavaScript library", x: 40, y: 13, width: 108, height: 44, fontFamily: 'Verdana, Geneva, sans-serif', fontSize: '12px', textAlign: 'center', background: '#ffffff', color: '#000000', opacity: 0.7, bubbleStyle: 'speak', tailLocation: 'nw', tailX: 0, tailY: 0}
		});
	}

	</script>
</head>
<body onload="cb()">
<?php
	$page = "download";
	include 'menu.php';
?>
	<p>under construction</p>
	<div class="cb-spacer"></div>
</body>
</html>