
let selected;

let ranked;
typeParty();
function typeParty(){

  const typing = document.getElementById('type');
  typing.innerHTML='';
  const select = document.getElementById('safe');
  const statutGame  = document.createElement('p'); // type de partie (normal, ranked, privé)

  const opt = select.options[select.selectedIndex].value;

  if(opt === "Private"){
    const children = type.childNodes;
    statutGame.innerHTML="Type de Partie : Privé";
    typing.appendChild(statutGame);
    selected = 1;
    ranked = 0;
    wordlist();
  }

  else if(opt === 'PublicN' ){

    const children = type.childNodes;
    statutGame.innerHTML=" Type de Partie : Normal";
    typing.appendChild(statutGame);
    selected = 0;
    ranked = 0;
    wordlist();
  }

  else {

    const children = type.childNodes;
    statutGame.innerHTML=" Type de Partie : Ranked";
    typing.appendChild(statutGame);
    selected = 0;
    ranked=1;
    wordlist();
  }

}


function wordlist()
{
  const list = document.getElementById('listsandranked');
  list.innerHTML='';
  let req = new XMLHttpRequest();
  req.open('POST','choose.php');
  let data = new FormData();
  data.append('type',selected);
  req.send(data);
  req.onreadystatechange = function ()
  {
    console.log(req.readyState);
    if(req.readyState === 4){
      list.innerHTML=req.responseText;
    }

  };
}


function createParty()
{

  //id du thème choisis
  const select = document.getElementsByName('wordlist')[0];
  const opt = select.options[select.selectedIndex].id;

  let data = new FormData();
  data.append('R18',selected);
  data.append('ranked',ranked);
  data.append('id_sub',opt);
  // partie ranked ou normal
  let req = new XMLHttpRequest();
  req.open('POST','upload_party.php');
  req.send(data);
  req.onreadystatechange = function ()
  {
    console.log(req.readyState);
    if(req.readyState === 4){
      console.log(req.responseText);
      if (req.responseText.length > 3) {
        alert(req.responseText);
        setTimeout(() => {
              window.location.href = "../profil.php";
        }, 2000);

      }  else
      {
        window.location.href = "invite.php?id_game=" + req.responseText;
      }
    }
  };
}
