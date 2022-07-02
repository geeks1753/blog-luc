<?php
// on définit le titre 
$titre = "luc investigation Actualités";

// on inclut le heder
include_once('includes/header.php');

// on inclut la navbar
// @: empeche d'afficher le message d'erreur
@include_once('includes/navbar.php');

// creation de la fonction menu
require_once("fonctions.php");
$fonction = new site('127.0.0.1', 'root', '', 'journal');

?>

<body>
    

        <div class="titre">Actualités</div>


        <?php

        session_start();
        $edito = "";
        $requete = "SELECT `Image`,`Resume`,`Titre`,`Date` FROM `articles` ORDER BY `Date` DESC; "; // Creation de la requete
        $resultat = $fonction->effectuerRequete($requete); // appel de fonction qui permet d effectuer la requete 
        echo "<div class='container-fluide'>";

        while ($row = $resultat->fetch_assoc()) {
        ?>

            <div class="row">
                <div class="col-4">
                    <?php echo "<img  class='imageActu' src='images/" . $row["Image"] . ".jpg' />" ?>
                </div>
                <div class="col-8">
                    <div style="display:inline-block;">
                        <a href='edito.php?article=<?php echo $row['Image']; ?>'>
                            <h1 class=titreArt> <?php echo $row['Titre']; ?></h1>
                        </a>
                        <?php echo " <p class=texte>" . $row['Resume'] . "</p> " ?>
                    </div><br><br><br>
                </div>
            </div>
    </div>
<?php
        }
?>



</div>


<?php
// appel de la page footer
include_once('includes/footer.php');
?>
</body>