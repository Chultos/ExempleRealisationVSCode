<?php
	try{
		// Connexion à la base de données
		$allo = new Bdd(CHEMIN_VERS_BDD);
		
		// Test de la méthode récupérant tous les livres
		$id = 3;
		$test = $allo->recupererNoteMoyenneLivre($id);

		// Affichage du résultat
		echo "<pre>";
		var_dump($test["moyenne"]);
		echo $test["moyenne"];
		echo "</pre>";
	}
	catch (PDOException $erreur) {
		die( "Erreur : ".$erreur->getMessage() );
	}
?>
