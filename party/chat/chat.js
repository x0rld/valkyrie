function sending()
{
  let request = new XMLHttpRequest();
  request.open('POST', 'chat/sendchat.php');
  let data = new FormData();
  const msg = document.getElementById('message');
  data.append('message',msg.value);
  data.append('id_game',msg.getAttribute('class'));
  request.send(data);
  request.onreadystatechange = function () {
    if (request.readyState === 4) {
    }
  };
  wordFound();
  loading();
  msg.value='';
}




function loading()
  {
      let id_user = document.getElementById('message');
    let message = document.getElementById('messages');
    let request = new XMLHttpRequest();
    request.onreadystatechange = function () {
      if (request.readyState === 4) {
        message.innerHTML = request.responseText ;
      }
    };
    request.open('GET', 'chat/loading.php?id_game='+ id_user.getAttribute('class'));
    request.send();
  }


  loading();

  setInterval(loading,5000);
