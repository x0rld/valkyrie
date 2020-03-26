$(document).ready(function() {

	// letiables :
	let color = "#000";
	let painting = false;
	let started = false;
	let width_brush = 5;
	let canvas = $("#canvas");
	let cursorX, cursorY;
	let restoreCanvasArray = [];
	let restoreCanvasIndex = 0;

	let context = canvas[0].getContext('2d');

	// Trait arrondi :
	context.lineJoin = 'round'; //définie la forme du croisement entre deux ligne.
	context.lineCap = 'round'; // définie la des extrémitées du trait

	// Click souris enfoncé sur le canvas, je dessine :
	canvas.mousedown(function(e) {
		painting = true;

		// Coordonnées de la souris :
		cursorX = (e.pageX - this.offsetLeft);
		cursorY = (e.pageY - this.offsetTop);
	});

	// Relachement du Click sur tout le document, j'arrête de dessiner :
	$(this).mouseup(function() {
		painting = false;
		started = false;
	});

	// Mouvement de la souris sur le canvas :
	canvas.mousemove(function(e) {
		// Si je suis en train de dessiner (click souris enfoncé) :
		if (painting) {
			// Set Coordonnées de la souris :
			cursorX = (e.pageX - this.offsetLeft)  - 10; // 10 = décalage du curseur (pour recaler le trait au centre du curseur)
			cursorY = (e.pageY - this.offsetTop) - 10;// //(là aussi)

			// Dessine une ligne :
			drawLine();
		}
	});

	// Fonction qui dessine une ligne :
	function drawLine() {
		// Si c'est le début, j'initialise
		if (!started) {
			// Je place mon curseur pour la première fois :
			context.beginPath();
			context.moveTo(cursorX, cursorY);
			started = true;
		}
		// Sinon je dessine
		else {
			context.lineTo(cursorX, cursorY);
			context.strokeStyle = color; //pour donner la coueleur au traît
			context.lineWidth = width_brush; //largeur du trait
			context.stroke();
		}
	}

	// Clear du Canvas :
	function clear_canvas() {
		context.clearRect(0,0, canvas.width(), canvas.height());
	}

	// Pour chaque carré de couleur :
	$("#couleurs a").each(function() {
		// Je lui attribut une couleur de fond :
		$(this).css("background", $(this).attr("data-couleur"));

		// Et au click :
		$(this).click(function() {
			// Je change la couleur du pinceau :
			color = $(this).attr("data-couleur");

			// Et les classes CSS :
			$("#couleurs a").removeAttr("class", "");
			$(this).attr("class", "actif");

			return false;
		});
	});

	// Largeur du pinceau :
	$("#largeurs_pinceau input").change(function() {
		if (!isNaN($(this).val())) {
			width_brush = $(this).val();
			$("#output").html($(this).val() + " pixels");
		}
	});

	// Bouton Reset :
	$("#reset").click(function() {
		// Clear canvas :
		clear_canvas();

		// Valeurs par défaut :
		$("#largeur_pinceau").attr("value", 5);
		width_brush = 5;
		$("#output").html("5 pixels");

	});

	document.getElementById('save').addEventListener('click', function () {
	  // retrieve the canvas data
	  let dataurl = canvas.get(0).toDataURL(); // a data URL of the current canvas image


		console.log(dataurl);

		let request = new XMLHttpRequest();
		request.onreadystatechange = function () {
			if (request.readyState === 4) {
				console.log(dataurl);
			}
		};
		request.open('POST', 'http://localhost/canvas/index.php');
		let formdata = new FormData();
		formdata.append('data', dataurl);
		request.send(formdata);

	})
	});
