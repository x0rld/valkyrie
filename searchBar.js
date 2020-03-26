function searchUser() {
  const input = document.getElementById('searching').value;
  let res = document.getElementById('res');
  let req = new XMLHttpRequest();
  req.open('GET','../include/searchBar.php?value='+input);
  req.send();
  req.onreadystatechange = function ()
  {
    if(req.readyState === 4){
      res.innerHTML=req.responseText;
      msg.value='';
    }
  };
}
