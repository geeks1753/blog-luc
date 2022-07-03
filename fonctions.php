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

		$this->host = "127.0.0.1";//$hote;
		$this->user =  "root";//$utilisateur;
		$this->pass = "";//$motdepasse;
		$this->bdd = "journal";//$database;
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

	/*public function connexion($Pseudo,$nom,$pass)
    {
        $res=false;
        $requete= "SELECT COUNT (*) FROM `utilisateur` WHERE `prenom` = '$Pseudo' AND `nom`='$nom' AND `password` = '$pass';";
        $resultat = $this->effectuerRequete($requete);
        if ($resultat)
        {
            $ligne = mysqli_fetch_row($resultat);
            if ($ligne[0] == 1)
            {
                $res = true;
            }
        }
        return $res;
    }*/

	function securite($secu)
	{
	$secu=trim($secu);
	$secu=stripslashes($secu);
	$secu=htmlspecialchars($secu);
	return $secu;
	}
}
?>

