<nav id="main-menu">
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
		<h3>download</h3>
		<a href="comicbubbles_demo.zip" title="ComicBubbles demo" class="down">comicbubbles.zip</a>
	</div>
</nav>
