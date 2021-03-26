<?php
	// Définition et implémentation de la classe Fruit
	class Fruit {
		// Attributs de la classe
		private $prix;
		private $nom;

		// Méthode constructeur
		public function __construct() {
		// Initialisations des attributs
			$this->prix = 1;
			$this->nom = "Pomme";
		}

		// Méthode destructeur
		public function __destruct() {
		}

		// Méthode accesseur attribut prix
		public function get_prix() {
			return $this->prix;
		}

		// Méthode mutateur attribut prix
		public function set_prix($new_prix) {
			$this->prix = $new_prix;
		}

		// Méthode accesseur attribut nom
		public function get_nom() {
			return $this->nom;
		}

		// Méthode mutateur attribut nom
		public function set_nom($new_nom) {
			$this->nom = $new_nom;
		}
		
		// Méthode afficheur
		public function afficher() {
			echo "Nom : ".$this->nom."<br>".
			"Prix : ".$this->prix."€<br>";
		}
	};
?>
