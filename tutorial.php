<!doctype html>
<html lang="en">
<head>
<?php
	include 'header.php';
?>
<script>
function cb(){
	<?php include 'cb_is.php'; ?>
}
function teddy(){
  var my_bubbles = new ComicBubbles("my_image_id", {canvas: {readonly: false}});
}
</script>
</head>
<body class="tutorial" onload="cb()">
<?php
	$page = "tutorial";
	include 'menu.php';
?>
<div class="main">

<h2>I. Adding ComicBubbles to a web page</h2>
<ol>
<li>Unzip comicbubbles.zip.</li>
<li>Copy comicbubbles.min.js and comicbubbles_editor.min.js into your web directory.</li>
<li>Include comicbubbles.min.js and comicbubbles_editor.min.js in your HTML page.<br>
<pre>
&lt;head&gt;
	&lt;script src="comicbubbles.min.js"&gt;&lt;/script&gt;
	&lt;script src="comicbubbles_editor.min.js"&gt;&lt;/script&gt;
&lt;/head&gt;
</pre>
<p><b>Note:</b> An alternative method is to put the library files at the very end of the body tag (before &lt;/body&gt;)</p>
</li>
</ol>

<h2>II. Creating ComicBubbles bubbles</h2>
<ol>
<li>Prepare an output box for data produced by ComicBubbles.
<p>As the output box you can use a &lt;div&gt; element.<br>
For your convenience place the element next to the image you want to add bubbles to.<br>Make sure that the id of the output box begins with the id of the image and ends with the suffix '-comic-bubbles-output'.</p>
<pre>
&lt;img id="my_image_id" src="my_image.jpg"&gt;
&lt;div id="my_image_id-comic-bubbles-output"&gt;&lt;/div&gt;
</pre>
</li>
<li>Call ComicBubbles with the id of the image you want to add bubbles to.<br>
<pre>
&lt;script&gt;
	var myBubbles = new ComicBubbles('my_image_id', {canvas: { readonly: false }});
&lt;/script&gt;
</pre>
<p><b>Note:</b> If you want to add and edit bubbles with a mouse you have to set the readonly property to false (by default it is set to true). You can preset several other properties too. Use the <a href="./api#canvas-properties">table</a> for your reference. If you, for example, need 25px Verdana as a default font for newly created bubbles, you should create a new ComicBubbles object in the following way:</p>
<pre>
var myBubbles = new ComicBubbles('my_image_id', {canvas: { readonly: false, fontFamily: 'Verdana', fontSize: 25 }});
</pre>
</li>
<li>Watch the video.<br>
<video width="720" height="336" controls>
	<source src="boy_and_teddy.mp4" type="video/mp4">
	<source src="boy_and_teddy.ogg" type="video/ogg">
	<source src="boy_and_teddy.webm" type="video/webm">
	Your browser does not support the video tag
</video>
</li>
<li>Use the following mouse actions to add and modify your ComicBubbles bubbles.
<h4>&bull; double click on the image to add a new bubble (simple text field)</h4>
<img src="t1.jpg" width="684" height="244">
<h4>&bull; double click on one of 8 square dots of the red outline to turn the bubble without any style into a 'proper' speech balloon</h4>
<img src="t2.jpg" width="684" height="244">
<h4>&bull; keep double clicking on the tail of the bubble to change the style (speak&rarr; think&rarr; scream&rarr; arrow&rarr; speak)</h4>
<img src="t3.jpg" width="684" height="244">
<h4>&bull; double click on the bubble tail ending to remove the style</h4>
<img src="t4.jpg" width="684" height="244">
<h4>&bull; click on the image outside the bubble to remove the red selection frame</h4>
<img src="t5.jpg" width="684" height="244">
<h4>&bull; click on the bubble to add the selection frame</h4>
<img src="t6.jpg" width="684" height="244">
<h4>&bull; click on the bubble inside the selection frame and type some text</h4>
<p style="color: red;"><b>Note:</b> The text field of a bubble is not well suited for interpreting HTML tags. Copying website content and pasting it in with HTML formatting should be avoided (can cause unexpected effects).</p>
<img src="t7.jpg" width="684" height="244">
<h4>&bull; drag and drop to move/resize the bubble and to move the tail ending</h4>
<img src="t8.jpg" width="684" height="244">
<h4>&bull; click the 's' button to display the settings box and format the bubble</h4>
<img src="t9.jpg" width="684" height="270">
<h4>&bull; If you want to remove a bubble, select it and press 'Delete'.</h4>
</li>
<li>Save your ComicBubbles bubbles.
<p>After customizing your ComicBubbles bubbles you should copy the bubbles data from the output box and save it to a database or to a file. You can either save a single bubble definition, e.g.</p>
<pre>
{id: 'b1492710096339', text: "Nobody wants\nto play with me", x: 161, y: 22, width: 115, height: 55, fontSize: '17px', background: '#dc143c', opacity: 1, bubbleStyle: 'speak', tailLocation: 'sw', tailX: 120, tailY: 173}
</pre>
<p>or the whole 'new ComicBubbles' syntax.<br>
If you need more control over bubble data, use API functions (getText(), getX(), getY(), etc.) and save the properties separately.</p>
</li>
</ol>

<h2>III. Displaying ComicBubbles bubbles</h2>
<ol>
<li>Add comicbubbles.min.js to your HTML page.<br>
<pre>
&lt;head&gt;
	&lt;script src="comicbubbles.min.js"&gt;&lt;/script&gt;
&lt;/head&gt;
</pre>
</li>
<li>Call ComicBubbles with the id of your image and with your bubble definition.<br>
<pre>
&lt;script&gt;

var myBubbles = new ComicBubbles('my_image_id', {bubble:
{id: 'b1492710096339', text: "Nobody wants\nto play with me", x: 161, y: 22, width: 115, height: 55, fontSize: '17px', background: '#dc143c', opacity: 1, bubbleStyle: 'speak', tailLocation: 'sw', tailX: 120, tailY: 173}
});

&lt;/script&gt;
</pre>
<p><b>Note:</b> You can omit the canvas readonly property unless you want to let others create their own bubbles over your image. A bubble definition can include all properties from the <a href="./api#bubble-properties">table</a>.</p>
</li>
</ol>
</div>
<?php include 'footer.php'; ?>
</body>
</html>
