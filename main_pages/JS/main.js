function obj_move(){
  var element = document.getElementById("obj");
  document.body.appendChild(element);

  element.style.position = "absolute";
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
var posx = new Array(5);
var posy = new Array(5);

for (var i = 0; i < 5; i++) {
  posx[i] = new Array(5);
}

var spdx, spdy;
spdx = 0.5;
spdy = 0.5;
function obj_set(px, py){
  var w_x = window.innerWidth;
  var w_y = window.innerHeight;
  posx[0] = px + 50;
  posy[0] = py - 200;
  posx[0][0] = 1;
  var element1 = document.getElementById("obj1");
  document.body.appendChild(element1);
  element1.style.position = "absolute";
  element1.style.width = "300px";
  element1.style.height = "150px";
  element1.style.border = "3px solid #7fffd4";
  element1.style.backgroundColor = "white";
  element1.style.left = (posx[0]) + "px";
  element1.style.top = (posy[0]) + "px";
  // setInterval(function(){
  //   posx += spdx;
  //   posy += spdy;
  //   element1.style.left = (posx) + "px";
  //   element1.style.top = (posy) + "px";
  // },10);
  posx[1] = px + 450;
  posy[1] = py;
  posx[1][1] = 2;
  var element2 = document.getElementById("obj2");
  document.body.appendChild(element2);
  element2.style.position = "absolute";
  element2.style.width = "300px";
  element2.style.height = "150px";
  element2.style.border = "3px solid #7fffd4";
  element2.style.backgroundColor = "white";
  element2.style.left = (posx[1]) + "px";
  element2.style.top = (posy[1]) + "px";

  posx[2] = px + 300;
  posy[2] = py + 250;
  posx[2][2] = 3;
  var element3 = document.getElementById("obj3");
  document.body.appendChild(element3);
  element3.style.position = "absolute";
  element3.style.width = "300px";
  element3.style.height = "150px";
  element3.style.border = "3px solid #7fffd4";
  element3.style.backgroundColor = "white";
  element3.style.left = (posx[2]) + "px";
  element3.style.top = (posy[2]) + "px";

  posx[3] = px - 200;
  posy[3] = py + 250;
  posx[3][3] = 4;
  var element4 = document.getElementById("obj4");
  document.body.appendChild(element4);
  element4.style.position = "absolute";
  element4.style.width = "300px";
  element4.style.height = "150px";
  element4.style.border = "3px solid #7fffd4";
  element4.style.backgroundColor = "white";
  element4.style.left = (posx[3]) + "px";
  element4.style.top = (posy[3]) + "px";

  posx[4] = px - 350;
  posy[4] = py;
  posx[4][4] = 5;
  var element5 = document.getElementById("obj5");
  document.body.appendChild(element5);
  element5.style.position = "absolute";
  element5.style.width = "300px";
  element5.style.height = "150px";
  element5.style.border = "3px solid #7fffd4";
  element5.style.backgroundColor = "white";
  element5.style.left = (posx[4]) + "px";
  element5.style.top = (posy[4]) + "px";
}


function obj_move(){
  var remx,remy;// 各要素間の差を算出するための変数
  setInterval(function(){
    //要素を動かす処理を書いていきます。
    // name.style.left = position;
    // name.style.top = position;
    // positionをどうにかして増やす（インクリメント）
    //
  }, 10);
}





//具体的な位置指定はしていません。
// オブジェクトの位置idから算出させるようにしたい物です
// javascriptにはクラスの定義の仕方がないようなのです！
var obj_posx, obj_posy;
function get_obj_position(ojb_name, obj_id, main_posX, main_posY){
  var obj_x, obj_y;
  var element = document.getElementById(obj_name);
  document.body.appendChild(element);
  element.style.position = "absolute";
  element.style.width = 300 + "px";
  element.style.height = 150 + "px";
  element.style.border = "3px solid #7fffd4";
  element.style.backgroundColor = "white";
  set_position(obj_id, main_posX, main_posY);
  element.style.left = (obj_posx) + "px";
  element.style.top = (obj_posy) + "px";
}
function set_position(obj_id, main_posX, main_posY){
  var id = obj_id;
  var posx = main_posX;
  var posy = main_posY;

  // このファンクション（メソッド）はゲッターではなく、
  // グローバル変数に値を格納していきます。
  if(id == 1){
    //トップの位置に位置指定を行うプログラムを記述していきます
    obj_posx = main_posX + 50;
    obj_posy = main_posY - 200;
  }
  else if (id == 2) {
    //upper right の位置にオブジェクトを指定します
    obj_posx = main_posX + 450;
    obj_posY = main_posY;
  }
  else if (id == 3) {
    //lower right の位置にオブジェクトを指定します
    obj_posX = main_posX + 300;
    obj_posY = main_posY + 250;
  }
  else if (id == 4) {
    //lower left　の位置にオブジェクトを指定します
    obj_posX = main_posX - 200;
    obj_poxY = main_posY + 250;
  }
  else if (id == 5) {
    //upper left　の位置にオブジェクトを指定します
    obj_posX = main_posX + 350;
    obj_posY = main_posY;
  }
  else{
    obj_posx = 0;
    obj_posy = 0;
  }
}
