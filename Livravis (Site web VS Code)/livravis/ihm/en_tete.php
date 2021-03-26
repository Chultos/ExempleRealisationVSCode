<?php
/**
 * LIVRAVIS => En-tête des pages web
 * @author Teva Petorin
 * @version 0.1
 */
?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>LIVRAVIS</title>

	<!-- Lien externe vers le CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

	<!-- Styles CSS complémentaires -->
	<style>
		.bd-placeholder-img {
			font-size: 1.125rem;
			text-anchor: middle;
			-webkit-user-select: none;
			-moz-user-select: none;
			-ms-user-select: none;
			user-select: none;
		}

		@media (min-width: 768px) {
			.bd-placeholder-img-lg {
				font-size: 3.5rem;
			}
		}

		body {
			padding-top: 5rem;
		}

		.starter-template {
			padding: 3rem 1.5rem;
			text-align: center;
		}
	</style>
</head>

<body>
	<!-- Barre de navigation avec le menu -->
	<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
		<a class="navbar-brand" href="#">LIVRAVIS</a>
		<div class="collapse navbar-collapse" id="navbarsExampleDefault">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item">
					<a class="nav-link" href="/livravis/?action=accueil">Accueil</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="/livravis/?action=livres">Livres</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="/livravis/?action=apropos">A propos</a>
				</li>
			</ul>
		</div>
	</nav>

	<!-- Conteneur principal de l'application web -->
	<main role="main" class="container">
		<div class="starter-template">
