function notification()
{
  const notif = document.getElementById('listnotification');
  let numbernotif = document.getElementById('numbernotif');
  let request = new XMLHttpRequest();
  request.open('GET', '../notif.php');
  request.send();
  request.onreadystatechange = function(){
    if (request.readyState === 4) {
      let parse = request.responseText.split(',');
        //récuperer dernier élemnt du tableau et le mettre dans numbernotif
        numbernotif.innerHTML = parse.length-1;
        // le reste dans notif
        notif.innerHTML='';
        for (let i = 0 ; i < parse.length-1; i++) {
            notif.innerHTML += parse[i]+'<br>';
        }
    }
  };

}

notification();
setInterval(notification,10000);
