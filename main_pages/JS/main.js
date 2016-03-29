function ball_move(){
  var ball;
  ball = document.getElementById('ball');
  var rect;
  rect = ball.getBoundingClientRect();
  var posX,posY;
  posX = rect.left + window.pageOffset;
  posY = rect.top + window.pageOffset;

  xElement.textContent = positionX ;
	yElement.textContent = positionY ;
  var xElement = document.getElementById( "x" ) ;
  var yElement = document.getElementById( "y" ) ;
}
