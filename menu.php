<nav id="main-menu" class="wg<?php include 'count'; ?>">
	<div id="main-cb"></div>
	<a href="./" <?php if($page == "index") echo 'class="sel"'; ?>>home</a>
	<a href="demo" <?php if($page == "demo") echo 'class="sel"'; ?>>demo 1</a>
	<a href="demo2" <?php if($page == "demo2") echo 'class="sel"'; ?>>demo 2</a>
	<a href="demo3" <?php if($page == "demo3") echo 'class="sel"'; ?>>demo 3</a>
	<a href="tutorial" <?php if($page == "tutorial") echo 'class="sel"'; ?>>tutorial</a>
	<a href="api" <?php if($page == "api") echo 'class="sel"'; ?>>api</a>
	<a href="my-bubbles" class="myb<?php if($page == "my-bubbles") echo ' sel'; ?>">my bubbles</a>
	<a href="contact" <?php if($page == "contact") echo 'class="sel"'; ?>>contact</a>
	<div id="download-cb">
		<a href="https://codecanyon.net/item/comicbubbles-speech-balloon-javascript-library/19598432" title="uncompressed js files + support" class="buy">buy on Envato</a>
		<h3>download</h3>
		<a href="download.php" title="compressed js files + demo page" class="down">comicbubbles.zip</a>
	</div>
</nav>
