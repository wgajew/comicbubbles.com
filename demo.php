<!doctype html>
<html>
<head>
  <meta charset="utf-8">
	<title>ComicBubbles - speech bubble JavaScript library</title>
<?php
	include 'header.php';
?>
<script>
var people_cb;
function people(){
	people_cb = new ComicBubbles("pict1", {canvas: {fontFamily: '"Comic Sans MS", cursive, sans-serif', fontSize: '25px', fontWeight: 'bold', textAlign: 'center', color: '#483d8b'}}, {bubble: [
		{id: 'bub1', text: "Tell us more about it", x: 242, y: 391, width: 130, height: 109, bubbleStyle: 'speak', tailLocation: 'nw', tailX: 213, tailY: 340, visible: false},
		{id: 'bub2', text: "I'm not that type of person", x: 354, y: 279, width: 184, height: 79, bubbleStyle: 'speak', tailLocation: 'n', tailX: 412, tailY: 216, visible: false},
		{id: 'bub3', text: "He's so\nshy..", x: 646, y: 25, width: 94, height: 62, fontSize: '21px', opacity: 0.5, bubbleStyle: 'think', tailLocation: 's', tailX: 695, tailY: 153, visible: false}
	]});
	people_cb.addBubble({id: 'next1', text: "NEXT", x: 684, y: 466, width: 88, height: 38, fontFamily: '"Arial Black", Gadget, sans-serif', background: '#ff4500', color: '#ffffff', opacity: 1, bubbleStyle: 'arrow', tailLocation: 'e', tailX: 793, tailY: 485, visible: false});
	var bub1 = people_cb.getBubbleById('bub1'), bub2 = people_cb.getBubbleById('bub2'), bub3 = people_cb.getBubbleById('bub3'), next1 = people_cb.getBubbleById('next1');
	bub1.delay(1000).fadeIn();
	bub2.delay(3000).fadeIn();
	bub3.delay(5000).fadeIn(function(){ next1.show(); });
	next1.onMouseEvent(function(){
		next1.delay(100).remove();
		bub1.hide().setText("C'mon,\nwe want details!").setX(249).setY(373).setWidth(115).setHeight(109).setTailLocation('nw').setTailX(208).setTailY(328).delay(2000).fadeIn(200);
		bub2.hide().setText("Don't be\nso shy!").setX(443).setY(373).setWidth(117).setHeight(77).setTailLocation('ne').setTailX(597).setTailY(314).delay(200).fadeIn();
		bub3.hide().setText("To tell or\nnot to tell?..").setX(166).setY(8).setWidth('auto').setHeight('auto').setFontSize('19px').setFontWeight('normal').setOpacity(0.6).setTailLocation('se').setTailX(357).setTailY(80).delay(4000).fadeIn(function(){
			people_cb.setReadonly(false);
			bub1.setReadonly(false);
			bub2.setReadonly(false);
			bub3.setReadonly(false);
		});
	});
}
function dog_cat(){
	new ComicBubbles("pict2", {bubble: [
	{id: 'bub2', text: "I'm\na happy\nCAT", x: 427, y: 336, width: 64, height: 66, textAlign: 'center', background: '#ff4500', color: '#ffffff', readonly: false, bubbleStyle: 'speak', tailLocation: 'nw', tailX: 413, tailY: 328},
	{id: 'bub1', text: "I'm\na happy\nDOG", x: 93, y: 275, width: 64, height: 66, textAlign: 'center', background: '#32cd32', bubbleStyle: 'speak', tailLocation: 'n', tailX: 138, tailY: 223}
	]});
}
function dog_and_cat(){
	var animals = ['BEAR','PIG','DEER','LION','HORSE','SNAKE','BIRD','FISH','COW','CAT','DOG'];
	var dog_cat_cb = new ComicBubbles("pict2");
	dog_cat_cb.addBubble({id: 'bub1', text: "I'm\na happy\n"+animals[0], x: 93, y: 275, width: 64, height: 66, textAlign: 'center', background: '#ff4500', color: '#ffffff', bubbleStyle: 'speak', tailLocation: 'n', tailX: 138, tailY: 223});
	dog_cat_cb.addBubble({id: 'bub2', text: "crazy?", x: 342, y: 114, width: 54, height: 28, fontSize: '17px', textAlign: 'center', background: '#483d8b', color: '#ffffff', opacity: 0.85, bubbleStyle: 'think', tailLocation: 's', tailX: 379, tailY: 209, visible: false});
	dog_cat_cb.addBubble({id: 'bub3', text: "I'm\na happy\n"+animals[10], x: 427, y: 336, width: 64, height: 66, textAlign: 'center', background: '#32cd32', bubbleStyle: 'speak', tailLocation: 'nw', tailX: 413, tailY: 328, visible: false});
	var bub1 = dog_cat_cb.getBubbleById('bub1');
	var bub2 = dog_cat_cb.getBubbleById('bub2');
	var bub3 = dog_cat_cb.getBubbleById('bub3');
	bub1.delay(800).setText("I'm\na happy\n"+animals[1], function(){
		bub2.fadeIn(1000).delay(2000).fadeOut(1000).remove(function(){ bub3.fadeIn(); });
	}).delay(800).setText("I'm\na happy\n"+animals[2]).delay(800).setText("I'm\na happy\n"+animals[3]).delay(800).setText("I'm\na happy\n"+animals[4]).delay(800).setText("I'm\na happy\n"+animals[5]).delay(800).setText("I'm\na happy\n"+animals[6]).delay(800).setText("I'm\na happy\n"+animals[7]).delay(800).setText("I'm\na happy\n"+animals[8]).delay(800).setText("I'm\na happy\n"+animals[9]).delay(1500, function(){
		bub1.setTailX(142).setTailY(290).moveTo(427,336,'fast').setTailLocation('nw').setTailX(413).setTailY(328).setReadonly(false);
		bub3.setTailX(467).setTailY(347).moveTo(93,275,'fast').setTailLocation('n').setTailX(138).setTailY(223);
	});
}
var bear_cb;
function bear(){
	bear_cb = new ComicBubbles("pict3",{bubble:
	{id: 'bear1', text: "ROAAAR!", x: 70, y: 262, width: 113, height: 37, fontFamily: '"Comic Sans MS", cursive, sans-serif', fontSize: '23px', fontWeight: 'bold', textAlign: 'center', background: '#dc143c', color: '#7fff00', bubbleStyle: 'scream', tailLocation: 'n', tailX: 127, tailY: 181}
	});
	var bear1 = bear_cb.getBubbleById('bear1');
	var roar = false;
	bear1.onMouseEvent(function(){
		if (!roar) {
			roar = true;
			var bg = bear1.getBackground();
			var col = bear1.getColor();
			bear1.hide().setBackground(col).setColor(bg).fadeIn(150).delay(50).setX(69).setY(261).delay(50).setX(71).setY(261).delay(50).setX(69).setY(263).delay(50).setX(71).setY(263).delay(50).setX(70).setY(262).delay(50).setX(69).setY(261).delay(50).setX(71).setY(261).delay(50).setX(69).setY(263).delay(50).setX(71).setY(263).delay(50).setX(70).setY(262).delay(50).setX(69).setY(261).delay(50).setX(71).setY(261).delay(50).setX(69).setY(263).delay(50).setX(71).setY(263).delay(50).setX(70).setY(262).delay(50).setX(69).setY(261).delay(50).setX(71).setY(261).delay(50).setX(69).setY(263).delay(50).setX(71).setY(263).delay(50).setX(70).setY(262, function(){ roar = false; });
		}
	});
}
function roar(){
	var bear1 = bear_cb.getBubbleById('bear1');
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
	new ComicBubbles("main-cb", {bubble:
		{id: 'b1464800593928', text: "ComicBubbles is\na speech bubble\nJavaScript library", x: 40, y: 13, width: 108, height: 44, fontFamily: 'Verdana, Geneva, sans-serif', fontSize: '12px', textAlign: 'center', background: '#ffffff', color: '#000000', opacity: 0.7, bubbleStyle: 'speak', tailLocation: 'nw', tailX: 0, tailY: 0}
	});
	sh_highlightDocument();
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
    <img id="pict1" src="pict1.jpg" width="800" height="530" onload="people()">
  </div>
  <div class="left">
<pre class="sh_javascript_dom">
function <button id="btn1" onclick="people()">people()</button>{

var people_cb = new ComicBubbles("pict1", {canvas: {fontFamily: '"Comic Sans MS", cursive, sans-serif', fontSize: '25px', fontWeight: 'bold', textAlign: 'center', color: '#483d8b'}}, {bubble: [
	{id: 'bub1', text: "Tell us more about it", x: 242, y: 391, width: 130, height: 109, bubbleStyle: 'speak', tailLocation: 'nw', tailX: 213, tailY: 340, visible: false},
	{id: 'bub2', text: "I'm not that type of person", x: 354, y: 279, width: 184, height: 79, bubbleStyle: 'speak', tailLocation: 'n', tailX: 412, tailY: 216, visible: false},
	{id: 'bub3', text: "He's so\nshy..", x: 646, y: 25, width: 94, height: 62, fontSize: '21px', opacity: 0.5, bubbleStyle: 'think', tailLocation: 's', tailX: 695, tailY: 153, visible: false}
]});

people_cb<wbr>.addBubble({id: 'next1', text: "NEXT", x: 684, y: 466, width: 88, height: 38, fontFamily: '"Arial Black", Gadget, sans-serif', background: '#ff4500', color: '#ffdab9', opacity: 1, bubbleStyle: 'arrow', tailLocation: 'e', tailX: 793, tailY: 485, visible: false});

var bub1 = people_cb<wbr>.getBubbleById('bub1'),
	bub2 = people_cb<wbr>.getBubbleById('bub2'),
	bub3 = people_cb<wbr>.getBubbleById('bub3'),
	next1 = people_cb<wbr>.getBubbleById('next1');

bub1<wbr>.delay(1000)<wbr>.fadeIn();
bub2<wbr>.delay(3000)<wbr>.fadeIn();
bub3<wbr>.delay(5000)<wbr>.fadeIn(function(){ next1<wbr>.show(); });

next1<wbr>.onMouseEvent(function(){
	next1<wbr>.delay(100)<wbr>.remove();
	bub1<wbr>.hide()<wbr>.setText("C'mon,\nwe want details!")<wbr>.setX(249)<wbr>.setY(373)<wbr>.setWidth(115)<wbr>.setHeight(109)<wbr>.setTailLocation('nw')<wbr>.setTailX(208)<wbr>.setTailY(328)<wbr>.delay(2000)<wbr>.fadeIn(200);
	bub2<wbr>.hide()<wbr>.setText("Don't be\nso shy!")<wbr>.setX(443)<wbr>.setY(373)<wbr>.setWidth(117)<wbr>.setHeight(77)<wbr>.setTailLocation('ne')<wbr>.setTailX(597)<wbr>.setTailY(314)<wbr>.delay(200)<wbr>.fadeIn();
	bub3<wbr>.hide()<wbr>.setText("To tell or\nnot to tell?..")<wbr>.setX(166)<wbr>.setY(8)<wbr>.setWidth('auto')<wbr>.setHeight('auto')<wbr>.setFontSize('19px')<wbr>.setFontWeight('normal')<wbr>.setOpacity(0.6)<wbr>.setTailLocation('se')<wbr>.setTailX(357)<wbr>.setTailY(80)<wbr>.delay(4000)<wbr>.fadeIn(function(){
		people_cb<wbr>.setReadonly(false);
		bub1<wbr>.setReadonly(false);
		bub2<wbr>.setReadonly(false);
		bub3<wbr>.setReadonly(false);
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
    <img id="pict2" src="pict2.jpg" width="517" height="424" onload="dog_cat()">
    <img id="pict3" src="pict3.jpg" width="283" height="424" onload="bear()">
  </div>
  <div class="left">
<pre class="sh_javascript_dom">
function <button id="btn2" onclick="dog_and_cat()">dog_and_cat()</button>{

var dog_cat_cb = new ComicBubbles("pict2"),
	animals = ['BEAR', 'PIG', 'DEER', 'LION', 'HORSE', 'SNAKE', 'BIRD', 'FISH', 'COW', 'CAT', 'DOG'];

dog_cat_cb<wbr>.addBubble({id: 'bub1', text: "I'm\na happy\n"+animals[0], x: 93, y: 275, width: 64, height: 66, textAlign: 'center', background: '#ff4500', color: '#ffffff', bubbleStyle: 'speak', tailLocation: 'n', tailX: 138, tailY: 223});
dog_cat_cb<wbr>.addBubble({id: 'bub2', text: "crazy?", x: 342, y: 114, width: 54, height: 28, fontSize: '17px', textAlign: 'center', background: '#483d8b', color: '#ffffff', opacity: 0.85, bubbleStyle: 'think', tailLocation: 's', tailX: 379, tailY: 209, visible: false});
dog_cat_cb<wbr>.addBubble({id: 'bub3', text: "I'm\na happy\n"+animals[10], x: 427, y: 336, width: 64, height: 66, textAlign: 'center', background: '#32cd32', bubbleStyle: 'speak', tailLocation: 'nw', tailX: 413, tailY: 328, visible: false});

var bub1 = dog_cat_cb<wbr>.getBubbleById('bub1'),
	bub2 = dog_cat_cb<wbr>.getBubbleById('bub2'),
	bub3 = dog_cat_cb<wbr>.getBubbleById('bub3');

bub1<wbr>.delay(800)<wbr>.setText("I'm\na happy\n"+animals[1], function(){
	bub2<wbr>.fadeIn(1000)<wbr>.delay(2000)<wbr>.fadeOut(1000)<wbr>.remove(function(){ bub3<wbr>.fadeIn(); });
})<wbr>.delay(800)<wbr>.setText("I'm\na happy\n"+animals[2])<wbr>.delay(800)<wbr>.setText("I'm\na happy\n"+animals[3])<wbr>.delay(800)<wbr>.setText("I'm\na happy\n"+animals[4])<wbr>.delay(800)<wbr>.setText("I'm\na happy\n"+animals[5])<wbr>.delay(800)<wbr>.setText("I'm\na happy\n"+animals[6])<wbr>.delay(800)<wbr>.setText("I'm\na happy\n"+animals[7])<wbr>.delay(800)<wbr>.setText("I'm\na happy\n"+animals[8])<wbr>.delay(800)<wbr>.setText("I'm\na happy\n"+animals[9])<wbr>.delay(1500, function(){
	bub1<wbr>.setTailX(142)<wbr>.setTailY(290)<wbr>.moveTo(427,336,'fast')<wbr>.setTailLocation('nw')<wbr>.setTailX(413)<wbr>.setTailY(328)<wbr>.setReadonly(false);
	bub3<wbr>.setTailX(467)<wbr>.setTailY(347)<wbr>.moveTo(93,275,'fast')<wbr>.setTailLocation('n')<wbr>.setTailX(138)<wbr>.setTailY(223);
});

}
</pre>
<pre class="sh_javascript_dom">


var bear_cb = new ComicBubbles("pict3",{bubble:
	{id: 'bear1', text: "ROAAAR!", x: 70, y: 262, width: 113, height: 37, fontFamily: '"Comic Sans MS", cursive, sans-serif', fontSize: '23px', fontWeight: 'bold', textAlign: 'center', background: '#dc143c', color: '#7fff00', bubbleStyle: 'scream', tailLocation: 'n', tailX: 127, tailY: 181}
});
function <button id="btn3" onclick="roar()">roar()</button>{

var bear1 = bear_cb<wbr>.getBubbleById('bear1'),
	bg = bear1<wbr>.getBackground(),
	col = bear1<wbr>.getColor();

bear1<wbr>.hide()<wbr>.setBackground(col)<wbr>.setColor(bg)<wbr>.fadeIn(150)<wbr>.delay(50)<wbr>.setX(69)<wbr>.setY(261)<wbr>.delay(50)<wbr>.setX(71)<wbr>.setY(261)<wbr>.delay(50)<wbr>.setX(69)<wbr>.setY(263)<wbr>.delay(50)<wbr>.setX(71)<wbr>.setY(263)<wbr>.delay(50)<wbr>.setX(70)<wbr>.setY(262)<wbr>.delay(50)<wbr>.setX(69)<wbr>.setY(261)<wbr>.delay(50)<wbr>.setX(71)<wbr>.setY(261)<wbr>.delay(50)<wbr>.setX(69)<wbr>.setY(263)<wbr>.delay(50)<wbr>.setX(71)<wbr>.setY(263)<wbr>.delay(50)<wbr>.setX(70)<wbr>.setY(262)<wbr>.delay(50)<wbr>.setX(69)<wbr>.setY(261)<wbr>.delay(50)<wbr>.setX(71)<wbr>.setY(261)<wbr>.delay(50)<wbr>.setX(69)<wbr>.setY(263)<wbr>.delay(50)<wbr>.setX(71)<wbr>.setY(263)<wbr>.delay(50)<wbr>.setX(70)<wbr>.setY(262)<wbr>.delay(50)<wbr>.setX(69)<wbr>.setY(261)<wbr>.delay(50)<wbr>.setX(71)<wbr>.setY(261)<wbr>.delay(50)<wbr>.setX(69)<wbr>.setY(263)<wbr>.delay(50)<wbr>.setX(71)<wbr>.setY(263)<wbr>.delay(50)<wbr>.setX(70)<wbr>.setY(262);

}
</pre>
  </div>
</div>
<div class="cb-spacer"></div>
<?php include 'footer.php'; ?>
</body>
</html>
