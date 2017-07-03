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
</script>
</head>
<body id="api" onload="cb()">
<?php
	$page = "api";
	include 'menu.php';
?>
<div class="main">
<h2>Basic usage</h2>
<h4>var MyBubbles = new ComicBubbles(image_id)</h4>
<span>or</span>
<h4>var MyBubbles = new ComicBubbles(image_id, canvas_settings, bubble_settings)</h4>
<p>
image_id: String, required<br>
canvas_settings: Object, optional<br>
bubble_settings: Object, optional<br><br>
<span style="color: red; font-size: 14px"><b>Note:</b> If you want to destroy MyBubbles, call DestroyComicBubbles(MyBubbles)</span>
</p>
<h2>Properties</h2>
<h4>var canvas_settings = {canvas: canvas_properties}</h4>
<h4>canvas_properties</h4>
<table id="canvas-properties">
  <tr>
    <th>property</th>
    <th>default</th>
    <th>description</th>
  </tr>
  <tr>
    <td>text</td>
    <td>&quot;&quot;</td>
    <td>plain text<br>line break: &quot;\n&quot;</td>
  </tr>
  <tr>
    <td>width</td>
    <td>&quot;140px&quot;</td>
    <td>text field width</td>
  </tr>
  <tr>
    <td>height</td>
    <td>&quot;65px&quot;</td>
    <td>text field height</td>
  </tr>
  <tr>
    <td>fontFamily</td>
    <td>'Arial'</td>
    <td>valid fonts:<br>- 'Arial'<br>- 'Arial Black'<br>- 'Comic Sans MS'<br>- 'Courier New'<br>- 'Georgia'<br>- 'Impact'<br>- 'Lucida Console'<br>- 'Lucida Sans Unicode'<br>- 'Palatino Linotype'<br>- 'Tahoma'<br>- 'Times New Roman'<br>- 'Trebuchet MS'<br>- 'Verdana'<br><span style="font-size: 13px"><b>Note:</b> You can also use Google fonts (include them inside the &lt;head&gt; section with a stylesheet link)</span></td>
  </tr>
  <tr>
    <td>fontSize</td>
    <td>&quot;15px&quot;</td>
    <td>valid values: integers from 8 to 99</td>
  </tr>
  <tr>
    <td>fontStyle</td>
    <td>&quot;normal&quot;</td>
    <td>&quot;normal&quot; or &quot;italic&quot;</td>
  </tr>
  <tr>
    <td>fontWeight</td>
    <td>&quot;normal&quot;</td>
    <td>&quot;normal&quot; or &quot;bold&quot;</td>
  </tr>
  <tr>
    <td>textAlign</td>
    <td>&quot;center&quot;</td>
    <td>&quot;left&quot; or &quot;center&quot; or &quot;right&quot; or &quot;justify&quot;</td>
  </tr>
  <tr>
    <td>lineHeight</td>
    <td>1.2</td>
    <td>0.1 - 3</td>
  </tr>
  <tr>
    <td>background</td>
    <td>&quot;#ffffff&quot;</td>
    <td>hex value</td>
  </tr>
  <tr>
    <td>color</td>
    <td>&quot;#000000&quot;</td>
    <td>hex value</td>
  </tr>
  <tr>
    <td>opacity</td>
    <td>0.8</td>
    <td>0 - 1</td>
  </tr>
  <tr>
    <td>readonly</td>
    <td>true</td>
    <td>set to false to enable mouse actions (comicbubbles_editor.js required)</td>
  </tr>
  <tr>
    <td>settable</td>
    <td>true</td>
    <td>set to false to hide 's' button</td>
  </tr>
  <tr>
    <td>bubbleStyle</td>
    <td>&quot;none&quot;</td>
    <td>&quot;none&quot; or &quot;speak&quot; or &quot;think&quot; or &quot;scream&quot; or &quot;arrow&quot;</td>
  </tr>
</table>
<br>
<h4>var bubble_settings = {bubble: bubble_properties}</h4>
<h4>bubble_properties</h4>
<table id="bubble-properties">
  <tr>
    <th>property</th>
    <th>default</th>
    <th>description</th>
  </tr>
  <tr>
    <td>id</td>
    <td>&quot;b&quot; + new Date().getTime() + number of bubbles</td>
    <td>can be replaced by any string</td>
  </tr>
  <tr>
    <td>name</td>
    <td>&quot;&quot;</td>
    <td>can be any string</td>
  </tr>
  <tr>
    <td>text</td>
    <td>canvas_settings.canvas.text</td>
    <td>plain text<br>line break: &quot;\n&quot;</td>
  </tr>
  <tr>
    <td>x</td>
    <td>&quot;0px&quot;</td>
    <td>text field x coordinate</td>
  </tr>
  <tr>
    <td>y</td>
    <td>&quot;0px&quot;</td>
    <td>text field y coordinate</td>
  </tr>
  <tr>
    <td>width</td>
    <td>canvas_settings.canvas.width</td>
    <td>text field width</td>
  </tr>
  <tr>
    <td>height</td>
    <td>canvas_settings.canvas.height</td>
    <td>text field height</td>
  </tr>
  <tr>
    <td>fontFamily</td>
    <td>canvas_settings.canvas.fontFamily</td>
    <td>valid fonts:<br>- 'Arial'<br>- 'Arial Black'<br>- 'Comic Sans MS'<br>- 'Courier New'<br>- 'Georgia'<br>- 'Impact'<br>- 'Lucida Console'<br>- 'Lucida Sans Unicode'<br>- 'Palatino Linotype'<br>- 'Tahoma'<br>- 'Times New Roman'<br>- 'Trebuchet MS'<br>- 'Verdana'<br><span style="font-size: 13px"><b>Note:</b> You can also use Google fonts (include them inside the &lt;head&gt; section with a stylesheet link)</span></td>
  </tr>
  <tr>
    <td>fontSize</td>
    <td>canvas_settings.canvas.fontSize</td>
    <td>valid values: integers from 8 to 99</td>
  </tr>
  <tr>
    <td>fontStyle</td>
    <td>canvas_settings.canvas.fontStyle</td>
    <td>&quot;normal&quot; or &quot;italic&quot;</td>
  </tr>
  <tr>
    <td>fontWeight</td>
    <td>canvas_settings.canvas.fontWeight</td>
    <td>&quot;normal&quot; or &quot;bold&quot;</td>
  </tr>
  <tr>
    <td>textAlign</td>
    <td>canvas_settings.canvas.textAlign</td>
    <td>&quot;left&quot; or &quot;center&quot; or &quot;right&quot; or &quot;justify&quot;</td>
  </tr>
  <tr>
    <td>lineHeight</td>
    <td>canvas_settings.canvas.lineHeight</td>
    <td>0.1 - 3</td>
  </tr>
  <tr>
    <td>background</td>
    <td>canvas_settings.canvas.background</td>
    <td>hex value</td>
  </tr>
  <tr>
    <td>color</td>
    <td>canvas_settings.canvas.color</td>
    <td>hex value</td>
  </tr>
  <tr>
    <td>opacity</td>
    <td>canvas_settings.canvas.opacity</td>
    <td>0 - 1</td>
  </tr>
  <tr>
    <td>readonly</td>
    <td>canvas_settings.canvas.readonly</td>
    <td>set to false to enable mouse actions (comicbubbles_editor.js required)</td>
  </tr>
  <tr>
    <td>settable</td>
    <td>canvas_settings.canvas.settable</td>
    <td>set to false to hide 's' button</td>
  </tr>
  <tr>
    <td>visible</td>
    <td>true</td>
    <td>set to false to hide bubble</td>
  </tr>
  <tr>
    <td>bubbleStyle</td>
    <td>canvas_settings.canvas.bubbleStyle</td>
    <td>&quot;none&quot; or &quot;speak&quot; or &quot;think&quot; or &quot;scream&quot; or &quot;arrow&quot;</td>
  </tr>
  <tr>
    <td>tailLocation</td>
    <td>&quot;se&quot;</td>
    <td>valid values:<br>&quot;nw&quot;, &quot;n&quot;, &quot;ne&quot;, &quot;e&quot;, &quot;se&quot;, &quot;s&quot;, &quot;sw&quot;, &quot;w&quot;</td>
  </tr>
  <tr>
    <td>tailX</td>
    <td></td>
    <td>tail pointer x coordinate</td>
  </tr>
  <tr>
    <td>tailY</td>
    <td></td>
    <td>tail pointer y coordinate</td>
  </tr>
</table>
<h2>ComicBubbles object methods</h2>
<h4>getBubbleById(bubble_id)<span>returns</span><span>Bubble</span></h4>
<p>
bubble_id: String, required
</p>
<h4>getBubblesByName(bubble_name)<span>returns</span><span>Bubble[]</span></h4>
<p>
bubble_name: String, required
</p>
<h4>getAllBubbles()<span>returns</span><span>Bubble[]</span></h4>
<h4>addBubble(bubble, callback)<span>returns</span><span>Bubble</span></h4>
<p>
bubble: Bubble, required<br>
callback: function, optional
</p>
<h4>setText(text)<span>returns</span><span>ComicBubbles</span></h4>
<p>
text: String, required
</p>
<h4>getText()<span>returns</span><span>String</span></h4>
<h4>setWidth(width)<span>returns</span><span>ComicBubbles</span></h4>
<p>
width: Number, required
</p>
<h4>getWidth()<span>returns</span><span>Number</span></h4>
<h4>setHeight(height)<span>returns</span><span>ComicBubbles</span></h4>
<p>
height: Number, required
</p>
<h4>getHeight()<span>returns</span><span>Number</span></h4>
<h4>setFontFamily(font_family)<span>returns</span><span>ComicBubbles</span></h4>
<p>
font_family: String, required
</p>
<h4>getFontFamily()<span>returns</span><span>String</span></h4>
<h4>setFontSize(font_size)<span>returns</span><span>ComicBubbles</span></h4>
<p>
font_size: Number, required
</p>
<h4>getFontSize()<span>returns</span><span>Number</span></h4>
<h4>setFontStyle(font_style)<span>returns</span><span>ComicBubbles</span></h4>
<p>
font_style: String, required
</p>
<h4>getFontStyle()<span>returns</span><span>String</span></h4>
<h4>setFontWeight(font_weight)<span>returns</span><span>ComicBubbles</span></h4>
<p>
font_weight: String, required
</p>
<h4>getFontWeight()<span>returns</span><span>String</span></h4>
<h4>setTextAlign(text_align)<span>returns</span><span>ComicBubbles</span></h4>
<p>
text_align: String, required
</p>
<h4>getTextAlign()<span>returns</span><span>String</span></h4>
<h4>setBackground(background_color)<span>returns</span><span>ComicBubbles</span></h4>
<p>
background_color: String, required
</p>
<h4>getBackground()<span>returns</span><span>String</span></h4>
<h4>setColor(text_color)<span>returns</span><span>ComicBubbles</span></h4>
<p>
text_color: String, required
</p>
<h4>getColor()<span>returns</span><span>String</span></h4>
<h4>setOpacity(opacity)<span>returns</span><span>ComicBubbles</span></h4>
<p>
opacity: Number, required
</p>
<h4>getOpacity()<span>returns</span><span>Number</span></h4>
<h4>setReadonly(readonly)<span>returns</span><span>ComicBubbles</span></h4>
<p>
readonly: Boolean, required
</p>
<h4>isReadonly()<span>returns</span><span>Boolean</span></h4>
<h4>setSettable(settable)<span>returns</span><span>ComicBubbles</span></h4>
<p>
settable: Boolean, required
</p>
<h4>isSettable()<span>returns</span><span>Boolean</span></h4>
<h4>setBubbleStyle(bubble_style)<span>returns</span><span>ComicBubbles</span></h4>
<p>
bubble_style: String, required
</p>
<h4>getBubbleStyle()<span>returns</span><span>String</span></h4>
<h4>getDefaultSettings()<span>returns</span><span>Object</span></h4>
<h4>onBubbleStateChange(callback)</h4>
<p>
callback: function, required
</p>
<h4>getBubblesData()<span>returns</span><span>Object</span></h4>
<h2>Bubble object methods</h2>
<h4>setId(id, callback)<span>returns</span><span>Bubble</span></h4>
<p>
id: String, required<br>
callback: function, optional
</p>
<h4>getId()<span>returns</span><span>String</span></h4>
<h4>setName(name, callback)<span>returns</span><span>Bubble</span></h4>
<p>
name: String, required<br>
callback: function, optional
</p>
<h4>getName()<span>returns</span><span>String</span></h4>
<h4>setText(text, callback)<span>returns</span><span>Bubble</span></h4>
<p>
text: String, required<br>
callback: function, optional
</p>
<h4>getText()<span>returns</span><span>String</span></h4>
<h4>setX(x, callback)<span>returns</span><span>Bubble</span></h4>
<p>
x: Number, required<br>
callback: function, optional
</p>
<h4>getX()<span>returns</span><span>Number</span></h4>
<h4>setY(y, callback)<span>returns</span><span>Bubble</span></h4>
<p>
y: Number, required<br>
callback: function, optional
</p>
<h4>getY()<span>returns</span><span>Number</span></h4>
<h4>setWidth(width, callback)<span>returns</span><span>Bubble</span></h4>
<p>
width: Number, required<br>
callback: function, optional
</p>
<h4>getWidth()<span>returns</span><span>Number</span></h4>
<h4>setHeight(height, callback)<span>returns</span><span>Bubble</span></h4>
<p>
height: Number, required<br>
callback: function, optional
</p>
<h4>getHeight()<span>returns</span><span>Number</span></h4>
<h4>setFontFamily(font_family, callback)<span>returns</span><span>Bubble</span></h4>
<p>
font_family: String, required<br>
callback: function, optional
</p>
<h4>getFontFamily()<span>returns</span><span>String</span></h4>
<h4>setFontSize(font_size, callback)<span>returns</span><span>Bubble</span></h4>
<p>
font_size: Number, required<br>
callback: function, optional
</p>
<h4>getFontSize()<span>returns</span><span>Number</span></h4>
<h4>setFontStyle(font_style, callback)<span>returns</span><span>Bubble</span></h4>
<p>
font_style: String, required<br>
callback: function, optional
</p>
<h4>getFontStyle()<span>returns</span><span>String</span></h4>
<h4>setFontWeight(font_weight, callback)<span>returns</span><span>Bubble</span></h4>
<p>
font_weight: String, required<br>
callback: function, optional
</p>
<h4>getFontWeight()<span>returns</span><span>String</span></h4>
<h4>setTextAlign(text_align, callback)<span>returns</span><span>Bubble</span></h4>
<p>
text_align: String, required<br>
callback: function, optional
</p>
<h4>getTextAlign()<span>returns</span><span>String</span></h4>
<h4>setBackground(background_color, callback)<span>returns</span><span>Bubble</span></h4>
<p>
background_color: String, required<br>
callback: function, optional
</p>
<h4>getBackground()<span>returns</span><span>String</span></h4>
<h4>setColor(text_color, callback)<span>returns</span><span>Bubble</span></h4>
<p>
text_color: String, required<br>
callback: function, optional
</p>
<h4>getColor()<span>returns</span><span>String</span></h4>
<h4>setOpacity(opacity, callback)<span>returns</span><span>Bubble</span></h4>
<p>
opacity: Number, required<br>
callback: function, optional
</p>
<h4>getOpacity()<span>returns</span><span>Number</span></h4>
<h4>setReadonly(readonly, callback)<span>returns</span><span>Bubble</span></h4>
<p>
readonly: Boolean, required<br>
callback: function, optional
</p>
<h4>isReadonly()<span>returns</span><span>Boolean</span></h4>
<h4>setSettable(settable, callback)<span>returns</span><span>Bubble</span></h4>
<p>
settable: Boolean, required<br>
callback: function, optional
</p>
<h4>isSettable()<span>returns</span><span>Boolean</span></h4>
<h4>setTailLocation(tail_location, callback)<span>returns</span><span>Bubble</span></h4>
<p>
tail_location: String, required<br>
callback: function, optional
</p>
<h4>getTailLocation()<span>returns</span><span>String</span></h4>
<h4>setTailX(tail_x, callback)<span>returns</span><span>Bubble</span></h4>
<p>
tail_x: Number, required<br>
callback: function, optional
</p>
<h4>getTailX()<span>returns</span><span>Number</span></h4>
<h4>setTailY(tail_y, callback)<span>returns</span><span>Bubble</span></h4>
<p>
tail_y: Number, required<br>
callback: function, optional
</p>
<h4>getTailY()<span>returns</span><span>Number</span></h4>
<h4>setBubbleStyle(bubble_style, callback)<span>returns</span><span>Bubble</span></h4>
<p>
bubble_style: String, required<br>
callback: function, optional
</p>
<h4>getBubbleStyle()<span>returns</span><span>String</span></h4>
<h4>show(callback)<span>returns</span><span>Bubble</span></h4>
<p>
callback: function, optional
</p>
<h4>hide(callback)<span>returns</span><span>Bubble</span></h4>
<p>
callback: function, optional
</p>
<h4>isVisible()<span>returns</span><span>Boolean</span></h4>
<h4>fadeIn(miliseconds, callback)<span>returns</span><span>Bubble</span></h4>
<p>
miliseconds: Number, optional<br>
callback: function, optional
</p>
<h4>fadeOut(miliseconds, callback)<span>returns</span><span>Bubble</span></h4>
<p>
miliseconds: Number, optional<br>
callback: function, optional
</p>
<h4>moveTo(x, y, speed, callback)<span>returns</span><span>Bubble</span></h4>
<p>
x: Number, required<br>
y: Number, required<br>
speed: 'slowest'|'slower'|'slow'|'fast'|'faster'|'fastest', optional<br>
callback: function, optional
</p>
<h4>pumpUp(speed, callback)<span>returns</span><span>Bubble</span></h4>
<p>
speed: 'slowest'|'slower'|'slow'|'fast'|'faster'|'fastest', optional<br>
callback: function, optional
</p>
<h4>delay(miliseconds, callback)<span>returns</span><span>Bubble</span></h4>
<p>
miliseconds: Number, optional<br>
callback: function, optional
</p>
<h4>remove(callback)</h4>
<p>
callback: function, optional
</p>
<h4>onMouseEvent(callback, event)<span>returns</span><span>Bubble</span></h4>
<p>
callback: function, required<br>
event: 'click'|'mousedown'|'mouseup'|'mouseover'|'mouseout', optional
</p>
<h4>offMouseEvent(callback, event)<span>returns</span><span>Bubble</span></h4>
<p>
callback: function, required<br>
event: 'click'|'mousedown'|'mouseup'|'mouseover'|'mouseout', optional
</p>
<h4>getBubbleSettings()<span>returns</span><span>Object</span></h4>
</div>
<?php include 'footer.php'; ?>
</body>
</html>
