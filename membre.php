<?php

    // on définit le titre 
    $titre = "luc investigation membre";

    // on inclut le heder
    include_once('includes/header.php');

    // on inclut la navbar
    @include_once('includes/navbar.php');

    // creation de la fonction menu
    require_once("fonctions.php");

    // Appel de la class
    $fonction = new site('127.0.0.1', 'root', '', 'journal');

session_start();

if (isset($_SESSION['firstname']) and isset($_SESSION['pass']) and !empty($_SESSION['firstname']) and !empty($_SESSION['pass'])) {
   ?>
    <div class="CV">
		<ul>
			<li>
				<a href="deconnexion.php">Deconnexion</a>
			</li>
		</ul>
	</div>
   <?php
} else {
    header("location: connexion.php");
}



// initialisation des varibles 
$pseudo =$_SESSION['ID'];
$titre = $texte = $image = $resume = "";
$pseudoErreur = $titreErreur = $texteErreur = $imageErreur = $resumeErreur = "";
$isSucces = false;

// recuperation des informations pour les envoyer dans les variables
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $titre =  $fonction->securite($_POST["titre"]);
    $texte =  $fonction->securite($_POST["texte"]);
    $image =  $fonction->securite($_POST["image"]);
    $resume = $fonction->securite($_POST["resume"]);

  
    if (empty($titre)) {
        $titreErreur = "veuillez entrer un titre merci";
        $isSucces = true;
    }
    if (empty($texte)) {
        $texteErreur = "veuillez ecrire votre article merci";
        $isSucces = true;
    }
    if (empty($image)) {
        $imageErreur = "veuillez indiquer le nom de l'image ";
        $isSucces = true;
    }

    if (empty($resume)) {
        $resumeErreur = "veuillez résumer votre article merci";
        $isSucces = true;
    }
}



if(isset($_POST['submit-article'])) { // si action sur le bonton envoie
    if( isset($_POST["titre"]) AND isset($_POST["texte"]) AND isset($_POST["image"]) AND isset($_POST["resume"]))
    {
        $iduser=intval($pseudo);
        
        $requeteComm = "INSERT INTO `articles`(`Texte`,`Titre`,`Date`,`Resume`,`Image`,`User_ID`) 
                    VALUES ('$texte' , '$titre' , NOW() , '$resume' , '$image' , $iduser )"; // Creation de la requete
                    //var_dump($requeteComm); die();
        $resultatComm = $fonction->effectuerRequete($requeteComm); // appel de fonction qui permet d effectuer la requete 
        
    }
}
?>



    <div class="titre">A vos stylos</div>


    <?php
    // appel de la page formulaire form.php
    include_once('includes/formMembre.php');


    // appel de la page footer
    include_once('includes/footer.php');
    ?>
