<?php

// on définit le titre 
$titre = "luc investigation article";

// on inclut le heder
include_once('../includes/header.php');

// creation de la fonction menu
require_once("../fonctions.php");

// Appel de la class
$fonction = new site('127.0.0.1', 'root', '', 'journal');

session_start();

?>
<div id="logo">
    <img src="../images/LOGO.png" alt="Logo" id="logo" height="100" width="100" />
    <p class="logo">Luc investigation </p>
</div>
<div class="form-insc">
    <a class="btn btn-primary" href="index.php"><span class="bi-arrow-left"></span> Retour</a>
</div>
<?php

if (isset($_SESSION['firstname']) and isset($_SESSION['pass']) and !empty($_SESSION['firstname']) and !empty($_SESSION['pass'])) {
} else {
}



// initialisation des varibles 
$pseudo = $_SESSION['ID'];
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
        $imageErreur = "veuillez indiquer selectionner votre image  ";
        $isSucces = true;
    }

    if (empty($resume)) {
        $resumeErreur = "veuillez résumer votre article merci";
        $isSucces = true;
    }
}



if (isset($_POST['submit-article'])) { // si action sur le bonton envoie
    if (
        isset($_POST["titre"]) and isset($_POST["texte"]) and isset($_POST["image"]) and isset($_POST["resume"]) and
        !empty($_POST["titre"]) and !empty($_POST["texte"]) and !empty($_POST["image"]) and !empty($_POST["resume"])
    ) {
        $iduser = intval($pseudo);

        $requeteComm = "INSERT INTO `articles`(`Texte`,`Titre`,`Date`,`Resume`,`Image`,`user_ID`) 
                    VALUES ('$texte' , '$titre' , NOW() , '$resume' , '$image' , '$iduser' )"; // Creation de la requete
        //var_dump($requeteComm); die();
        $resultatComm = $fonction->effectuerRequete($requeteComm); // appel de fonction qui permet d effectuer la requete 

        header("location: index.php");
    }
}

?>



<div class="titre">A vos stylos</div>

<div id="scroll_to_top">
    <a href="#top"><img src="../images/scrolltop.png" alt="Retourner en haut" /></a>
</div>


<?php
// appel de la page formulaire form.php
include_once('../includes/formMembre.php');


// appel de la page footer
include_once('../includes/footer.php');
?>