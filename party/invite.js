function invite(choose){
  const input = document.getElementById('search').value;
  const id_game = document.getElementsByTagName('p')[1].id;
  let reply = document.getElementById('reply');
  let request = new XMLHttpRequest();
  request.open('POST', 'sendInvite.php');
  let data = new FormData();
  console.log(id_game);
  data.append('id_game',id_game)
    console.log(id_game);
  data.append('id_user',choose.id);
  data.append('username',choose.innerHTML);
  request.send(data);
  request.onreadystatechange = function(){
    if (request.readyState === 4) {
      reply.innerHTML = request.responseText;
       input.value=' ';
    }
  };

}


addPlayer();

function addPlayer(){
    const id_game = document.getElementsByTagName('p')[0].id;
  console.log("commence");
  let request = new XMLHttpRequest();
  request.open('POST', 'addplayer.php');
  let data = new FormData();
  data.append('id_game',id_game);
  request.send(data);
  request.onreadystatechange = function(){
    if (request.readyState === 4) {
       console.log(request.responseText);

    }
  };
}

function searchUser() {

  const input = document.getElementById('search').value;
  let res = document.getElementById('result');
  let req = new XMLHttpRequest();
  req.open('GET','searchInvite.php?value='+input);
  req.send();
  req.onreadystatechange = function ()
  {
    if(req.readyState === 4){
      res.innerHTML=req.responseText;

    }
  };
}

function nbPlayer(){

    let msg = document.getElementById('message');
    const nb= document.getElementById('nbConnect');
    const div = document.getElementById('start');
    let startButton = document.createElement('button');
    startButton.setAttribute('onclick', 'startGame()');
    startButton.innerHTML="commencer la partie";
    let req = new XMLHttpRequest();
    req.open('GET','numberPlayer.php?id_game='+ msg.getAttribute('class'));
    req.send();
    req.onreadystatechange = function ()
    {
      if(req.readyState === 4){
       nb.innerHTML = req.responseText;
       if (req.responseText>1) {
            div.innerHTML='';
          div.appendChild(startButton);
       }
      }
    }
}

nbPlayer();
setInterval(nbPlayer,3000);

function startGame(){
        let msg = document.getElementById('message');
window.location.href='game.php?id_game='+ msg.getAttribute('class');
}
