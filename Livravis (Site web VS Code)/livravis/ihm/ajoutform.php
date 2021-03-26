<?php
	// Inclusion de l'en-tête pour les pages web
	include("en_tete.php");
?>

<!-- Contenu de la page -->
<h1>Page d'ajout</h1>

<form action="index.php" method="GET">
	<!-- Exemple pour le champ titre -->
	<div class="form-group">
		<label>Titre du livre</label>
		<input type="text" name="titre" class="form-control" />

		<label>Auteur</label>
		<input type="text" name="auteur" class="form-control" />

		<label>Annee</label>
		<input type="text" name="annee" class="form-control" />

		<label>Nombre de pages</label>
		<input type="text" name="pages" class="form-control" />

		<label>Prix</label>
		<input type="text" name="prix" class="form-control" />

		<label>URL de l'image</label>
		<input type="text" name="url_image" class="form-control" />

		<label>ISBN</label>
		<input type="text" name="isbn" class="form-control" />
	</div>

	<!-- Champ caché pour transmettre l'action au contrôleur -->
	<input type="hidden" name="action" value="ajoutbdd" />

	<!-- Bouton pour envoyer le formulaire -->
	<button type="submit" class="btn btn-primary">Ajouter ce livre</button>
</form>

<?php
	// Inclusion de l'en-tête pour les pages web
	include("pied_de_page.php");
?>
