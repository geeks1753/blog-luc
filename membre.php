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
$pseudo = $titre = $texte = $image = $resume = "";
$pseudoErreur = $titreErreur = $texteErreur = $imageErreur = $resumeErreur = "";
$isSucces = false;

// recuperation des informations pour les envoyer dans les variables
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pseudo =  $fonction->securite($_POST["pseudo"]);
    $titre =  $fonction->securite($_POST["titre"]);
    $texte =  $fonction->securite($_POST["texte"]);
    $image =  $fonction->securite($_POST["image"]);
    $resume =  $fonction->securite($_POST["resume"]);


    if (empty($pseudo)) {
        $pseudoErreur = "veuillez entrer votre pseudo merci";
        $isSucces = true;
    }
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
?>



    <div class="titre">A vos stylos</div>


    <?php
    // appel de la page formulaire form.php
    include_once('includes/formMembre.php');


    // appel de la page footer
    include_once('includes/footer.php');
    ?>
