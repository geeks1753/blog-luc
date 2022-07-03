<?php
// on définit le titre 
$titre = "luc investigation connexion";

// on inclut le heder
include_once('includes/header.php');

// on inclut la navbar
@include_once('includes/navbar.php');

// creation de la fonction menu
require_once("fonctions.php");
$fonction = new site('127.0.0.1', 'root', '', 'journal');


session_start();

$firstname = $pass = $name ="";
$firstnameErreur = $passErreur =$nameErreur = "";
$isSucces = false;


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $fonction->securite($_POST["firstname"]);
    $pass =  $fonction->securite($_POST["pass"]);
    $name =  $fonction->securite($_POST["name"]);
   

    if (empty($firstname)) {
        $firstnameErreur = "veuillez entrer votre prénom merci";
        $isSucces = true;
    
    } 
    if (empty($pass)) {
        $passErreur = "veuillez entrer votre mot de pass merci";
        $isSucces = true;
    }
    
    if (empty($name)) {
        $nameErreur = "veuillez entrer votre nom merci";
        $isSucces = true;
    
    } 
}

include_once('includes/formConn.php');



/*if(isset($firstname) AND !empty($firstname)
AND isset($pass) AND !empty($pass)
AND isset($name) AND !empty($name))
{
    $Pseudo = $firstname;
    $nom = $name;
    $pwd = $pass;
    $res = $fonction-> connexion ($Pseudo,$nom,$pwd);
    if ($res)
    {
        $_SESSION['prenom'] = $Pseudo;
        $_SESSION['nom'] = $nom;
        $_SESSION['pass'] = $pwd;
        header ("location: membre.php");
    }
    
}*/


$reqconn ="SELECT COUNT (*) FROM `utilisateur` WHERE `prenom` = '$firstname' AND `nom`='$name' AND `password` = '$pass';";
$resultat = $fonction->effectuerRequete($reqconn); 


if(isset($_POST['firstname']) AND !empty($_POST['firstname'])
AND isset($_POST['name']) AND !empty($_POST['name']	)
AND isset($_POST['pass']) AND !empty($_POST['pass']	))
{
   
    echo "test1";
    if ($resultat == true) {
        $_SESSION['firstname'] = $firstname;
        $_SESSION['name'] = $name;
        $_SESSION['pass'] = $pass ;
        echo "test2";
       // header("location: membre.php");
    }
    else {
       $isSucces=false;
       echo "test3";
    }
    echo "test";
}


// appel de la page footer
include_once('includes/footer.php');
?>




