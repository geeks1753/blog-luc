<?php

session_start();

// on définit le titre 
$titre = "luc investigation Articles";

require_once "jbbcode/Parser.php";

// on inclut le heder
include_once('includes/header.php');

// on inclut la navbar
@include_once('includes/navbar.php');
?>

<div class="titre">Formulaire d'inscription</div>

<?php

// creation de la fonction menu
require_once("fonctions.php");
$fonction = new site('127.0.0.1', 'root', '', 'journal');

$firstname = $pass = $name = "";
$firstnameErreur = $passErreur = $DpassErreur = $nameErreur = "";
$isSucces = false;


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $fonction->securite($_POST["firstname"]);
    $pass =  $fonction->securite($_POST["pass"]);
    $Dpass =  $fonction->securite($_POST["Dpass"]);
    $name =  $fonction->securite($_POST["name"]);


    if (empty($firstname)) {
        $firstnameErreur = " Prénom incorrect";
        $isSucces = true;
    }
    if (empty($pass)) {
        $passErreur = " Mot de pass inccorect";
        $isSucces = true;
    }
    if (empty($Dpass)) {
        $DpassErreur = " Mot de pass inccorect";
        $isSucces = true;
    }
    if (empty($name)) {
        $nameErreur = " Nom incorrect";
        $isSucces = true;
    }
}
if (isset($_POST['submit-inscription'])) { // si action sur le bonton envoie
    if (isset($_POST["firstname"]) and isset($_POST["pass"]) and isset($_POST["Dpass"]) and isset($_POST["name"])) {

        $requeteComm = "INSERT INTO `utilisateur`(`prenom`,`password`,`nom`) 
                    VALUES ('$firstname','$pass','$name')"; // Creation de la requete
        //var_dump($requeteComm); die();
        $resultatComm = $fonction->effectuerRequete($requeteComm); // appel de fonction qui permet d effectuer la requete 
    } else {
        header("location: membre.php");
    }
}

// appel de la page formulaire form.php
include_once('includes/formInscr.php');

// appel de la page footer
include_once('includes/footer.php');
?>