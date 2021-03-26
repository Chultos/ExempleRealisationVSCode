<?php
	// Inclusion de l'en-tête pour les pages web
	include("en_tete.php");
?>

<!-- Contenu de la page -->
<h1>Page d'édition</h1>

<?php 
	foreach($les_livres as $un_livre) {
		if($un_livre["id"] == $_GET["idLivre"]) {
			$titre = $un_livre["titre"];
			$auteur = $un_livre["auteur"];
			$annee = $un_livre["annee"];
			$pages = $un_livre["pages"];
			$prix = $un_livre["prix"];
			$image_url = $un_livre["image_url"];
			$isbn = $un_livre["isbn"];
		}
	}



	echo "<form action=\"index.php\" method=\"GET\">

		<!-- Exemple pour le champ titre -->
		<div class=\"form-group\">
			<label>Titre du livre</label>
			<input type=\"text\" value=\"".$titre."\" name=\"titre\" class=\"form-control\" />

			<label>Auteur</label>
			<input type=\"text\" value=\"".$auteur."\" name=\"auteur\" class=\"form-control\" />

			<label>Annee</label>
			<input type=\"text\" value=\"".$annee."\" name=\"annee\" class=\"form-control\" />

			<label>Nombre de pages</label>
			<input type=\"text\" value=\"".$pages."\" name=\"pages\" class=\"form-control\" />

			<label>Prix</label>
			<input type=\"text\" value=\"".$prix."\" name=\"prix\" class=\"form-control\" />

			<label>URL de l'image</label>
			<input type=\"text\" value=\"".$image_url."\" name=\"image_url\" class=\"form-control\" />

			<label>ISBN</label>
			<input type=\"text\" value=\"".$isbn."\" name=\"isbn\" class=\"form-control\" />
		</div>

		<!-- Champs cachés pour transmettre l'action au contrôleur -->
		<input type=\"hidden\" name=\"id\" value=\"".$_GET["idLivre"]."\" />
		<input type=\"hidden\" name=\"action\" value=\"editionbdd\" />

		<!-- Bouton pour envoyer le formulaire -->
		<button type=\"submit\" class=\"btn btn-primary\">Sauvegarder les modifications</button>
	</form>";
?>

<?php
	// Inclusion de l'en-tête pour les pages web
	include("pied_de_page.php");
?>
