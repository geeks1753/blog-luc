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


$firstnameErreur = $passErreur =$nameErreur = "";
$isSucces = false;


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $fonction->securite($_POST["firstname"]);
    $pass =  $fonction->securite($_POST["pass"]);
    $name =  $fonction->securite($_POST["name"]);
   

    if (empty($firstname)) {
        $firstnameErreur = " Prénom incorrect";
        $isSucces = true;
    
    } 
    if (empty($pass)) {
        $passErreur = " Mot de pass inccorect";
        $isSucces = true;
    }
    if (empty($name)) {
        $nameErreur = " Nom incorrect";
        $isSucces = true;
    }   
}   


if(isset($firstname) AND isset($name) AND isset($pass))
{
    
    $reqconn ="SELECT COUNT(*) FROM `utilisateur` WHERE `prenom` = '$firstname' AND `nom`='$name' AND `password` = '$pass';";
    $resultat = $fonction->effectuerRequete($reqconn); 
   
    
    if ($resultat ==true) {
        $ligne = mysqli_fetch_row($resultat);
         if ($ligne[0] == 1)
         {
            $_SESSION['firstname'] = $firstname;
            $_SESSION['name'] = $name;
            $_SESSION['pass'] = $pass ;
           
            //permet de coreler l'id utilisateur au pseudo de connexion 
            $reqID ="SELECT `ID`, `Grade` FROM `utilisateur` WHERE `prenom` = '$firstname' AND `nom`='$name' AND `password` = '$pass' ";
            $resultatID = $fonction->effectuerRequete($reqID); 
            while($row = $resultatID->fetch_assoc()){
                $_SESSION['ID'] = $row['ID'] ;
                $_SESSION['grade'] = $row['Grade'] ;
                
                header("location: admin/index.php");
            }
         }
         else {
            $isSucces = true;
            include_once('includes/formConn.php');  
         }
    }
} else {
    include_once('includes/formConn.php');  
 }


// appel de la page footer
include_once('includes/footer.php');
?>




