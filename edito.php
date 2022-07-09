<?php
// on définit le titre 
$titre = "luc investigation Articles";

require_once "jbbcode/Parser.php";


// on inclut le heder
include_once('includes/header.php');

// on inclut la navbar
@include_once('includes/navbar.php');

// creation de la fonction menu
require_once("fonctions.php");
$fonction = new site('127.0.0.1', 'root', '', 'journal');


session_start();
?>



<div class="container-fluide">
    <?php

    // recuperation des informations pour les envoyer dans les variables
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $firstname =  $fonction->securite($_POST["firstname"]);
        $message =  $fonction->securite($_POST["message"]);
    }


    $edito = $_GET["article"];
    $requeteTitre = "SELECT `Titre`, `Texte` FROM `articles` WHERE `ID`= '$edito'; "; // Creation de la requete
    $resultatTitre = $fonction->effectuerRequete($requeteTitre);



    ?>

    <div class="page">
        <?php

        $parser = new JBBCode\Parser();
        $parser->addCodeDefinitionSet(new JBBCode\DefaultCodeDefinitionSet());
        $parser->addBBCode("quote", '<blockquote>{param}</blockquote>');

        while ($Titre = $resultatTitre->fetch_assoc()) {

            echo "<div class='titre'>" . $Titre['Titre'] . "</div>";
            $parser->parse($Titre['Texte']);
            echo $parser->getAsHtml();
        }
        ?>
    </div>

    <?php
    // on inclut le formulaire des commentaires
    include_once('includes/formArt.php');


    // si action sur le bonton envoie   
    if (isset($_POST['submit-commentaire'])) {
        if (isset($_POST['firstname']) and isset($_POST['message']) and !empty($_POST['firstname'] and !empty($_POST['message']))) {
            $fistname = htmlspecialchars($_POST['firstname']);
            $message = htmlspecialchars($_POST['message']);

            // Creation de la requete            
            $requeteComm = "INSERT INTO `commentaires`( `Pseudo`, `Commentaire`, `Date`, `article_id`) 
                        VALUES ('$fistname','$message',NOW(),'$edito');";

            // appel de fonction qui permet d effectuer la requete
            $resultatComm = $fonction->effectuerRequete($requeteComm);
        } else {
            $c_erreur = "Tous les champs doivent être complétés";
        }
    }
    $requeteTable = "SELECT `Commentaire`, `Pseudo`, commentaires.Date FROM `commentaires` 
                INNER JOIN `articles` ON commentaires.article_id = articles.ID WHERE commentaires.article_id = '$edito' ORDER BY `Date` DESC;";
    $resultat = $fonction->effectuerRequete($requeteTable);


    while ($com = $resultat->fetch_assoc()) {

        echo "<div class='com'> <p> Le: " . $com['Date'] . "</p> <br>
            <p>" . $com['Pseudo'] . ": " . $com['Commentaire'] . "  </p> </div>";
    }

    ?>

</div>

<?php
// appel de la page footer
include_once('includes/footer.php');
?>