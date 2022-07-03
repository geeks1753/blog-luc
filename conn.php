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

if(isset($_POST['firstname']) && isset($_POST['name'])&& isset($_POST['pass']))
{
    // connexion à la base de données
    $db_username = 'root';
    $db_password = '';
    $db_name     = 'journal';
    $db_host     = 'localhost';
    $db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
           or die('could not connect to database');
    
    // on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
    // pour éliminer toute attaque de type injection SQL et XSS
    $firstname = mysqli_real_escape_string($db,htmlspecialchars($_POST['firstname'])); 
    $name = mysqli_real_escape_string($db,htmlspecialchars($_POST['name'])); 
    $pass = mysqli_real_escape_string($db,htmlspecialchars($_POST['pass']));
    
    if($firstname !== "" && $pass !== "" && $name !== ""     )
    {
        $requete = "SELECT count(*) FROM utilisateur where 
              nom_utilisateur = '".$firstname."' and nom = '".$name."'and mot_de_passe = '".$pass."' ";
        $exec_requete = mysqli_query($db,$requete);
        $reponse      = mysqli_fetch_array($exec_requete);
        $count = $reponse['count(*)'];
        if($count!=0) // nom d'utilisateur et mot de passe correctes
        {
           $_SESSION['username'] = $username;
           header('Location: membre.php');
        }
        else
        {
           header('Location: conn.php?erreur=1'); // utilisateur ou mot de passe incorrect
        }
    }
    else
    {
       header('Location: conn.php?erreur=2'); // utilisateur ou mot de passe vide
    }
}
else
{
   header('Location: conn.php');
}
mysqli_close($db); // fermer la connexion

// appel de la page footer
include_once('includes/footer.php');
?>




