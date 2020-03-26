const form = document.getElementById("form");
const inp = document.createElement('input');
const reply = document.getElementById('reply');

form.addEventListener('input', function() {
    let image = document.getElementsByTagName('img');
    let data= new FormData(form);
    let req = new XMLHttpRequest();
  req.open('POST','upload.php');
  req.send(data);
  req.onreadystatechange = function ()
   {
          if(req.readyState === 4 ){
              if(req.responseText.indexOf('/')!==-1) {
                  image[1].src = req.responseText;
                  image[2].src = req.responseText;
                  form.removeChild(inp)
              }
              else reply.innerHTML= req.responseText;

      }
   };

},false);

function createInput() {
    const form = document.getElementById('form');

    inp.type = 'file';
    inp.name = 'file';
    inp.hidden = true;
    inp.click();
    form.appendChild(inp);
}
