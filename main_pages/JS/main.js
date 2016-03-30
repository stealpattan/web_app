function obj_move(){
  var element = document.getElementById("obj");
  document.body.appendChild(element);

  element.style.position = "fixed";
  element.style.width = "200px";
  element.style.height = "200px";
  element.style.border = "";
  element.style.backgroundColor = "";
  var pos_x = 0.0;
  var pos_y = 0.0;

  var spd_x = 0.5;
  var spd_y = 0.5;
  // この下で時間経過による繰り返し処理を記述しています。
  //
  setInterval(function(){
    pos_x += spd_x;
    pos_y += spd_y;

    element.style.left = (pos_x) + "px";
    element.style.top = (pos_y) + "px";
  }, 10);
}

//以下は、コメントボックスの生成に使っている場所です
var posx, posy, spdx, spdy;
spdx = 0.5;
spdy = 0.5;
function obj_set(px, py){
  var w_x = window.innerWidth;
  var w_y = window.innerHeight;
  posx = px + 50;
  posy = py - 200;
  var element1 = document.getElementById("obj1");
  document.body.appendChild(element1);
  element1.style.position = "fixed";
  element1.style.width = "300px";
  element1.style.height = "150px";
  element1.style.border = "3px solid #7fffd4";
  element1.style.backgroundColor = "white";
  element1.style.left = (posx) + "px";
  element1.style.top = (posy) + "px";
  // setInterval(function(){
  //   posx += spdx;
  //   posy += spdy;
  //   element1.style.left = (posx) + "px";
  //   element1.style.top = (posy) + "px";
  // },10);
  posx = px + 450;
  posy = py;
  var element2 = document.getElementById("obj2");
  document.body.appendChild(element2);
  element2.style.position = "fixed";
  element2.style.width = "300px";
  element2.style.height = "150px";
  element2.style.border = "3px solid #7fffd4";
  element2.style.backgroundColor = "white";
  element2.style.left = (posx) + "px";
  element2.style.top = (posy) + "px";

  posx = px + 300;
  posy = py + 250;
  var element3 = document.getElementById("obj3");
  document.body.appendChild(element3);
  element3.style.position = "fixed";
  element3.style.width = "300px";
  element3.style.height = "150px";
  element3.style.border = "3px solid #7fffd4";
  element3.style.backgroundColor = "white";
  element3.style.left = (posx) + "px";
  element3.style.top = (posy) + "px";

  posx = px - 200;
  posy = py + 250;
  var element4 = document.getElementById("obj4");
  document.body.appendChild(element4);
  element4.style.position = "fixed";
  element4.style.width = "300px";
  element4.style.height = "150px";
  element4.style.border = "3px solid #7fffd4";
  element4.style.backgroundColor = "white";
  element4.style.left = (posx) + "px";
  element4.style.top = (posy) + "px";

  posx = px - 350;
  posy = py;
  var element5 = document.getElementById("obj5");
  document.body.appendChild(element5);
  element5.style.position = "fixed";
  element5.style.width = "300px";
  element5.style.height = "150px";
  element5.style.border = "3px solid #7fffd4";
  element5.style.backgroundColor = "white";
  element5.style.left = (posx) + "px";
  element5.style.top = (posy) + "px";
}
