<!doctype html>
<html lang="en">
<head>
<?php
	include 'header.php';
?>
<script>
function cb(){
  new ComicBubbles("main-cb", {bubble:
    {id: 'b1464800593928', text: "ComicBubbles is\na speech bubble\nJavaScript library", x: 40, y: 13, width: 108, height: 44, fontFamily: 'Verdana, Geneva, sans-serif', fontSize: '12px', textAlign: 'center', background: '#ffffff', color: '#000000', opacity: 0.7, bubbleStyle: 'speak', tailLocation: 'nw', tailX: 0, tailY: 0}
  });
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
  <h2>1. Adding the library to an HTML page</h2>
  <p>
  ComicBubbles is a JavaScript HTML5 canvas library which simplifies the process of adding speech bubbles to photos. The library consists of two files. The main file - comicbubbles.js - is used to display speech bubbles defined as JavaScript objects. Thanks to the other one - comicbubbles_editor.js - you can create and modify bubbles with mouse actions. Both files should be placed inside the &lt;head&gt; section of an HTML page with a &lt;script&gt; tag.
  </p>
<pre>
&lt;head&gt;
  &lt;script src="comicbubbles.min.js"&gt;&lt;/script&gt;
  &lt;script src="comicbubbles_editor.min.js"&gt;&lt;/script&gt;
&lt;/head&gt;
</pre>

  <h2>2. Calling ComicBubbles with the id of an image</h2>
<pre>
&lt;script&gt;
  new ComicBubbles("my_image_id", {canvas: { readonly: false }});
&lt;/script&gt;
</pre>

  <h2>3. Preparing the ComicBubbles output box</h2>
  <p>
  While adding and modifying ComicBubbles bubbles lots of parameters change. A current state of the settings can be displayed inside a &lt;div&gt; (or any other HTML block element). The element (output box) can be placed anywhere in the &lt;body&gt; section. In order that it could work its id must start with the image's id and end with '-comic-bubbles-output'.
  </p>
<pre>
&lt;body&gt;
  &lt;img id="my_image_id" src="my_image.jpg"&gt;
  &lt;div id="my_image_id-comic-bubbles-output"&gt;&lt;/div&gt;
&lt;/body&gt;
</pre>
  <br>
  <h2>4. Adding and modifying bubbles with mouse actions</h2>
  <video width="720" height="335" controls>
    <source src="boy_and_teddy.mp4" type="video/mp4">
    <source src="boy_and_teddy.ogg" type="video/ogg">
    <source src="boy_and_teddy.webm" type="video/webm">
    Your browser does not support the video tag
  </video>
  <br>
  <h3>4.1. Adding a new bubble</h3>
  <p>Double clicking on the image produces a new bubble which has no style (bubbleStyle = 'none')</p>
  <img src="t1.png" width="720" height="180">
  <h3>4.2. Changing the style</h3>
  <h4>Switching on the default style (bubbleStyle = 'speak')</h4>
  <p>Turning the rectangular field into a 'proper' bubble can be done by double clicking on any of the 8 square dots which are on the red outline</p>
  <img src="t2.png" width="720" height="180">
  <h4>Changing the bubbleStyle to 'think'</h4>
  <p>Double clicking on the bubble tail changes the style</p>
  <img src="t3.png" width="720" height="180">
  <h4>Changing the bubbleStyle to 'scream'</h4>
  <img src="t4.png" width="720" height="180">
  <h4>Changing the bubbleStyle to 'arrow'</h4>
  <img src="t5.png" width="720" height="180">
  <h4>Switching the bubbleStyle off (bubbleStyle = 'none')</h4>
  <p>Double clicking on the bubble tail ending removes the style</p>
  <img src="t6.png" width="720" height="180">
  <h3>4.3. Editing a bubble</h3>
  <h4>Selecting a bubble for editing</h4>
  <p>Each editable bubble (readonly = false) can be selected by clicking</p>
  <img src="t7.png" width="720" height="180">
  <h4>Entering a text</h4>
  <p style="color: red;">The text field of a selected bubble is not well suited for interpreting HTML tags. Copying website content and pasting it in with HTML formatting should be avoided (can cause unexpected effects).</p>
  <img src="t8.png" width="720" height="180">
  <h4>Formatting</h4>
  <p>The text can be formatted with a limited set of features which become available after clicking the 'S' button.</p>
  <img src="t9.png" width="720" height="260">
  <h4>Deselecting</h4>
  <p>Clicking anywhere in the picture (outside the bubble) makes the selection frame disappear.</p>
  <img src="t10.png" width="720" height="200">
  <br>
  <h3>4.4. Deleting a bubble</h3>
  <ol>
  <li>Select a bubble</li>
  <li>Press 'Delete'</li>
  </ol>
  <br>
  <h2>5. Saving bubble data</h2>
  <p>Bubble data can be obtained either from the output box or with API functions. The contents of the output box can be manually copied into a website file. On the other hand the API provides automatic means of collecting bubble parametres for further processing (e.g. inserting into a database).</p>
  <br>
  <h2>6. Try it yourself</h2>
  <p>Use your mouse to add bubbles to the picture below. Modify the bubbles and watch the ComicBubbles output box.</p>
  <div>
    <span>Image (id='my_image_id')</span>
    <span>Output box (id='my_image_id-comic-bubbles-output')</span>
    <div class="img">
      <img id="my_image_id" src="boy.jpg" width="360" height="300" onload="teddy();">
    </div>
    <div id="my_image_id-comic-bubbles-output" class="output"></div>
    <div class="clear"></div>
  </div>
</div>
<?php include 'footer.php'; ?>
</body>
</html>
