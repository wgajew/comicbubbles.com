<!doctype html>
<html lang="en">
<head>
<?php
	include 'header.php';
?>
<script>
function vegetables(){
  var vegetables_cb, click = 0,
    v = ["seler", "marchew", "burak", "pietruszka", "ziemniak", "czosnek", "cebula"].sort(function(){ return .5 - Math.random(); });
  vegetables_cb = new ComicBubbles("pict5", {canvas: {width: 130, height: 36, fontSize: '22px', fontWeight: 'bold', textAlign: 'center', color: '#8b0000', bubbleStyle: 'arrow'}}, {bubble: [
    {id: 'v1', name: "kalarepa", text: "kalarepa", x: 35, y: 70, color: '#0000cd', tailLocation: 'se', tailX: 216, tailY: 205},
    {id: 'v2', name: "seler", text: "click", x: 635, y: 70, tailLocation: 'sw', tailX: 592, tailY: 147},
    {id: 'v3', name: "marchew", text: "click", x: 35, y: 215, tailLocation: 'e', tailX: 232, tailY: 249},
    {id: 'v4', name: "burak", text: "click", x: 340, y: 215, tailLocation: 'n', tailX: 372, tailY: 177},
    {id: 'v5', name: "pietruszka", text: "click", x: 635, y: 215, tailLocation: 'sw', tailX: 585, tailY: 302},
    {id: 'v6', name: "ziemniak", text: "click", x: 35, y: 380, tailLocation: 'ne', tailX: 197, tailY: 333},
    {id: 'v7', name: "czosnek", text: "click", x: 340, y: 380, tailLocation: 'ne', tailX: 488, tailY: 333},
    {id: 'v8', name: "cebula", text: "click", x: 635, y: 380, tailLocation: 'n', tailX: 676, tailY: 297},
    {id: 'q1', name: v[click], text: "Which is\n'"+v[click]+"' ?", x: 296, y: 45, width: 218, height: 81, fontFamily: 'Verdana, Geneva, sans-serif', fontSize: '27px', background: '#000000', color: '#ffd700', opacity: 0.5, bubbleStyle: 'speak', tailLocation: 'n', tailX: 436, tailY: 3}
  ]});
  var v2 = vegetables_cb.getBubbleById('v2'),
    v3 = vegetables_cb.getBubbleById('v3'),
    v4 = vegetables_cb.getBubbleById('v4'),
    v5 = vegetables_cb.getBubbleById('v5'),
    v6 = vegetables_cb.getBubbleById('v6'),
    v7 = vegetables_cb.getBubbleById('v7'),
    v8 = vegetables_cb.getBubbleById('v8'),
    q1 = vegetables_cb.getBubbleById('q1');

  v2.onMouseEvent(function(){ checkAnswer(v2); });
  v3.onMouseEvent(function(){ checkAnswer(v3); });
  v4.onMouseEvent(function(){ checkAnswer(v4); });
  v5.onMouseEvent(function(){ checkAnswer(v5); });
  v6.onMouseEvent(function(){ checkAnswer(v6); });
  v7.onMouseEvent(function(){ checkAnswer(v7); });
  v8.onMouseEvent(function(){ checkAnswer(v8); });
  function checkAnswer(bubble){
    var name = v[click++];
    if (click < 8) {
      if (bubble.getName() == name) {
        bubble.offMouseEvent().setColor("#0000cd").setText(name, function(){
          if (click == 7) finishTest();
        });
      }
      else {
        bubble.setColor("#ff0000");
				q1.setColor('#ff0000').setText("wrong\nanswer!").delay(1000, function(){
          if (click == 7) finishTest();
        });
      }
			if (click < 7) q1.setName(v[click]).setColor('#ffd700').setText("Which is\n'"+v[click]+"' ?");
    }
  }
  function finishTest(){
    q1.setText("You have no\nmore clicks");
    var bubbles = vegetables_cb.getAllBubbles();
    for (var i = 0; i < bubbles.length; i++) {
      if (bubbles[i].getText() == "click") {
        bubbles[i].offMouseEvent().setColor("#ff0000").setText("?");
      }
    }
  }
}

var camels_cb;
function camels(){
  camels_cb = new ComicBubbles("pict4", {canvas: {fontFamily: 'Georgia, serif', fontSize: '13px', fontWeight: 'bold', textAlign: 'center', opacity: 0.6, bubbleStyle: 'arrow'}}, {bubble: [
  {id: 'b1', text: "My father", x: 127, y: 20, width: 91, height: 21, background: '#1e90ff', tailLocation: 's', tailX: 173, tailY: 83},
  {id: 'b2', text: "My uncle", x: 237, y: 20, width: 91, height: 21, background: '#00ff7f', tailLocation: 's', tailX: 283, tailY: 83},
  {id: 'b3', text: "Me", x: 340, y: 60, width: 'auto', height: 21, fontFamily: 'Arial, Helvetica, sans-serif', fontSize: '15px', background: '#dc143c', color: '#ffff00', opacity: 1, tailLocation: 's', tailX: 353, tailY: 130},
  {id: 'b4', text: "My brother", x: 420, y: 20, width: 91, height: 21, background: '#ffff00', tailLocation: 's', tailX: 466, tailY: 83},
  {id: 'b5', text: "My sister", x: 535, y: 20, width: 91, height: 21, background: '#ff1493', tailLocation: 's', tailX: 581, tailY: 83},
  {id: 'b6', text: "My brother", x: 690, y: 20, width: 91, height: 21, background: '#b22222', tailLocation: 's', tailX: 736, tailY: 83}
  ]});
}
function my_family(){
  camels_cb.getBubbleById('b1').hide().moveTo(127,-250,'fastest');
  camels_cb.getBubbleById('b2').hide().moveTo(237,-250,'fastest');
  camels_cb.getBubbleById('b3').hide().moveTo(340,-250,'fastest');
  camels_cb.getBubbleById('b4').hide().moveTo(420,-250,'fastest');
  camels_cb.getBubbleById('b5').hide().moveTo(535,-250,'fastest');
  camels_cb.getBubbleById('b6').hide().moveTo(690,-250,'fastest');
  camels_cb.getBubbleById('b1').show().moveTo(127,20,'fast',function(){
    camels_cb.getBubbleById('b2').show().moveTo(237,20,'fast',function(){
      camels_cb.getBubbleById('b3').show().moveTo(340,60,'fast',function(){
        camels_cb.getBubbleById('b4').show().moveTo(420,20,'fast',function(){
          camels_cb.getBubbleById('b5').show().moveTo(535,20,'fast',function(){
            camels_cb.getBubbleById('b6').show().moveTo(690,20,'fast');
          });
        });
      });
    });
  });
}

function outputOnOff(b){
  var c = document.getElementById("third-demo-output");
  if (c.style.display == "block") {
    c.style.display = "none";
    b.innerHTML = "SHOW OUTPUT";
  }
  else {
    c.style.display = "block";
    b.innerHTML = "HIDE OUTPUT";
  }
}

function cb(){
	<?php include 'cb_is.php'; ?>
	sh_highlightDocument();
}
</script>
</head>
<body onload="cb()">
<?php
	$page = "demo2";
	include 'menu.php';
?>
<div id="third-demo" class="demo">
  <h2>Picture dictionary interactive module</h2>
  <div id="third-demo-output" class="demo-output">
    <div id="pict5-comic-bubbles-output"></div>
  </div>
  <div class="right">
    <div id="third-demo-output-btn" onclick="outputOnOff(this)">SHOW OUTPUT</div>
    <img id="pict5" src="pict5.jpg" width="800" height="450" onload="vegetables()">
  </div>
  <div class="left">
<pre class="sh_javascript_dom">
function <button id="btn5" onclick="vegetables()">vegetables()</button>{

var vegetables_cb, click = 0,
    v = ["seler", "marchew", "burak", "pietruszka", "ziemniak", "czosnek", "cebula"]<wbr>.sort(function(){ return .5 - Math.random(); });

vegetables_cb = new ComicBubbles("pict5", {canvas: {width: 130, height: 36, fontSize: '22px', fontWeight: 'bold', textAlign: 'center', color: '#8b0000', bubbleStyle: 'arrow'}}, {bubble: [
	{id: 'v1', name: "kalarepa", text: "kalarepa", x: 35, y: 70, color: '#0000cd', tailLocation: 'se', tailX: 216, tailY: 205},
	{id: 'v2', name: "seler", text: "click", x: 635, y: 70, tailLocation: 'sw', tailX: 592, tailY: 147},
	{id: 'v3', name: "marchew", text: "click", x: 35, y: 215, tailLocation: 'e', tailX: 232, tailY: 249},
	{id: 'v4', name: "burak", text: "click", x: 340, y: 215, tailLocation: 'n', tailX: 372, tailY: 177},
	{id: 'v5', name: "pietruszka", text: "click", x: 635, y: 215, tailLocation: 'sw', tailX: 585, tailY: 302},
	{id: 'v6', name: "ziemniak", text: "click", x: 35, y: 380, tailLocation: 'ne', tailX: 197, tailY: 333},
	{id: 'v7', name: "czosnek", text: "click", x: 340, y: 380, tailLocation: 'ne', tailX: 488, tailY: 333},
	{id: 'v8', name: "cebula", text: "click", x: 635, y: 380, tailLocation: 'n', tailX: 676, tailY: 297},
	{id: 'q1', name: v[click], text: "Which is\n'"+v[click]+"' ?", x: 296, y: 45, width: 218, height: 81, fontFamily: 'Verdana, Geneva, sans-serif', fontSize: '27px', background: '#000000', color: '#ffff00', opacity: 0.5, bubbleStyle: 'speak', tailLocation: 'n', tailX: 436, tailY: 3}
]});

var v2 = vegetables_cb<wbr>.getBubbleById('v2'),
    v3 = vegetables_cb<wbr>.getBubbleById('v3'),
    v4 = vegetables_cb<wbr>.getBubbleById('v4'),
    v5 = vegetables_cb<wbr>.getBubbleById('v5'),
    v6 = vegetables_cb<wbr>.getBubbleById('v6'),
    v7 = vegetables_cb<wbr>.getBubbleById('v7'),
    v8 = vegetables_cb<wbr>.getBubbleById('v8'),
    q1 = vegetables_cb<wbr>.getBubbleById('q1');

v2<wbr>.onMouseEvent(function(){ checkAnswer(v2); });
v3<wbr>.onMouseEvent(function(){ checkAnswer(v3); });
v4<wbr>.onMouseEvent(function(){ checkAnswer(v4); });
v5<wbr>.onMouseEvent(function(){ checkAnswer(v5); });
v6<wbr>.onMouseEvent(function(){ checkAnswer(v6); });
v7<wbr>.onMouseEvent(function(){ checkAnswer(v7); });
v8<wbr>.onMouseEvent(function(){ checkAnswer(v8); });

function checkAnswer(bubble){
  var name = v[click++];
  if (click < 8) {
    if (bubble.getName() == name) {
      bubble.offMouseEvent().setColor("#0000cd").setText(name, function(){
        if (click == 7) finishTest();
      });
    }
    else {
      bubble.setColor("#ff0000");
			q1.setColor('#ff0000').setText("wrong\nanswer!").delay(1000, function(){
        if (click == 7) finishTest();
      });
    }
		if (click < 7) q1.setName(v[click]).setColor('#ffd700').setText("Which is\n'"+v[click]+"' ?");
  }
}

function finishTest(){
	q1<wbr>.setText("You have no\nmore clicks");
	var bubbles = vegetables_cb<wbr>.getAllBubbles();
	for (var i = 0; i < bubbles.length; i++) {
		if (bubbles[i].getText() == "click") {
			bubbles[i]<wbr>.offMouseEvent()<wbr>.setColor("#ff0000")<wbr>.setText("?");
		}
	}
}

}
</pre>
  </div>
</div>
<div class="demo-spacer">&nbsp;</div>
<div id="fourth-demo" class="demo">
  <h2>Labeling people</h2>
  <div class="right">
    <img id="pict4" src="pict4.jpg" width="800" height="260" onload="camels()">
  </div>
  <div class="left">
<pre class="sh_javascript_dom">
var camels_cb = new ComicBubbles("pict4", {canvas: {fontFamily: 'Georgia, serif', fontSize: '13px', fontWeight: 'bold', textAlign: 'center', opacity: 0.6, bubbleStyle: 'arrow'}}, {bubble: [
  {id: 'b1', text: "My father", x: 127, y: 20, width: 91, height: 21, background: '#1e90ff', tailLocation: 's', tailX: 173, tailY: 83},
  {id: 'b2', text: "My uncle", x: 237, y: 20, width: 91, height: 21, background: '#00ff7f', tailLocation: 's', tailX: 283, tailY: 83},
  {id: 'b3', text: "Me", x: 340, y: 60, width: 'auto', height: 21, fontFamily: 'Arial, Helvetica, sans-serif', fontSize: '15px', background: '#dc143c', color: '#ffff00', opacity: 1, tailLocation: 's', tailX: 353, tailY: 130},
  {id: 'b4', text: "My brother", x: 420, y: 20, width: 91, height: 21, background: '#ffff00', tailLocation: 's', tailX: 466, tailY: 83},
  {id: 'b5', text: "My sister", x: 535, y: 20, width: 91, height: 21, background: '#ff1493', tailLocation: 's', tailX: 581, tailY: 83},
  {id: 'b6', text: "My brother", x: 690, y: 20, width: 91, height: 21, background: '#b22222', tailLocation: 's', tailX: 736, tailY: 83}
]});

function <button id="btn4" onclick="my_family()">my_family()</button>{

camels_cb<wbr>.getBubbleById('b1')<wbr>.hide()<wbr>.moveTo(127,-250,'fastest');
camels_cb<wbr>.getBubbleById('b2')<wbr>.hide()<wbr>.moveTo(237,-250,'fastest');
camels_cb<wbr>.getBubbleById('b3')<wbr>.hide()<wbr>.moveTo(340,-250,'fastest');
camels_cb<wbr>.getBubbleById('b4')<wbr>.hide()<wbr>.moveTo(420,-250,'fastest');
camels_cb<wbr>.getBubbleById('b5')<wbr>.hide()<wbr>.moveTo(535,-250,'fastest');
camels_cb<wbr>.getBubbleById('b6')<wbr>.hide()<wbr>.moveTo(690,-250,'fastest');
camels_cb<wbr>.getBubbleById('b1')<wbr>.show()<wbr>.moveTo(127,15,'fast',function(){
	camels_cb<wbr>.getBubbleById('b2')<wbr>.show()<wbr>.moveTo(237,15,'fast',function(){
		camels_cb<wbr>.getBubbleById('b3')<wbr>.show()<wbr>.moveTo(340,57,'fast',function(){
			camels_cb<wbr>.getBubbleById('b4')<wbr>.show()<wbr>.moveTo(420,15,'fast',function(){
				camels_cb<wbr>.getBubbleById('b5')<wbr>.show()<wbr>.moveTo(535,15,'fast',function(){
					camels_cb<wbr>.getBubbleById('b6')<wbr>.show()<wbr>.moveTo(690,15,'fast');
				});
			});
		});
	});
});

}
</pre>
  </div>
</div>
<div class="cb-spacer"></div>
<?php include 'footer.php'; ?>
</body>
</html>
