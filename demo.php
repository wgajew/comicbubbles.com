<!doctype html>
<html lang="en">
<head>
<?php
	include 'header.php';
?>
<script>

if (top.location != location) {
	top.location.href = document.location.href;
}

var Friends;
function let_them_talk(){
  DestroyComicBubbles(Friends);
  
	Friends = new ComicBubbles("pict1", {canvas: {fontFamily: 'Comic Sans MS', fontSize: '25px', fontWeight: 'bold', textAlign: 'center', lineHeight: 1.5, color: '#483d8b', responsive: true}}, {bubble: [
		{id: 'bub1', text: "Tell us\nmore\n about it ", className: 'anna', x: 242, y: 391, width: 'auto', height: 'auto', bubbleStyle: 'speak', tailLocation: 'nw', tailX: 213, tailY: 340, visible: false},
		{id: 'bub2', text: "I'm not that\ntype of person", className: 'adam', x: 354, y: 279, width: 'auto', height: 'auto', bubbleStyle: 'speak', tailLocation: 'n', tailX: 412, tailY: 216, visible: false},
		{id: 'bub3', text: "He's so\nshy..", className: 'dona', x: 646, y: 25, width: 'auto', height: 'auto', fontSize: '21px', opacity: 0.5, bubbleStyle: 'think', tailLocation: 's', tailX: 695, tailY: 153, visible: false}
	]});
  
  Friends.onCanvasLoad(function(){    
    this.addBubble({id: 'next1', text: "NEXT", className: 'next', x: 684, y: 466, width: 'auto', height: 'auto', fontFamily: 'Arial Black', background: '#ff4500', color: '#ffffff', opacity: 1, tailLocation: 'e', tailX: 785, tailY: 485, visible: false});
    var bub1 = this.getBubbleById('bub1'), bub2 = this.getBubbleById('bub2'), bub3 = this.getBubbleById('bub3'), next1 = this.getBubbleById('next1');
    bub1.delay(1000).pumpUp();
    bub2.delay(3000).fadeIn();
    bub3.delay(5000).pumpUp(function(){ next1.show(); });
    next1.onMouseEvent(function(){
      next1.delay(100).remove();
      bub1.hide().setText("Come on,\nwe want\ndetails!").setX(249).setY(373).setTailLocation('nw').setTailX(208).setTailY(328).delay(2000).fadeIn(200);
      bub2.hide().setText("Don't be\nso shy!").setX(443).setY(373).setTailLocation('ne').setTailX(597).setTailY(314).delay(200).fadeIn();
      bub3.hide().setText("To tell or\nnot to tell?..").setX(166).setY(8).setFontSize('19px').setFontWeight('normal').setOpacity(0.6).setTailLocation('se').setTailX(357).setTailY(80).delay(4000).fadeIn(function(){
        Friends.setReadonly(false);
        bub1.setReadonly(false);
        bub2.setReadonly(false);
        bub3.setReadonly(false);
      });
    });    
  });
}

var dogCat;
function dog_cat(){
  dogCat = new ComicBubbles("pict2", {canvas: {responsive: true}}, {bubble: [
    {id: 'bub2', text: "I am\n a happy \nCAT", className: 'cat', x: 427, y: 336, width: 'auto', height: 'auto', textAlign: 'center', lineHeight: 1.3, background: '#ff4500', color: '#ffffff', readonly: false, bubbleStyle: 'speak', tailLocation: 'nw', tailX: 413, tailY: 328},
    {id: 'bub1', text: "I am\n a happy \nDOG", className: 'dog', x: 93, y: 275, width: 'auto', height: 'auto', textAlign: 'center', lineHeight: 1.3, background: '#32cd32', bubbleStyle: 'speak', tailLocation: 'n', tailX: 138, tailY: 223}
  ]});
}
var dogAndCat;
function dog_and_cat(){
  DestroyComicBubbles(dogCat);
  DestroyComicBubbles(dogAndCat);

	var animals = ['BEAR','PIG','DEER','LION','HORSE','SNAKE','BIRD','FISH','COW','CAT','DOG'];
	dogAndCat = new ComicBubbles("pict2");
  
  dogAndCat.onCanvasLoad(function(){
    this.setResponsive(true);
    
    this.addBubble({id: 'bub1', text: "I'm\n a happy \n"+animals[0], className: 'dog', x: 93, y: 275, width: 'auto', height: 'auto', textAlign: 'center', lineHeight: 1.3, background: '#ff4500', color: '#ffffff', bubbleStyle: 'speak', tailLocation: 'n', tailX: 138, tailY: 223});
    this.addBubble({id: 'bub2', text: "crazy?", className: 'crazy', x: 342, y: 114, width: 'auto', height: 'auto', fontSize: '17px', textAlign: 'center', lineHeight: 1.3, background: '#483d8b', color: '#ffffff', opacity: 0.85, bubbleStyle: 'think', tailLocation: 's', tailX: 379, tailY: 209, visible: false});
    this.addBubble({id: 'bub3', text: "I'm\n a happy \n"+animals[10], className: 'cat', x: 427, y: 336, width: 'auto', height: 'auto', textAlign: 'center', lineHeight: 1.3, background: '#32cd32', bubbleStyle: 'speak', tailLocation: 'nw', tailX: 413, tailY: 328, visible: false});

    var bub1 = this.getBubbleById('bub1');
    var bub2 = this.getBubbleById('bub2');
    var bub3 = this.getBubbleById('bub3');
    bub1.delay(800).setText("I'm\n a happy \n"+animals[1], function(){
      bub2.fadeIn(1000).delay(2000).fadeOut(1000).remove(function(){ bub3.fadeIn(); });
    }).delay(800).setText("I'm\n a happy \n"+animals[2]).delay(800).setText("I'm\n a happy \n"+animals[3]).delay(800).setText("I'm\n a happy \n"+animals[4]).delay(800).setText("I'm\n a happy \n"+animals[5]).delay(800).setText("I'm\n a happy \n"+animals[6]).delay(800).setText("I'm\n a happy \n"+animals[7]).delay(800).setText("I'm\n a happy \n"+animals[8]).delay(800).setText("I'm\n a happy \n"+animals[9]).delay(1500, function(){
      bub1.setTailX(142).setTailY(290).moveTo(427,336,'fast').setTailLocation('nw').setTailX(413).setTailY(328).setReadonly(false);
      bub3.setTailX(467).setTailY(347).moveTo(93,275,'fast').setTailLocation('n').setTailX(138).setTailY(223);
    });
  });
}
var Bear;
function roaring(){
	Bear = new ComicBubbles("pict3", {canvas: {responsive: true}}, {bubble:
	{id: 'bear1', text: "ROAAAR!", x: 70, y: 262, width: 113, height: 37, fontFamily: 'Comic Sans MS', fontSize: '23px', fontWeight: 'bold', textAlign: 'center', lineHeight: 1.5, background: '#dc143c', color: '#7fff00', bubbleStyle: 'scream', tailLocation: 'n', tailX: 127, tailY: 181}
	});
  
  Bear.onCanvasLoad(function(){
    var bear1 = this.getBubbleById('bear1');
    var roar = false;
    bear1.onMouseEvent(function(){
      if (!roar) {
        roar = true;
        var bg = this.getBackground();
        var col = this.getColor();
        this.hide().setBackground(col).setColor(bg).fadeIn(150).delay(50).setX(69).setY(261).delay(50).setX(71).setY(261).delay(50).setX(69).setY(263).delay(50).setX(71).setY(263).delay(50).setX(70).setY(262).delay(50).setX(69).setY(261).delay(50).setX(71).setY(261).delay(50).setX(69).setY(263).delay(50).setX(71).setY(263).delay(50).setX(70).setY(262).delay(50).setX(69).setY(261).delay(50).setX(71).setY(261).delay(50).setX(69).setY(263).delay(50).setX(71).setY(263).delay(50).setX(70).setY(262).delay(50).setX(69).setY(261).delay(50).setX(71).setY(261).delay(50).setX(69).setY(263).delay(50).setX(71).setY(263).delay(50).setX(70).setY(262, function(){ roar = false; });
      }
    });
  });
}
function roar(){
	var bear1 = Bear.getBubbleById('bear1');
	var bg = bear1.getBackground();
	var col = bear1.getColor();
	bear1.hide().setBackground(col).setColor(bg).fadeIn(150).delay(50).setX(69).setY(261).delay(50).setX(71).setY(261).delay(50).setX(69).setY(263).delay(50).setX(71).setY(263).delay(50).setX(70).setY(262).delay(50).setX(69).setY(261).delay(50).setX(71).setY(261).delay(50).setX(69).setY(263).delay(50).setX(71).setY(263).delay(50).setX(70).setY(262).delay(50).setX(69).setY(261).delay(50).setX(71).setY(261).delay(50).setX(69).setY(263).delay(50).setX(71).setY(263).delay(50).setX(70).setY(262).delay(50).setX(69).setY(261).delay(50).setX(71).setY(261).delay(50).setX(69).setY(263).delay(50).setX(71).setY(263).delay(50).setX(70).setY(262);
}

function outputOnOff(b){
	var c = document.getElementById("first-demo-output");
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
  let_them_talk();
  dog_cat();
  roaring();
}
</script>
</head>
<body onload="cb()">
<?php
	$page = "demo";
	include 'menu.php';
?>
<div id="first-demo" class="demo">
  <h2>Dialogs</h2>
  <div id="first-demo-output" class="demo-output">
    <div id="pict1-comic-bubbles-output"></div>
  </div>
  <div class="right">
    <div id="first-demo-output-btn" onclick="outputOnOff(this)">SHOW OUTPUT</div>
    <img id="pict1" src="pict1.jpg">
  </div>
  <div class="left">
<pre class="sh_javascript_dom">
var Friends;
function <button id="btn1" onclick="let_them_talk()">let_them_talk()</button>{

DestroyComicBubbles(Friends);

Friends = new ComicBubbles("pict1", {canvas: {fontFamily: 'Comic Sans MS', fontSize: '25px', fontWeight: 'bold', textAlign: 'center', lineHeight: 1.5, color: '#483d8b', responsive: true}}, {bubble: [
  {id: 'bub1', text: "Tell us\nmore\n about it ", className: 'anna', x: 242, y: 391, width: 'auto', height: 'auto', bubbleStyle: 'speak', tailLocation: 'nw', tailX: 213, tailY: 340, visible: false},
  {id: 'bub2', text: "I'm not that\ntype of person", className: 'adam', x: 354, y: 279, width: 'auto', height: 'auto', bubbleStyle: 'speak', tailLocation: 'n', tailX: 412, tailY: 216, visible: false},
  {id: 'bub3', text: "He's so\nshy..", className: 'dona', x: 646, y: 25, width: 'auto', height: 'auto', fontSize: '21px', opacity: 0.5, bubbleStyle: 'think', tailLocation: 's', tailX: 695, tailY: 153, visible: false}
]});

Friends.onCanvasLoad(function(){
  
  this.addBubble({id: 'next1', text: "NEXT", className: 'next', x: 684, y: 466, width: 'auto', height: 'auto', fontFamily: 'Arial Black', background: '#ff4500', color: '#ffffff', opacity: 1, tailLocation: 'e', tailX: 785, tailY: 485, visible: false});
  
  var bub1 = this.getBubbleById('bub1'), bub2 = this.getBubbleById('bub2'), bub3 = this.getBubbleById('bub3'), next1 = this.getBubbleById('next1');
  
  bub1.delay(1000).pumpUp();
  bub2.delay(3000).fadeIn();
  bub3.delay(5000).pumpUp(function(){ next1.show(); });
  
  next1.onMouseEvent(function(){
    next1.delay(100).remove();
    bub1.hide().setText("Come on,\nwe want\ndetails!").setX(249).setY(373).setTailLocation('nw').setTailX(208).setTailY(328).delay(2000).fadeIn(200);
    bub2.hide().setText("Don't be\nso shy!").setX(443).setY(373).setTailLocation('ne').setTailX(597).setTailY(314).delay(200).fadeIn();
    bub3.hide().setText("To tell or\nnot to tell?..").setX(166).setY(8).setFontSize('19px').setFontWeight('normal').setOpacity(0.6).setTailLocation('se').setTailX(357).setTailY(80).delay(4000).fadeIn(function(){
      Friends.setReadonly(false);
      bub1.setReadonly(false);
      bub2.setReadonly(false);
      bub3.setReadonly(false);
    });
  });

});

}
</pre>
  </div>
</div>
<div class="demo-spacer">&nbsp;</div>
<div id="second-demo" class="demo">
  <h2>Funny scenes</h2>
  <div class="right">
    <img id="pict2" src="pict2.jpg">
    <img id="pict3" src="pict3.jpg">
  </div>
  <div class="left">
<pre class="sh_javascript_dom">
var dogCat = new ComicBubbles("pict2", {canvas: {responsive: true}}, {bubble: [
  {id: 'bub2', text: "I am\na happy\nCAT", className: 'cat', x: 427, y: 336, width: 'auto', height: 'auto', textAlign: 'center', lineHeight: 1.3, background: '#ff4500', color: '#ffffff', readonly: false, bubbleStyle: 'speak', tailLocation: 'nw', tailX: 413, tailY: 328},
  {id: 'bub1', text: "I am\na happy\nDOG", className: 'dog', x: 93, y: 275, width: 'auto', height: 'auto', textAlign: 'center', lineHeight: 1.3, background: '#32cd32', bubbleStyle: 'speak', tailLocation: 'n', tailX: 138, tailY: 223}
]});

var dogAndCat;
function <button id="btn2" onclick="dog_and_cat()">dog_and_cat()</button>{

DestroyComicBubbles(dogCat);
DestroyComicBubbles(dogAndCat);

var animals = ['BEAR','PIG','DEER','LION','HORSE','SNAKE','BIRD','FISH','COW','CAT','DOG'];
dogAndCat = new ComicBubbles("pict2");

dogAndCat.onCanvasLoad(function(){
  
  this.setResponsive(true);
  
  this.addBubble({id: 'bub1', text: "I'm\na happy\n"+animals[0], className: 'dog', x: 93, y: 275, width: 'auto', height: 'auto', textAlign: 'center', lineHeight: 1.3, background: '#ff4500', color: '#ffffff', bubbleStyle: 'speak', tailLocation: 'n', tailX: 138, tailY: 223});
  this.addBubble({id: 'bub2', text: "crazy?", className: 'crazy', x: 342, y: 114, width: 'auto', height: 'auto', fontSize: '17px', textAlign: 'center', lineHeight: 1.3, background: '#483d8b', color: '#ffffff', opacity: 0.85, bubbleStyle: 'think', tailLocation: 's', tailX: 379, tailY: 209, visible: false});
  this.addBubble({id: 'bub3', text: "I'm\na happy\n"+animals[10], className: 'cat', x: 427, y: 336, width: 'auto', height: 'auto', textAlign: 'center', lineHeight: 1.3, background: '#32cd32', bubbleStyle: 'speak', tailLocation: 'nw', tailX: 413, tailY: 328, visible: false});

  var bub1 = this.getBubbleById('bub1'), bub2 = this.getBubbleById('bub2'), bub3 = this.getBubbleById('bub3');
  
  bub1.delay(800).setText("I'm\na happy\n"+animals[1], function(){
    bub2.fadeIn(1000).delay(2000).fadeOut(1000).remove(function(){ bub3.fadeIn(); });
  }).delay(800).setText("I'm\na happy\n"+animals[2]).delay(800).setText("I'm\na happy\n"+animals[3]).delay(800).setText("I'm\na happy\n"+animals[4]).delay(800).setText("I'm\na happy\n"+animals[5]).delay(800).setText("I'm\na happy\n"+animals[6]).delay(800).setText("I'm\na happy\n"+animals[7]).delay(800).setText("I'm\na happy\n"+animals[8]).delay(800).setText("I'm\na happy\n"+animals[9]).delay(1500, function(){
    bub1.setTailX(142).setTailY(290).moveTo(427,336,'fast').setTailLocation('nw').setTailX(413).setTailY(328).setReadonly(false);
    bub3.setTailX(467).setTailY(347).moveTo(93,275,'fast').setTailLocation('n').setTailX(138).setTailY(223);
  });

});

}
</pre>
<pre class="sh_javascript_dom bear">

var Bear = new ComicBubbles("pict3", {canvas: {responsive: true}}, {bubble:
  {id: 'bear1', text: "ROAAAR!", x: 70, y: 262, width: 113, height: 37, fontFamily: 'Comic Sans MS', fontSize: '23px', fontWeight: 'bold', textAlign: 'center', lineHeight: 1.5, background: '#dc143c', color: '#7fff00', bubbleStyle: 'scream', tailLocation: 'n', tailX: 127, tailY: 181}
});
function <button id="btn3" onclick="roar()">roar()</button>{

var bear1 = Bear.getBubbleById('bear1');
var bg = bear1.getBackground();
var col = bear1.getColor();

bear1.hide().setBackground(col).setColor(bg).fadeIn(150).delay(50).setX(69).setY(261).delay(50).setX(71).setY(261).delay(50).setX(69).setY(263).delay(50).setX(71).setY(263).delay(50).setX(70).setY(262).delay(50).setX(69).setY(261).delay(50).setX(71).setY(261).delay(50).setX(69).setY(263).delay(50).setX(71).setY(263).delay(50).setX(70).setY(262).delay(50).setX(69).setY(261).delay(50).setX(71).setY(261).delay(50).setX(69).setY(263).delay(50).setX(71).setY(263).delay(50).setX(70).setY(262).delay(50).setX(69).setY(261).delay(50).setX(71).setY(261).delay(50).setX(69).setY(263).delay(50).setX(71).setY(263).delay(50).setX(70).setY(262);

}
</pre>
  </div>
</div>
<div class="cb-spacer"></div>
<?php include 'footer.php'; ?>
</body>
</html>
