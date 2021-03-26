<?php
	// Inclusion de l'en-tête pour les pages web
	include("en_tete.php");
?>

<?php
	//Récupère le titre du livre
	foreach($les_livres as $un_livre) {
		if($un_livre["id"] == $_GET["idLivre"]) {
			$titre = $un_livre["titre"];
		}
	}

	//Compte le nombre d'avis pour le livre
	foreach($les_avis as $un_avis) {
		if($un_avis["id_livres_fk"] == $_GET["idLivre"]) {
			$nombreAvis += 1;
		}
	}

	//Affichage du contenu de la page
	echo "<h1>Détails du livre</h1>
	<table class=\"table table-striped\">
	<thead>
		<tr>
			<th>Titre</th>
			<th>Moyenne des Avis</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>".$titre."</td>";

	if($nombreAvis == 0) {
		echo "<td>Ce livre n'a pas encore d'avis</td>";
	}
	else {
		echo "<td>".round($note_moyenne["moyenne"], 2)." % en ".$nombreAvis." avis</td>
				</tr>
			</tbody>
		</table>
		<h1>Liste des avis</h1>
		<table class=\"table table-striped\">
			<thead>
				<tr>
					<th>Avis</th>
					<th>Note</th>
					<th>Date</th>
					<!----Colonne pour le bouton supprimer---->
					<th></th>
				</tr>
			</thead>
			<tbody>";
		foreach($les_avis_livre as $un_avis_livre) {
			echo "<tr>
			<td>".$un_avis_livre["description"]."</td>
			<td>".$un_avis_livre["note"]."</td>
			<td>".$un_avis_livre["date"]."</td>";

			//Bouton supprimer
			echo "<td><td><a href=\"/livravis/index.php?action=suppressionAvis&idAvis=".$un_avis_livre["id"]."&idLivre=".$_GET["idLivre"]."\">
			<button type=\"button\" class=\"btn btn-danger\">Supprimer</button>
			</a></td></td>
			</tr>";
		}
	}
?>
</tbody>
</table>

<!---Bouton retour--->
<a href="/livravis/index.php?action=livres">
	<button type="button" class="btn btn-primary">Retour</button>
</a>

<?php
	// Inclusion de l'en-tête pour les pages web
include("pied_de_page.php");
?>
