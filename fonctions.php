<?php // creation de la fonction du menu
class site {


	private $host;// adresse de connexion 127.0.0.1
	private $user;// user name de la bdd
	private $pass;// mdp de la bdd
	private $bdd;// nom de la bdd
	
	public function __construct($hote, $utilisateur, $motdepasse, $database) {

		$this->host=$hote;
		$this->user=$utilisateur;
		$this->pass=$motdepasse;
		$this->bdd=$database;

	}

	//---------------méthode pour réaliser les requêtes------------------
    function effectuerRequete($requete)         //OK
    {
        $resultat = false;
        $con = new mysqli($this->host,$this->user,$this->pass,$this->bdd);
        if ($con)
        {
            $resultat = mysqli_query($con,$requete);
            mysqli_close($con);
        }
        return $resultat;
    }

	function menu (){
?>	
		<nav class="container-fluid"> 			
			<ul> 
				<li><a href="contact.php">Contacts </a></li>               
				<li><a href="actualites.php">Actualités </a></li>
				<li><a href="moi.php">A propos de moi </a></li>					
				<li><a href="index.php">Accueil</a></li>
			</ul>	
		</nav>
		<div id="logo">                    
				<img src="images/LOGO.png" alt="Logo" id="logo" height="100" width="100"  />                    
				 <p class="logo">Luc investigation </p>		 
		</div>
<?php
}

function footer (){
	?>	
			<footer>
							<div class="footer-basic">
							<div class="social"><a href="#"><i class="icon ion-social-instagram"></i></a><a href="https://www.facebook.com/"target="_blank"><i class="icon ion-social-facebook"></i></a></div>
							
							<div id="scroll_to_top">
								<a href="#top"><img src="images/scrolltop.png" alt="Retourner en haut" /></a>
							</div>
							<div class="copyright"> kohl-web-design © 2022</div>
							</div>
			</footer>
	
	<?php
	}

}

/*
?>


<?php // creation de la fonction du footer

class foot {

	function footer (){
?>	
		<footer>
						<div class="footer-basic">
						<div class="social"><a href="#"><i class="icon ion-social-instagram"></i></a><a href="https://www.facebook.com/"target="_blank"><i class="icon ion-social-facebook"></i></a></div>
						
						<div id="scroll_to_top">
							<a href="#top"><img src="images/scrolltop.png" alt="Retourner en haut" /></a>
						</div>
						<div class="copyright"> kohl-web-design © 2022</div>
						</div>
		</footer>

<?php
}


} 
?>*/