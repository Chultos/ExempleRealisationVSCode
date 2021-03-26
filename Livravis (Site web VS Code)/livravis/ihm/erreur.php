<?php
	// Inclusion de l'en-tête pour les pages web
	include("en_tete.php");
?>

<!-- Contenu de la page -->
<h1>Erreur !</h1>
<div class="alert alert-danger" role="alert">
	<?php 
		echo $message_erreur;
	?>
</div>

<?php
	// Inclusion de l'en-tête pour les pages web
	include("pied_de_page.php");
?>
