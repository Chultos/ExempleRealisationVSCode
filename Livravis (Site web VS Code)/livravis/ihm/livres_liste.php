<?php
	// Inclusion de l'en-tête pour les pages web
	include("en_tete.php");
?>

<!--Bouton ajouter un livre-->
<a href="/livravis/index.php?action=ajoutform">
	<button class="btn btn-primary">Ajouter un livre</button>
</a>


<!-- Tableau des livres -->
<table class="table table-striped">
	<thead>
		<tr>
			<th>Titre</th>
			<th>Auteur</th>
			<!--Colonne pour les boutons-->
			<th></th>

		</tr>
	</thead>
	<tbody>
		<?php
			// Transformation du tableau associatif en HTML
			foreach($les_livres as $un_livre) {
				//Affichage du titre
				echo "<tr><td>
				<a href=\"/livravis/index.php?action=details&idLivre=".$un_livre["id"]."\">
				<button type=\"button\" class=\"btn btn-link\">".$un_livre["titre"]."</button></a></td>";

				//Affichage de l'auteur
				echo "<td>".$un_livre["auteur"]."</td>";

				//Bouton éditer
				echo "<td><div class=\"btn-group\" role=\"group\" aria-label=\"Basic example\">
				<a href=\"/livravis/index.php?action=editionform&idLivre=".$un_livre["id"]."\">
				<button type=\"button\" class=\"btn btn-secondary\">Editer</button>
				</a>";

				//Bouton supprimer
				echo "<a href=\"/livravis/index.php?action=suppressionform&idLivre=".$un_livre["id"]."\">
				<button type=\"button\" class=\"btn btn-danger\">Supprimer</button>
				</a>
				</div></td></tr>";
			}
		?>
	</tbody>
</table>

<?php
	// Inclusion de l'en-tête pour les pages web
	include("pied_de_page.php");
?>
