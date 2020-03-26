function exportdata()
{
    let req = new XMLHttpRequest();
    req.open('POST','csv.php');
    req.send();
    req.onreadystatechange = function ()
    {
        console.log(req.readyState);
        if(req.readyState === 4){
            let reply = document.createElement('a');
            reply.href=req.responseText;
            reply.download='data.csv';
            document.body.appendChild(reply);

            reply.click();
            document.body.removeChild(reply);
        }

    };
}
