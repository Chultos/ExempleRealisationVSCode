<?php
/**
* LIVRAVIS => Fichier principal de l'application
* @author Teva Petorin
* @version 0.1
*/


// Inclusion des paramètres de configuration
include("config.php");
// Inclusion de la classe pour accéder à la base de données
include("bdd.class.php");


// Affichage de l'IHM
if ($_GET["action"] == "accueil") {
	// On précise le nom de l'application pour l'IHM
	$nom_application = NOM_APPLICATION;
	include("ihm/accueil.php");
}
else if ($_GET["action"] == "livres"){
	include("ihm/livres.php");
	try {
		// Connexion à la base de données
		$bdd = new Bdd(CHEMIN_VERS_BDD);

		// Récupération de tous les livres pour l’IHM
		$les_livres = $bdd->recupererTousLesLivres();
	}
	catch (PDOException $erreur) {
		die( "Erreur : ".$erreur->getMessage() );
	}
	// Affichage de l'IHM listant les livres de la bdd
	include("ihm/livres_liste.php");
}
else if ($_GET["action"] == "avis"){
	include("ihm/avis.php");
	try {
		// Connexion à la base de données
		$bdd = new Bdd(CHEMIN_VERS_BDD);

		// Récupération de tous les livres pour l’IHM
		$les_avis = $bdd->recupererTousLesAvis();
	}
	catch (PDOException $erreur) {
		die( "Erreur : ".$erreur->getMessage() );
	}
	// Affichage de l'IHM listant les avis de la bdd
	include("ihm/avis_liste.php");
}
else if ($_GET["action"] == "apropos"){
	include("ihm/apropos.php");
}
else if ($_GET["action"] == "testfruit"){
	include("tests/test_fruit.php");
}
//IHM d'ajout de livres
else if ($_GET["action"] == "ajoutform"){
	include("ihm/ajoutform.php");
}
//Ajout d'un livre
else if ($_GET["action"] == "ajoutbdd"){
	$titre = $_GET["titre"];
	$auteur = $_GET["auteur"];
	$annee = $_GET["annee"];
	$pages = $_GET["pages"];
	$prix = $_GET["prix"];
	$url_image = $_GET["url_image"];
	$isbn = $_GET["isbn"];

	try {
		// Connexion à la base de données
		$bdd = new Bdd(CHEMIN_VERS_BDD);

		//Ajout du nouveau livre
		$bdd->ajouterUnLivre($isbn, $titre, $auteur, $annee, $pages, $prix, $url_image);
	}
	catch (PDOException $erreur) {
		die( "Erreur : ".$erreur->getMessage() );
	}
	header("Location: http://localhost/livravis/?action=livres");
	exit();

}
//IHM d'édition de livres
else if ($_GET["action"] == "editionform"){
	try {
		// Connexion à la base de données
		$bdd = new Bdd(CHEMIN_VERS_BDD);

		// Récupération de tous les livres pour l’IHM
		$les_livres = $bdd->recupererTousLesLivres();
	}
	catch (PDOException $erreur) {
		die( "Erreur : ".$erreur->getMessage() );
	}
	include("ihm/editionform.php");
}
//Edition d'un livre
else if ($_GET["action"] == "editionbdd"){
	try {
		// Connexion à la base de données
		$bdd = new Bdd(CHEMIN_VERS_BDD);

		//Edition du livre
		$bdd->editerUnLivre($_GET["titre"], $_GET["auteur"], $_GET["annee"], $_GET["pages"], $_GET["prix"], $_GET["image_url"], $_GET["isbn"], $_GET["id"]);
	}
	catch (PDOException $erreur) {
		die( "Erreur : ".$erreur->getMessage() );
	}
	header("Location: http://localhost/livravis/?action=livres");
	exit();

}
//Suppression d'un livre
else if ($_GET["action"] == "suppressionform"){
	try {
		// Connexion à la base de données
		$bdd = new Bdd(CHEMIN_VERS_BDD);
		
		//Suppression du livre
		$bdd->supprimerUnLivre($_GET["idLivre"]);
	}
	catch (PDOException $erreur) {
		die( "Erreur : ".$erreur->getMessage() );
	}
	header("Location: http://localhost/livravis/?action=livres");
	exit();
}
//IHM des détails d'un livres
else if ($_GET["action"] == "details"){
	try {
		// Connexion à la base de données
		$bdd = new Bdd(CHEMIN_VERS_BDD);

		// Récupération de tous les livres pour l’IHM
		$les_livres = $bdd->recupererTousLesLivres();
		$les_avis = $bdd->recupererTousLesAvis();
		$note_moyenne = $bdd->recupererNoteMoyenneLivre($_GET["idLivre"]);
		$les_avis_livre = $bdd->recupererAvisLivre($_GET["idLivre"]);
	}
	catch (PDOException $erreur) {
		die( "Erreur : ".$erreur->getMessage() );
	}
	include("ihm/details.php");
}
	//Suppression d'un avis
else if ($_GET["action"] == "suppressionAvis"){

	try {
		// Connexion à la base de données
		$bdd = new Bdd(CHEMIN_VERS_BDD);

		//Suppression de l'avis
		$bdd->supprimerUnAvis($_GET["idAvis"]);
	}
	catch (PDOException $erreur) {
		die( "Erreur : ".$erreur->getMessage() );
	}
	header("Location: http://localhost/livravis/?action=details&idLivre=".$_GET["idLivre"]);
	exit();

}
else if ($_GET["action"] == "testbdd"){
	include("tests/test_bdd.php");
}
else {
	//Definition du message d'erreur
	$message_erreur = MESSAGE_ERREUR;
	include("ihm/erreur.php");
}
?>
