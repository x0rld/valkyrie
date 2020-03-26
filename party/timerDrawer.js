//----------- Timer Drawer -------------//
//timers temps du dessin
const timer = document.getElementById('timer');
 drawtimer = 60;
function timerDraw()
{
  timer.innerHTML= drawtimer;
  drawtimer--;

  if (drawtimer === 0) {
    clearInterval(drawerTimer);
    clearInterval(saveCanvas);
    clearInterval(loadCanvas);
    console.log('c\'est finis');
    stimer();
  }
}
//permet d'appeler la suite de la partie
function stimer(){

  const reset = document.getElementById('reset');
  reset.click();
  bestPicture();
  msg.removeAttribute('disabled');
  //-----------

  console.log('la partie se fini ?');
  console.log('la partie se fini ?');
  console.log('la partie se fini ?');
  console.log('la partie se fini ?');
  console.log('la partie se fini ?');
  console.log('la partie se fini ?');
  console.log('la partie se fini ?');
  console.log('la partie se fini ?');
  console.log('la partie se fini ?');
  console.log('la partie se fini ?');
  console.log('la partie se fini ?');
console.log('arr player = '+ arrPlayers[0]);
    arrPlayers.splice(0,1);
  console.log('arr player = '+ arrPlayers[0]);
  if (arrPlayers.length == 0 || arrPlayers[0] == 'undefined') {
    console.log("call to endgame");
      endGame();
  };
  drawtimer = 60;
  changePlayer();
  startDrawing();
  displayWords();
}
//------------------------------------------//
function endGame(){
  console.log("endGameloading");
    let request = new XMLHttpRequest();
      request.open('GET','proccessing/endGame.php?id_game='+msg.getAttribute('class'));
      request.send();
      request.onreadystatechange = function ()
      {
        if (request.readyState === 4)
        {
          alert(request.responseText);
                window.location.href = "../profil.php";
        }
      };
}
