<?php
/**
 * LIVRAVIS => Classe pour accéder aux informations de la base de données
 * @author Teva Petorin
 * @version 0.1
 */


/**
 * Classe pour accéder à une base de données SQLite3
 */
class Bdd {

    // DSN : Data Source Name pour accéder à la base de données SQLite3
    private $dsn = "";

    // Gestionnaire de base de données (database handler)
    private $dbh = NULL;


    /**
    * Méthode constructeur de la classe chargé d'initialiser PDO
    * @param chemin_vers_bdd
    */
    public function __construct($chemin_vers_bdd) {
        // Préparation du dsn
        $this->dsn = "sqlite:".$chemin_vers_bdd;

        // Instanciation d'un objet PDO (PHP Database Object)
        $this->dbh = new PDO($this->dsn);
        $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }


    /**
    * Méthode pour récupérer tous les livres dans la base de données
    * @param aucun
    * @return un tableau associatif avec tous les livres
    */
    public function recupererTousLesLivres() {
        // Préparation de la requête SQL
        $requete_sql = "SELECT * FROM livres";

        // Exécution de la requête SQL
        $stmt = $this->dbh->query($requete_sql);

        // Récupération des résultats
        $resultats = $stmt->fetchAll();

        // On retourne les résultats
        return $resultats;
    }

    public function recupererTousLesAvis() {
        // Préparation de la requête SQL
        $requete_sql = "SELECT * FROM avis";

        // Exécution de la requête SQL
        $stmt = $this->dbh->query($requete_sql);

        // Récupération des résultats
        $resultats = $stmt->fetchAll();

        // On retourne les résultats
        return $resultats;
    }

    public function recupererAvisLivre($id) {
        // Préparation de la requête SQL
        $requete_sql = "SELECT avis.id, avis.description, avis.note, avis.date FROM avis, livres WHERE livres.id  = avis.id_livres_fk AND livres.id = ? ORDER BY date ASC;";
        $stmt = $this->dbh->prepare($requete_sql);

        // Exécution de la requête SQL avec l'id du livre en paramètre
        $stmt->execute( array($id) );

        // Récupération des résultats
        $resultats = $stmt->fetchAll();

        // On retourne les résultats
        return $resultats;
    }

    public function ajouterUnLivre($isbn, $titre, $auteur, $annee, $pages, $prix, $url_image) {
        try {
            // Connexion à la base de données

            $dsn = "sqlite:bdd/livravis.sqlite";
            $dbh = new PDO($dsn);

            // Préparation de la requête SQL
            $requete_sql = "INSERT INTO livres (isbn, titre, auteur, annee, pages, prix, image_url) VALUES ( ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $this->dbh->prepare($requete_sql);

            // Exécution de la requête SQL avec les 7 paramètres
            $stmt->execute( array($isbn, $titre, $auteur, $annee, $pages, $prix, $url_image) );
        }
        catch (PDOException $erreur) {
            die( "Erreur : ".$erreur->getMessage() );
        }
        $dbh = NULL;
    }

    public function supprimerUnLivre($id) {
        try {
            // Connexion à la base de données
            $dsn = "sqlite:bdd/livravis.sqlite";
            $dbh = new PDO($dsn);

            // Préparation de la requête SQL
            $requete_sql = "DELETE FROM livres WHERE id=?;";
            $stmt = $this->dbh->prepare($requete_sql);

            // Exécution de la requête SQL avec l'id du livre en paramètre
            $stmt->execute( array($id) );
        }
        catch (PDOException $erreur) {
            die( "Erreur : ".$erreur->getMessage() );
        }
        $dbh = NULL;
    }

    public function editerUnLivre($titre, $auteur, $annee, $pages, $prix, $image_url, $isbn, $id) {
        try {
            // Connexion à la base de données
            $dsn = "sqlite:bdd/livravis.sqlite";
            $dbh = new PDO($dsn);

            // Préparation de la requête SQL
            $requete_sql = "UPDATE livres SET titre = ?, auteur = ?, annee = ?, pages = ?, prix = ?, image_url = ?, isbn = ? WHERE id = ?;";
            $stmt = $this->dbh->prepare($requete_sql);

            // Exécution de la requête SQL avec l'id du livre en paramètre
            $stmt->execute( array($titre, $auteur, $annee, $pages, $prix, $image_url, $isbn, $id) );
        }
        catch (PDOException $erreur) {
            die( "Erreur : ".$erreur->getMessage() );
        }
        $dbh = NULL;
    }

    public function supprimerUnAvis($id) {
        try {
            // Connexion à la base de données
            $dsn = "sqlite:bdd/livravis.sqlite";
            $dbh = new PDO($dsn);

            // Préparation de la requête SQL
            $requete_sql = "DELETE FROM avis WHERE id=?;";
            $stmt = $this->dbh->prepare($requete_sql);

            // Exécution de la requête SQL avec l'id du livre en paramètre
            $stmt->execute( array($id) );
        }
        catch (PDOException $erreur) {
            die( "Erreur : ".$erreur->getMessage() );
        }
        $dbh = NULL;
    }

    public function recupererAvisLivreCroissant($idLivre) {
        try {
            // Connexion à la base de données
            $dsn = "sqlite:bdd/livravis.sqlite";
            $dbh = new PDO($dsn);

            // Préparation de la requête SQL
            $requete_sql = "DELETE FROM avis WHERE id=?;";
            $stmt = $this->dbh->prepare($requete_sql);

            // Exécution de la requête SQL avec l'id du livre en paramètre
            $stmt->execute( array($id) );
        }
        catch (PDOException $erreur) {
            die( "Erreur : ".$erreur->getMessage() );
        }
        $dbh = NULL;
    }

    public function recupererNoteMoyenneLivre($id) {
        try {
            // Connexion à la base de données
            $dsn = "sqlite:bdd/livravis.sqlite";
            $dbh = new PDO($dsn);

            // Préparation de la requête SQL
            $requete_sql = "SELECT AVG(note) AS moyenne FROM avis, livres WHERE livres.id = avis.id_livres_fk AND livres.id = ?;";
            $stmt = $this->dbh->prepare($requete_sql);

            // Exécution de la requête SQL avec l'id du livre en paramètre
            $stmt->execute( array($id) );

        }
        catch (PDOException $erreur) {
            die( "Erreur : ".$erreur->getMessage() );
        }
        // Récupération des résultats
        $resultats = $stmt->fetch();
        return $resultats;
        $dbh = NULL;
    }
}
