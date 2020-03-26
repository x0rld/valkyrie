let canvas = $("#canvas");
let context = canvas[0].getContext('2d');

function startDrawing()
{
	if (arrPlayers[0] === id_user)
	{
		console.log("ici ert ldsa");
		canvasDraw();
	}
	else
	{
		console.log(arrPlayers[0]);
		console.log("pas la");
		loadCanvas = setInterval(loading, 2000);
	}
}

function canvasDraw()
{
	// letiables :
	console.log(id_user+"dessine");
	let color = "#FFF";
	let painting = false;
	let started = false;
	let width_brush = 5;
	let cursorX, cursorY;
	let restoreCanvasArray = [];
	let restoreCanvasIndex = 0;
	// Trait arrondi :
	context.lineJoin = 'round'; //définie la forme du croisement entre deux ligne.
	context.lineCap = 'round'; // définie la des extrémitées du trait

	// Click souris enfoncé sur le canvas, je dessine :
	canvas.mousedown(function(e)
	{
		painting = true;
		// Coordonnées de la souris :
		cursorX = (e.pageX - this.offsetLeft);
		cursorY = (e.pageY - this.offsetTop);
	});

	// Relachement du Clic sur tout le document, j'arrête de dessiner :
	$(this).mouseup(function()
	{
		painting = false;
		started = false;
	}
);

// Mouvement de la souris sur le canvas :
canvas.mousemove(function(e)
{
	// Si je suis en train de dessiner (click souris enfoncé) :
	if (painting)
	{
		// Set Coordonnées de la souris :
		cursorX = (e.pageX - this.offsetLeft)  - 10; // 10 = décalage du curseur (pour recaler le trait au centre du curseur)
		cursorY = (e.pageY - this.offsetTop) - 10;// //(là aussi)

		// Dessine une ligne :
		drawLine();
	}
});

// Fonction qui dessine une ligne :
function drawLine()
{
	// Si c'est le début, j'initialise
	if (!started)
	{
		// Je place mon curseur pour la première fois :
		context.beginPath();
		context.moveTo(cursorX, cursorY);
		started = true;
	}
	// Sinon je dessine
	else
	{
		context.lineTo(cursorX, cursorY);
		context.strokeStyle = color; //pour donner la coueleur au traît
		context.lineWidth = width_brush; //largeur du trait
		context.stroke();
	}
}

// Pour chaque carré de couleur :
$("#couleurs a").each(function()
{
	// Je lui attribut une couleur de fond :
	$(this).css("background", $(this).attr("data-couleur"));

	// Et au click :
	$(this).click(function()
	{
		// Je change la couleur du pinceau :
		color = $(this).attr("data-couleur");

		// Et les classes CSS :
		$("#couleurs a").removeAttr("class", "");
		$(this).attr("class", "actif");

		return false;
	});
});

// Largeur du pinceau :
$("#largeurs_pinceau input").change(function()
{
	if (!isNaN($(this).val())) {
		width_brush = $(this).val();
		$("#output").html($(this).val() + " pixels");
	}
});

// Bouton Reset :
$("#reset").click(function()
{
	// Clear canvas :
	clearCanvas();

	// Valeurs par défaut :
	$("#largeur_pinceau").attr("value", 5);
	width_brush = 5;
	$("#output").html("5 pixels");
});
console.log('before save');
saveCanvas = setInterval(saving, 2000);
console.log('aftersave');
}


function saving()
{
	// retrieve the canvas data
	let dataurl = canvas.get(0).toDataURL('image/jpeg', 1.0); // a data URL of the current canvas image
	let request = new XMLHttpRequest();
	request.onreadystatechange = function () {
		if (request.readyState === 4) {
			console.log('s');
		}

	};
	request.open('POST', 'saveCanvas.php');
	let formdata = new FormData();
	formdata.append('data', dataurl);
	formdata.append('id_game',msg.getAttribute('class'));
	request.send(formdata);
}


function loading()
{
	let image = new Image();
	let request = new XMLHttpRequest();
	request.open('GET', 'loadingCanvas.php?id_game='+msg.getAttribute('class'));
	request.send();
	request.onreadystatechange = function () {
		if (request.readyState === 4) {
			console.log('loading');
			image.src =request.responseText;
			image.onload = function() {
				context.drawImage(image, 0, 0);
				if( drawtimer == 0){
					return;
				}
			};
		}
	};
}


// Clear du Canvas :
function clearCanvas()
{
	context.clearRect(0,0, canvas.width(), canvas.height());
	let request = new XMLHttpRequest();
	request.open('POST', 'clear.php');
	let formdata = new FormData();
	formdata.append('id_game', msg.getAttribute('class'));
	request.send(formdata);
	request.onreadystatechange = function ()
	{
		if (request.readyState === 4)
		{
			console.log('reset');
		}
	};
}
