<?php
	// Inclusion de l'en-tête pour les pages web
	include("./ihm/en_tete.php");
?>

<!-- Contenu de la page -->

<?php
	include("fruit.class.php");
	$fruit1 = new Fruit();
?>

<h1><?php $fruit1->afficher();?></h1>
<p><?php $fruit1->get_prix();?></p>

<?php
	// Inclusion de l'en-tête pour les pages web
	include("./ihm/pied_de_page.php");
?>
