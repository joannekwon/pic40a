var speed = 40;
var advance = 2;
var scroll;
var left_offset = 100;
var pause;

function init() {
   scroll = document.getElementById("scroll");
   scroll.style.position = "relative";
   pause = false;
   move();
}

function move() {
   if (pause) {
      return;
   }
   scroll.style.left = left_offset + "px";
   left_offset -= advance;
   setTimeout("move()", speed);
}

function stop(node) {
   if (pause) {
      pause = false;
      move();
   }
   else {
      pause = true;
   }
}