        <canvas id="canvas" id="canvas" width="800" height="500" style="background-color:#000"></canvas>



<!--affiche que si tu peux dessiner -->
		<ul id="couleurs">
      <li><a href="#" data-couleur="#ffffff" class="actif" style="background: white;">Blanc</a></li>
			<li><a href="#" data-couleur="#000000" style="background: black;">Noir</a></li>
			<li><a href="#" data-couleur="#ff0000"style="background: red;">Rouge</a></li>
			<li><a href="#" data-couleur="brown" style="background: brown;">Marron</a></li>
			<li><a href="#" data-couleur="orange" style="background: orange;">Orange</a></li>
			<li><a href="#" data-couleur="yellow" style="background: yellow;">Jaune</a></li>
			<li><a href="#" data-couleur="green" style="background: green;">Vert</a></li>
			<li><a href="#" data-couleur="cyan" style="background: cyan;">Cyan</a></li>
			<li><a href="#" data-couleur="blue"style="background: blue;">Bleu</a></li>
			<li><a href="#" data-couleur="indigo"style="background: indigo;">Indigo</a></li>
			<li><a href="#" data-couleur="Violet" style="background: violet;">Violet</a></li>
			<li><a href="#" data-couleur="pink" style="background: pink;">Rose</a></li>
		</ul>

		<form id="largeurs_pinceau">
			<label for="largeur_pinceau">Largeur du pinceau :
				<input id="largeur_pinceau" type="range" min="2" max="50" value="5">
			</label>
			<output id="output">5 pixels</output>

			<br/>
      <input type="button" id="save" value="Sauvergarder mon image">
			<input type="reset" id="reset" value="Réinitialiser">
		</form>
