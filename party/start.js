let loadCanvas;
let saveCanvas;

let drawtimer;

const msg = document.getElementById('message');
let word;
let  arrWords = [];
let arrPlayers = [];

let counterAfk = 0;
const id_user = document.getElementById('messages').getAttribute('class');
let afkTimer;
let isActive;
let drawerTimer;
let choose;
//--------------- Recuperation des infos de la partie ---------------------//

//permet de recuperer les mots de la bdd et de les ranger dans un tableau
function loadWord()
{
  let request = new XMLHttpRequest();
  request.open('GET', 'proccessing/loadwords.php?id_game='+msg.getAttribute('class'));
  request.send();
  console.log("les mots se  récupèrent");
  request.onreadystatechange = function (){
    if (request.readyState === 4) {
      let tmp = request.responseText;
      console.log(tmp);
      tmp = tmp.substr(0, tmp.length-1);
      arrWords = tmp.split(',');
      console.log(arrWords);
      console.log("les mots se sont récupérés");
      loadPlayers();
    }
  }
}

// Permet de charger les joueurs de la partie
function loadPlayers()
{
  console.log("les jouers se chargent");
  let request = new XMLHttpRequest();
  request.open('GET','proccessing/loadPlayer.php?id_game='+msg.getAttribute('class'));
  request.send();
  request.onreadystatechange = function ()
  {
    if (request.readyState === 4) {
      let tmp = request.responseText;
      console.log(tmp);
      tmp = tmp.substr(0, tmp.length-1);
      arrPlayers = tmp.split(',');
      console.log(arrPlayers);
      displayWords();
      startDrawing();
      choose = setInterval(isChoose,1000);
    }
  };
}

//permet recupere le mot choisi

function displayWords()
{
  console.log('les mots vont pop');
  console.log(id_user);
  console.log(arrPlayers[0]);
  if (id_user == arrPlayers[0])
  {

    let word1 = document.getElementById("word1");
    word1.innerHTML = arrWords[0];
    let word2 = document.getElementById('word2');
    word2.innerHTML = arrWords[1];
    let word3 = document.getElementById('word3');
    word3.innerHTML = arrWords[2];
    let modal = document.getElementById('displayModal');
    modal.removeAttribute('hidden');
    console.log('il s\'affiche');
    afkTimer = setInterval(timerAfk,1000);
  }
}

//--------Affiche les lettres sous la forme "_"

function  convertLetter()
{
  let wordTofind = document.getElementById('wordToFind');
  //  responseText.length
  let nbletters='';
  for( let i = 0; i < word.length; i++)
  {
    nbletters+='_ ';
  }
  wordToFind.innerHTML = nbletters;
}

//--------------- timer Afk --------------//

//timers pour le choix des mots

function timerAfk()
{
  counterAfk++;
  console.log(counterAfk);

  if(counterAfk > 20){
    stopAfkTimer();
    console.log('skipped');
  }
}

function stopAfkTimer(){
  counterAfk = 0;
  clearInterval(afkTimer);

}

//  le supprime de la liste le mot choisit
// appel les différnts timers
function chooseWord(wordChoose)
{

  let request = new XMLHttpRequest();
  request.open('POST', 'proccessing/savingWord.php');
  data = new FormData();
  console.log(wordChoose);
  data.append('id_game',msg.getAttribute('class'));
  data.append('id_user',id_user);
  data.append('word',wordChoose);
  request.send(data);
  request.onreadystatechange = function ()
  {
    if (request.readyState === 4)
    {
      let modal = document.getElementById('displayModal');
      let modalClose= document.getElementById('close');
      modal.setAttribute('hidden', 'true');
      modalClose.click();
      stopAfkTimer();
    }
  }
}


// fonction qui recherche le mot choisi dans la bdd
function isChoose()
{
  let request = new XMLHttpRequest();
  request.open('GET','proccessing/isChoose.php?id_game='+msg.getAttribute('class')+"&id_user="+arrPlayers[0]);
  request.send();
  request.onreadystatechange = function ()
  {
    if (request.readyState === 4)
    {
      if (request.responseText != "NULL")
      {
        word = request.responseText;
        console.log("le mot est: "+word);
        console.log('boucle for');
        for (let i = 0, len = arrWords.length; i < len; i++)
        {
          if (arrWords[i] == word)
          {
            arrWords.splice(i,1);
            convertLetter();
            drawerTimer =  setInterval(timerDraw, 1000);
            console.log("mot recup "+request.responseText);
            console.log(arrWords);
          }
        }
      }
      else {
        console.log("rien");
      }

    };
  }
}

//----------- change le joueur dessinateur-----//

function changePlayer()
{
  let request = new XMLHttpRequest();
  request.open('POST','proccessing/changePlayer.php');
  console.log(arrPlayers[0]);
  if (arrPlayers[0]!= 'undefined') {
    let data = new FormData();
    data.append('id_game',msg.getAttribute('class'));
    data.append('id_user',arrPlayers[0]);
    request.send(data);
    request.onreadystatechange = function ()
    {
      if (request.readyState === 4)
      {
        console.log('ok');
      }
    }
  }
}
//----------- Vote -----------------------------//

function vote()
{
  const buttonVote=document.getElementById('vote');
  let request = new XMLHttpRequest();
  request.open('POST','proccessing/vote.php');
  let data = new FormData();
  data.append('id_game',msg.getAttribute('class'));
  request.send(data);
  request.onreadystatechange = function () {
    if (request.readyState === 4) {
      console.log("vote ok");
      buttonVote.setAttribute('hidden', true);
    };
  }
}

function bestPicture()
{
  const buttonVote=document.getElementById('vote');
  let request = new XMLHttpRequest();
  request.open('POST','proccessing/best.php');
  let data = new FormData();
  data.append('id_game',msg.getAttribute('class'));
  request.send(data);
  request.onreadystatechange = function ()
  {
    if (request.readyState === 4)
    {
      console.log("BEST CHANGE");
      buttonVote.removeAttribute('hidden');
    };
  }
}

//----------------------------------------------//
//verifie si la partie est active

function checkActive()
{
  let request = new XMLHttpRequest();
  request.open('GET','proccessing/isActive.php?id_game='+msg.getAttribute('class'));
  request.send();
  request.onreadystatechange = function ()
  {
    if (request.readyState === 4)
    {
      if (request.responseText == '1')
      {
        clearInterval(isActive);
        console.log("actif ou pas");
        loadWord();
      }
    }
  };
}

//permet de valider le mot correcte
function wordFound()
{
  console.log(msg.value);
  console.log(word);
  if( word == msg.value){
    alert('bravo');
    msg.setAttribute('disabled', 'disable');
  }
}

//fonction de lancement de partie et initialise la liste de mot

function startPlay()
{
  let request = new XMLHttpRequest();
  request.open('POST','startPlay.php');
  let data = new FormData();
  data.append('id_game',msg.getAttribute('class'));
  request.send(data);
  request.onreadystatechange = function () {
    if (request.readyState === 4) {
      if (request.responseText== 'start'){
        console.log('ca va commencer');
      }
    }
  };
}
startPlay();
isActive = setInterval(checkActive,2000);



addPlayer();

function addPlayer(){
  id_game = msg.getAttribute('class');
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
