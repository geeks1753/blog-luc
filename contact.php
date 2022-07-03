<?php
// on définit le titre 
$titre = "luc investigation contact";

// on inclut le heder
include_once('includes/header.php');

// on inclut la navbar
@include_once('includes/navbar.php');

// creation de la fonction menu
require_once("fonctions.php");

// Appel de la class
$fonction = new site('127.0.0.1', 'root', '', 'journal');

// initialisation des varibles 
$firstname = $name = $email = $sujet = $message = "";
$firstnameErreur = $nameErreur = $emailErreur = $sujetErreur = $messageErreur = "";
$isSucces = false;
$emailTo = "geeks1753@gmail.com";

// recuperation des informations pour les envoyer dans les variables
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname =  $fonction->securite($_POST["firstname"]);
    $name =  $fonction->securite($_POST["name"]);
    $email =  $fonction->securite($_POST["email"]);
    $sujet =  $fonction->securite($_POST["sujet"]);
    $message =  $fonction->securite($_POST["message"]);
    $isSucces = true;
    $emailText = "";

    if (empty($firstname)) {
        $firstnameErreur = "veuillez entrer votre prénom merci";
        $isSucces = false;
    } else {
        $emailText .= "firstname: $firstname ";
    }
    if (empty($name)) {
        $nameErreur = "veuillez entrer votre nom merci";
        $isSucces = false;
    } else {
        $emailText .= "name: $name\n";
    }
    if (!isEmail($email)) {
        $emailErreur = "veuillez entrer votre email merci";
        $isSucces = false;
    } else {
        $emailText .= "email: $email\n";
    }
    if (empty($sujet)) {
        $sujetErreur = "veuillez entrer le motif de votre message";
        $isSucces = false;
    } else {
        $emailText .= "sujet: $sujet\n";
    }

    if (empty($message)) {
        $messageErreur = "votre message est vide ";
        $isSucces = false;
    } else {
        $emailText .= "message: $message";
    }
    if ($isSucces) {
        $headers = "From: $firstname $name <$email>\r\n Reply-To: $email";
        mail($emailTo, $sujet, $emailText, $headers);
        $firstname = $name = $email = $sujet = $message = "";
    }
}

function isEmail($var)
{
    return filter_var($var, FILTER_VALIDATE_EMAIL);
}

?>



    <div class="titre">Contactez-moi</div>


    <?php
    // appel de la page formulaire form.php
    include_once('includes/form.php');


    // appel de la page footer
    include_once('includes/footer.php');
    ?>
