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
		var cb = new ComicBubbles("main-cb", {bubble:
			{id: 'b1464800593928', name: "aaa", text: "ComicBubbles is\na word bubble\nJavaScript library", x: 40, y: 13, width: 108, height: 44, fontFamily: 'Verdana, Geneva, sans-serif', fontSize: '12px', textAlign: 'center', background: '#ffffff', color: '#000000', opacity: 0.7, bubbleStyle: 'speak', tailLocation: 'nw', tailX: 0, tailY: 0}
		});
    //var bu = cb.getBubbleById("b1464800593928");
	}

	</script>
</head>
<body id="api" onload="cb()">
<?php
	$page = "api";
	include 'menu.php';
?>
<div class="main">
<h3>Basic usage</h3>
<h4>var cb = new ComicBubbles(image_id)</h4>
<span>or</span>
<h4>var cb = new ComicBubbles(image_id, canvas_settings, bubble_settings)</h4>
<p>
image_id: String, required<br>
canvas_settings: Object, optional<br>
bubble_settings: Object, optional
</p>
<h3>Setting up options & adding bubbles</h3>
<h4>canvas_settings = {canvas: canvas_options}</h4>
<h4>canvas_options</h4>
<table>
  <tr>
    <th>option</th>
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
    <td>'Arial, Helvetica, sans-serif'</td>
    <td>valid values:<br>- 'Arial, Helvetica, sans-serif'<br>- '&quot;Arial Black&quot;, Gadget, sans-serif'<br>- '&quot;Comic Sans MS&quot;, cursive, sans-serif'<br>- '&quot;Courier New&quot;, Courier, monospace'<br>- 'Georgia, serif'<br>- 'Impact, Charcoal, sans-serif'<br>- '&quot;Lucida Console&quot;, Monaco, monospace'<br>- '&quot;Lucida Sans Unicode&quot;, &quot;Lucida Grande&quot;, sans-serif'<br>- '&quot;Palatino Linotype&quot;, &quot;Book Antiqua&quot;, Palatino, serif'<br>- 'Tahoma, Geneva, sans-serif'<br>- '&quot;Times New Roman&quot;, Times, serif'<br>- '&quot;Trebuchet MS&quot;, Helvetica, sans-serif'<br>- 'Verdana, Geneva, sans-serif'</td>
  </tr>
  <tr>
    <td>fontSize</td>
    <td>&quot;15px&quot;</td>
    <td>valid values: integers from 8 to 50</td>
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
<h4>bubble_settings = {bubble: bubble_options}</h4>
<h4>bubble_options</h4>
<table>
  <tr>
    <th>option</th>
    <th>default</th>
    <th>description</th>
  </tr>
  <tr>
    <td>id</td>
    <td>&quot;b&quot; + new Date().getTime() + number of bubbles</td>
    <td></td>
  </tr>
  <tr>
    <td>name</td>
    <td>&quot;&quot;</td>
    <td></td>
  </tr>
  <tr>
    <td>text</td>
    <td>canvas_settings.canvas.text</td>
    <td></td>
  </tr>
  <tr>
    <td>x</td>
    <td>&quot;0px&quot;</td>
    <td></td>
  </tr>
  <tr>
    <td>y</td>
    <td>&quot;0px&quot;</td>
    <td></td>
  </tr>
  <tr>
    <td>width</td>
    <td>canvas_settings.canvas.width</td>
    <td></td>
  </tr>
  <tr>
    <td>height</td>
    <td>canvas_settings.canvas.height</td>
    <td></td>
  </tr>
  <tr>
    <td>fontFamily</td>
    <td>canvas_settings.canvas.fontFamily</td>
    <td></td>
  </tr>
  <tr>
    <td>fontSize</td>
    <td>canvas_settings.canvas.fontSize</td>
    <td></td>
  </tr>
  <tr>
    <td>fontStyle</td>
    <td>canvas_settings.canvas.fontStyle</td>
    <td></td>
  </tr>
  <tr>
    <td>fontWeight</td>
    <td>canvas_settings.canvas.fontWeight</td>
    <td></td>
  </tr>
  <tr>
    <td>textAlign</td>
    <td>canvas_settings.canvas.textAlign</td>
    <td></td>
  </tr>
  <tr>
    <td>background</td>
    <td>canvas_settings.canvas.background</td>
    <td></td>
  </tr>
  <tr>
    <td>color</td>
    <td>canvas_settings.canvas.color</td>
    <td></td>
  </tr>
  <tr>
    <td>opacity</td>
    <td>canvas_settings.canvas.opacity</td>
    <td></td>
  </tr>
  <tr>
    <td>readonly</td>
    <td>canvas_settings.canvas.readonly</td>
    <td></td>
  </tr>
  <tr>
    <td>settable</td>
    <td>canvas_settings.canvas.settable</td>
    <td></td>
  </tr>
  <tr>
    <td>visible</td>
    <td>true</td>
    <td></td>
  </tr>
  <tr>
    <td>bubbleStyle</td>
    <td>canvas_settings.canvas.bubbleStyle</td>
    <td></td>
  </tr>
  <tr>
    <td>tailLocation</td>
    <td>&quot;se&quot;</td>
    <td></td>
  </tr>
  <tr>
    <td>tailX</td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td>tailY</td>
    <td></td>
    <td></td>
  </tr>
</table>
<br>
<h3>ComicBubbles object methods</h3>
<h4>getBubbleById(bubble_id)<span>returns</span><span>Bubble</span></h4>
<h4>getBubblesByName(bubble_name)<span>returns</span><span>Bubble[]</span></h4>
<h4>getAllBubbles()<span>returns</span><span>Bubble[]</span></h4>
<h4>addBubble(bubble,callback)<span>returns</span><span>Bubble</span></h4>
<h4>setText(text)<span>returns</span><span>ComicBubbles</span></h4>
<h4>getText()<span>returns</span><span>String</span></h4>
<h4>setWidth(width)<span>returns</span><span>ComicBubbles</span></h4>
<h4>getWidth()<span>returns</span><span>Number</span></h4>
<h4>setHeight(height)<span>returns</span><span>ComicBubbles</span></h4>
<h4>getHeight()<span>returns</span><span>Number</span></h4>
<h4>setFontFamily(font_family)<span>returns</span><span>ComicBubbles</span></h4>
<h4>getFontFamily()<span>returns</span><span>String</span></h4>
<h4>setFontSize(font_size)<span>returns</span><span>ComicBubbles</span></h4>
<h4>getFontSize()<span>returns</span><span>String</span></h4>
<h4>setFontStyle(font_style)<span>returns</span><span>ComicBubbles</span></h4>
<h4>getFontStyle()<span>returns</span><span>String</span></h4>
<h4>setFontWeight(font_weight)<span>returns</span><span>ComicBubbles</span></h4>
<h4>getFontWeight()<span>returns</span><span>String</span></h4>
<h4>setTextAlign(text_align)<span>returns</span><span>ComicBubbles</span></h4>
<h4>getTextAlign()<span>returns</span><span>String</span></h4>
<h4>setBackground(background_color)<span>returns</span><span>ComicBubbles</span></h4>
<h4>getBackground()<span>returns</span><span>String</span></h4>
<h4>setColor(text_color)<span>returns</span><span>ComicBubbles</span></h4>
<h4>getColor()<span>returns</span><span>String</span></h4>
<h4>setOpacity(opacity)<span>returns</span><span>ComicBubbles</span></h4>
<h4>getOpacity()<span>returns</span><span>Number</span></h4>
<h4>setReadonly(readonly)<span>returns</span><span>ComicBubbles</span></h4>
<h4>isReadonly()<span>returns</span><span>Boolean</span></h4>
<h4>setSettable(settable)<span>returns</span><span>ComicBubbles</span></h4>
<h4>isSettable()<span>returns</span><span>Boolean</span></h4>
<h4>setBubbleStyle(bubble_style)<span>returns</span><span>ComicBubbles</span></h4>
<h4>getBubbleStyle()<span>returns</span><span>String</span></h4>
<h4>getDefaultSettings()<span>returns</span><span>Object</span></h4>
<h4>onBubbleStateChange(callback)</h4>
<h4>getBubblesData()<span>returns</span><span>Object</span></h4>
<h3>Bubble object methods</h3>
<h4>setId(id,callback)<span>returns</span><span>Bubble</span></h4>
<p>
id: string, required<br>
callback: function, optional
</p>
<h4>getId()<span>returns</span><span>String</span></h4>
<h4>setName(name,callback)<span>returns</span><span>Bubble</span></h4>
<h4>getName()<span>returns</span><span>String</span></h4>
<h4>setText(text,callback)<span>returns</span><span>Bubble</span></h4>
<h4>getText()<span>returns</span><span>String</span></h4>
<h4>setX(x,callback)<span>returns</span><span>Bubble</span></h4>
<h4>getX()<span>returns</span><span>Number</span></h4>
<h4>setY(y,callback)<span>returns</span><span>Bubble</span></h4>
<h4>getY()<span>returns</span><span>Number</span></h4>
<h4>setWidth(width,callback)<span>returns</span><span>Bubble</span></h4>
<h4>getWidth()<span>returns</span><span>Number</span></h4>
<h4>setHeight(height,callback)<span>returns</span><span>Bubble</span></h4>
<h4>getHeight()<span>returns</span><span>Number</span></h4>
<h4>setFontFamily(font_family,callback)<span>returns</span><span>Bubble</span></h4>
<h4>getFontFamily()<span>returns</span><span>String</span></h4>
<h4>setFontSize(font_size,callback)<span>returns</span><span>Bubble</span></h4>
<h4>getFontSize()<span>returns</span><span>Number</span></h4>
<h4>setFontStyle(font_style,callback)<span>returns</span><span>Bubble</span></h4>
<h4>getFontStyle()<span>returns</span><span>String</span></h4>
<h4>setFontWeight(font_weight,callback)<span>returns</span><span>Bubble</span></h4>
<h4>getFontWeight()<span>returns</span><span>String</span></h4>
<h4>setTextAlign(text_align,callback)<span>returns</span><span>Bubble</span></h4>
<h4>getTextAlign()<span>returns</span><span>String</span></h4>
<h4>setBackground(background_color,callback)<span>returns</span><span>Bubble</span></h4>
<h4>getBackground()<span>returns</span><span>String</span></h4>
<h4>setColor(text_color,callback)<span>returns</span><span>Bubble</span></h4>
<h4>getColor()<span>returns</span><span>String</span></h4>
<h4>setOpacity(opacity,callback)<span>returns</span><span>Bubble</span></h4>
<h4>getOpacity()<span>returns</span><span>Number</span></h4>
<h4>setReadonly(readonly,callback)<span>returns</span><span>Bubble</span></h4>
<h4>isReadonly()<span>returns</span><span>Boolean</span></h4>
<h4>setSettable(settable,callback)<span>returns</span><span>Bubble</span></h4>
<h4>isSettable()<span>returns</span><span>Boolean</span></h4>
<h4>setTailLocation(tail_location,callback)<span>returns</span><span>Bubble</span></h4>
<h4>getTailLocation()<span>returns</span><span>String</span></h4>
<h4>setTailX(tail_x,callback)<span>returns</span><span>Bubble</span></h4>
<h4>getTailX()<span>returns</span><span>Number</span></h4>
<h4>setTailY(tail_y,callback)<span>returns</span><span>Bubble</span></h4>
<h4>getTailY()<span>returns</span><span>Number</span></h4>
<h4>setBubbleStyle(bubble_style,callback)<span>returns</span><span>Bubble</span></h4>
<h4>getBubbleStyle()<span>returns</span><span>String</span></h4>
<h4>show(callback)<span>returns</span><span>Bubble</span></h4>
<h4>hide(callback)<span>returns</span><span>Bubble</span></h4>
<h4>isVisible()<span>returns</span><span>Boolean</span></h4>
<h4>fadeIn(miliseconds,callback)<span>returns</span><span>Bubble</span></h4>
<h4>fadeOut(miliseconds,callback)<span>returns</span><span>Bubble</span></h4>
<h4>moveTo(x, y, miliseconds, callback)<span>returns</span><span>Bubble</span></h4>
<h4>delay(miliseconds,callback)<span>returns</span><span>Bubble</span></h4>
<h4>remove(callback)</h4>
<h4>onMouseEvent(callback, event)<span>returns</span><span>Bubble</span></h4>
<h4>offMouseEvent(callback, event)<span>returns</span><span>Bubble</span></h4>
<h4>getBubbleSettings()<span>returns</span><span>Function</span></h4>
</div>
</body>
</html>
