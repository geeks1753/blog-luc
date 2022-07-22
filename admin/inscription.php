<?php

session_start();

// on définit le titre 
$titre = "luc investigation ";

require_once "jbbcode/Parser.php";

// on inclut le heder
include_once('../includes/header.php');


?>
<div id="logo">
    <img src="../images/LOGO.png" alt="Logo" id="logo" height="100" width="100" />
    <p class="logo">Luc investigation </p>
</div>

<div class="form-insc">
    <a class="btn btn-primary" href="index.php"><span class="bi-arrow-left"></span> Retour</a>
</div>





<?php

// creation de la fonction menu
require_once("../fonctions.php");
$fonction = new site('127.0.0.1', 'root', '', 'journal');

$firstname = $pass = $Dpass  = $name = "";
$firstnameErreur = $passErreur = $DpassErreur = $nameErreur = $Erreur = "";
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

// appel de la page formulaire form.php
include_once('../includes/formInscr.php');

if (isset($_POST['submit-inscription'])) // si action sur le bonton envoie
{

    if (isset($_POST["firstname"]) and !empty($_POST["firstname"]) and isset($_POST["pass"]) and !empty($_POST["pass"])
        and isset($_POST["Dpass"]) and !empty($_POST["Dpass"]) and isset($_POST["name"]) and !empty($_POST["name"])) 
    {
        // Test de MDP
        if ($pass != $Dpass) {
            $Erreur = "Veuillez rentrer un code identique";
        }
        //compte existe deja
        if ($fonction->TestCompte($name, $firstname)) 
        {
            $Erreur = "Ce compte existe déjà";
        } 
       
            $requeteComm = "INSERT INTO `utilisateur`(`prenom`,`password`,`nom`,`grade`) 
                        VALUES ('$firstname','$pass','$name', 0 )"; // Creation de la requete
            $resultatComm = $fonction->effectuerRequete($requeteComm); // appel de fonction qui permet d effectuer la requete 

          

            header("location: index.php");
        
    }
}



?>