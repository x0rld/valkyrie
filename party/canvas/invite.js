
function invite(){

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
        console.log(req.responseText);
      }

  };

}
