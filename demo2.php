<!doctype html>
<html lang="en">
<head>
<?php
	include 'header.php';
?>
<script>
var Vegetables;
function which_is(){
  DestroyComicBubbles(Vegetables);
  
  var click = 0;
  var v = ["seler", "marchew", "burak", "pietruszka", "ziemniak", "czosnek", "cebula"].sort(function(){ return .5 - Math.random(); });
  Vegetables = new ComicBubbles("pict5", {canvas: {width: 'auto', height: 'auto', fontSize: '22px', fontWeight: 'bold', textAlign: 'center', lineHeight: 1.5, color: '#8b0000', bubbleStyle: 'arrow', responsive: true}}, {bubble: [
    {id: 'v1', name: "kalarepa", text: "kalarepa", x: 60, y: 70, color: '#0000cd', tailLocation: 'se', tailX: 216, tailY: 205},
    {id: 'v2', name: "seler", text: "click", x: 635, y: 70, tailLocation: 'sw', tailX: 592, tailY: 147},
    {id: 'v3', name: "marchew", text: "click", x: 60, y: 215, tailLocation: 'e', tailX: 232, tailY: 249},
    {id: 'v4', name: "burak", text: "click", x: 340, y: 215, tailLocation: 'n', tailX: 372, tailY: 177},
    {id: 'v5', name: "pietruszka", text: "click", x: 635, y: 215, tailLocation: 'sw', tailX: 585, tailY: 302},
    {id: 'v6', name: "ziemniak", text: "click", x: 60, y: 380, tailLocation: 'ne', tailX: 197, tailY: 333},
    {id: 'v7', name: "czosnek", text: "click", x: 340, y: 380, tailLocation: 'ne', tailX: 488, tailY: 333},
    {id: 'v8', name: "cebula", text: "click", x: 635, y: 380, tailLocation: 'n', tailX: 676, tailY: 297},
    {id: 'q1', name: v[click], text: "Which is\n'"+v[click]+"' ?", className: 'question', x: 296, y: 45, width: 'auto', height: 'auto', fontFamily: 'Verdana', fontSize: '27px', background: '#000000', color: '#ffd700', opacity: 0.5, bubbleStyle: 'speak', tailLocation: 'n', tailX: 420, tailY: 0}
  ]});
  
  Vegetables.onCanvasLoad(function(){
    
    var v2 = this.getBubbleById('v2'),
      v3 = this.getBubbleById('v3'),
      v4 = this.getBubbleById('v4'),
      v5 = this.getBubbleById('v5'),
      v6 = this.getBubbleById('v6'),
      v7 = this.getBubbleById('v7'),
      v8 = this.getBubbleById('v8'),
      q1 = this.getBubbleById('q1');

    v2.onMouseEvent(function(){ checkAnswer(this); });
    v3.onMouseEvent(function(){ checkAnswer(this); });
    v4.onMouseEvent(function(){ checkAnswer(this); });
    v5.onMouseEvent(function(){ checkAnswer(this); });
    v6.onMouseEvent(function(){ checkAnswer(this); });
    v7.onMouseEvent(function(){ checkAnswer(this); });
    v8.onMouseEvent(function(){ checkAnswer(this); });
    
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
      var bubbles = Vegetables.getAllBubbles();
      for (var i = 0; i < bubbles.length; i++) {
      if (bubbles[i].getText() == "click") {
        bubbles[i].offMouseEvent().setColor("#ff0000").setText("  ?  ");
      }
      }
    }
  });
}

var Camels;
function who_is(){
  Camels = new ComicBubbles("pict4", {canvas: {fontFamily: 'Georgia', fontSize: '13px', fontWeight: 'bold', textAlign: 'center', lineHeight: 1.5, opacity: 0.6, bubbleStyle: 'arrow', responsive: true}}, {bubble: [
  {id: 'b1', text: "My father", x: 127, y: 20, width: 91, height: 21, background: '#1e90ff', tailLocation: 's', tailX: 173, tailY: 90},
  {id: 'b2', text: "My uncle", x: 237, y: 20, width: 91, height: 21, background: '#00ff7f', tailLocation: 's', tailX: 283, tailY: 90, visible: false},
  {id: 'b3', text: "Me", x: 340, y: 60, width: 'auto', height: 21, fontFamily: 'Arial', fontSize: '15px', background: '#dc143c', color: '#ffff00', opacity: 1, tailLocation: 's', tailX: 353, tailY: 140},
  {id: 'b4', text: "My brother", x: 420, y: 20, width: 91, height: 21, background: '#ffff00', tailLocation: 's', tailX: 466, tailY: 90, visible: false},
  {id: 'b5', text: "My sister", x: 535, y: 20, width: 91, height: 21, background: '#ff1493', tailLocation: 's', tailX: 581, tailY: 90}
  ]});
  Camels.onCanvasLoad(function(){
    if (this.getCanvasWidth() > 600) {
      this.getBubbleById('b2').show();
      this.getBubbleById('b4').show();
    }
    setTimeout(function(){ my_family(); }, 1500);
  });
}
function my_family(){
  Camels.getBubbleById('b1').hide().moveTo(127,-250,'fastest').show().moveTo(127,20,'fast');
  Camels.getBubbleById('b3').hide().moveTo(340,-250,'fastest').delay(300).show().moveTo(340,60,'fast');
  Camels.getBubbleById('b5').hide().moveTo(535,-250,'fastest').delay(600).show().moveTo(535,20,'fast');
  if (Camels.getCanvasWidth() > 600) {
    Camels.getBubbleById('b2').hide().moveTo(237,-250,'fastest').delay(150).show().moveTo(237,20,'fast');
    Camels.getBubbleById('b4').hide().moveTo(420,-250,'fastest').delay(450).show().moveTo(420,20,'fast');
  }
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
	sh_highlightDocument();
  which_is();
  who_is();
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
    <img id="pict5" src="pict5.jpg">
  </div>
  <div class="left">
<pre class="sh_javascript_dom">
var Vegetables;
function <button id="btn5" onclick="which_is()">which_is()</button>{

DestroyComicBubbles(Vegetables);

var click = 0;
var v = ["seler", "marchew", "burak", "pietruszka", "ziemniak", "czosnek", "cebula"].sort(function(){ return .5 - Math.random(); });

Vegetables = new ComicBubbles("pict5", {canvas: {width: 'auto', height: 'auto', fontSize: '22px', fontWeight: 'bold', textAlign: 'center', lineHeight: 1.5, color: '#8b0000', bubbleStyle: 'arrow', responsive: true}}, {bubble: [
  {id: 'v1', name: "kalarepa", text: "kalarepa", x: 60, y: 70, color: '#0000cd', tailLocation: 'se', tailX: 216, tailY: 205},
  {id: 'v2', name: "seler", text: "click", x: 635, y: 70, tailLocation: 'sw', tailX: 592, tailY: 147},
  {id: 'v3', name: "marchew", text: "click", x: 60, y: 215, tailLocation: 'e', tailX: 232, tailY: 249},
  {id: 'v4', name: "burak", text: "click", x: 340, y: 215, tailLocation: 'n', tailX: 372, tailY: 177},
  {id: 'v5', name: "pietruszka", text: "click", x: 635, y: 215, tailLocation: 'sw', tailX: 585, tailY: 302},
  {id: 'v6', name: "ziemniak", text: "click", x: 60, y: 380, tailLocation: 'ne', tailX: 197, tailY: 333},
  {id: 'v7', name: "czosnek", text: "click", x: 340, y: 380, tailLocation: 'ne', tailX: 488, tailY: 333},
  {id: 'v8', name: "cebula", text: "click", x: 635, y: 380, tailLocation: 'n', tailX: 676, tailY: 297},
  {id: 'q1', name: v[click], text: "Which is\n'"+v[click]+"' ?", className: 'question', x: 296, y: 45, width: 'auto', height: 'auto', fontFamily: 'Verdana', fontSize: '27px', background: '#000000', color: '#ffd700', opacity: 0.5, bubbleStyle: 'speak', tailLocation: 'n', tailX: 420, tailY: 0}
]});

Vegetables.onCanvasLoad(function(){
  
  var v2 = this.getBubbleById('v2'),
    v3 = this.getBubbleById('v3'),
    v4 = this.getBubbleById('v4'),
    v5 = this.getBubbleById('v5'),
    v6 = this.getBubbleById('v6'),
    v7 = this.getBubbleById('v7'),
    v8 = this.getBubbleById('v8'),
    q1 = this.getBubbleById('q1');

  v2.onMouseEvent(function(){ checkAnswer(this); });
  v3.onMouseEvent(function(){ checkAnswer(this); });
  v4.onMouseEvent(function(){ checkAnswer(this); });
  v5.onMouseEvent(function(){ checkAnswer(this); });
  v6.onMouseEvent(function(){ checkAnswer(this); });
  v7.onMouseEvent(function(){ checkAnswer(this); });
  v8.onMouseEvent(function(){ checkAnswer(this); });
  
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
    var bubbles = Vegetables.getAllBubbles();
    for (var i = 0; i < bubbles.length; i++) {
    if (bubbles[i].getText() == "click") {
      bubbles[i].offMouseEvent().setColor("#ff0000").setText("  ?  ");
    }
    }
  }
  
});

}
</pre>
  </div>
</div>
<div class="demo-spacer">&nbsp;</div>
<div id="fourth-demo" class="demo">
  <h2>Labeling people</h2>
  <div class="right">
    <img id="pict4" src="pict4.jpg">
  </div>
  <div class="left">
<pre class="sh_javascript_dom">
var Camels = new ComicBubbles("pict4", {canvas: {fontFamily: 'Georgia', fontSize: '13px', fontWeight: 'bold', textAlign: 'center', lineHeight: 1.5, opacity: 0.6, bubbleStyle: 'arrow', responsive: true}}, {bubble: [
  {id: 'b1', text: "My father", x: 127, y: 20, width: 91, height: 21, background: '#1e90ff', tailLocation: 's', tailX: 173, tailY: 90},
  {id: 'b2', text: "My uncle", x: 237, y: 20, width: 91, height: 21, background: '#00ff7f', tailLocation: 's', tailX: 283, tailY: 90, visible: false},
  {id: 'b3', text: "Me", x: 340, y: 60, width: 'auto', height: 21, fontFamily: 'Arial', fontSize: '15px', background: '#dc143c', color: '#ffff00', opacity: 1, tailLocation: 's', tailX: 353, tailY: 140},
  {id: 'b4', text: "My brother", x: 420, y: 20, width: 91, height: 21, background: '#ffff00', tailLocation: 's', tailX: 466, tailY: 90, visible: false},
  {id: 'b5', text: "My sister", x: 535, y: 20, width: 91, height: 21, background: '#ff1493', tailLocation: 's', tailX: 581, tailY: 90}
]});

Camels.onCanvasLoad(function(){
  
  if (this.getCanvasWidth() > 600) {
    this.getBubbleById('b2').show();
    this.getBubbleById('b4').show();
  }
  
  setTimeout(function(){ my_family(); }, 1500);
  
});
  
function <button id="btn4" onclick="my_family()">my_family()</button>{

Camels.getBubbleById('b1').hide().moveTo(127,-250,'fastest').show().moveTo(127,20,'fast');
Camels.getBubbleById('b3').hide().moveTo(340,-250,'fastest').delay(300).show().moveTo(340,60,'fast');
Camels.getBubbleById('b5').hide().moveTo(535,-250,'fastest').delay(600).show().moveTo(535,20,'fast');
if (Camels.getCanvasWidth() > 600) {
  Camels.getBubbleById('b2').hide().moveTo(237,-250,'fastest').delay(150).show().moveTo(237,20,'fast');
  Camels.getBubbleById('b4').hide().moveTo(420,-250,'fastest').delay(450).show().moveTo(420,20,'fast');
}

}
</pre>
  </div>
</div>
<div class="cb-spacer"></div>
<?php include 'footer.php'; ?>
</body>
</html>
