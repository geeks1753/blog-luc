<?php 
// creation de la fonction du menu
class site
{

// Paramettres de connexion a la base de données
	private $host; // adresse de connexion 127.0.0.1
	private $user; // user name de la bdd
	private $pass; // mdp de la bdd
	private $bdd; // nom de la bdd

	public function __construct($hote, $utilisateur, $motdepasse, $database)
	{

		$this->host = $hote;
		$this->user = $utilisateur;
		$this->pass = $motdepasse;
		$this->bdd = $database;
	}

	//---------------méthode pour réaliser les requêtes------------------



	function effectuerRequete($requete)         
	{
		$resultat = false;
		$con = new mysqli($this->host, $this->user, $this->pass, $this->bdd);
		if ($con) {
			$resultat = mysqli_query($con, $requete);
			mysqli_close($con);
		}
		return $resultat;
	}

	function securite($secu)
	{
	$secu=trim($secu);
	$secu=stripslashes($secu);
	$secu=htmlspecialchars($secu);
	return $secu;
	}
}
?>

