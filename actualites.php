<?php
    // creation de la fonction menu

    require_once("fonctions.php");
    $fonction = new site('127.0.0.1', 'root', '', 'journal');
    $fonction->head();
    ?>


<header>
    <?php

    $fonction->menu();
    ?>

</header>

<div class="titre">Actualités</div>


<?php
$requete = "SELECT `Image`,`Texte`,`Titre`,`Date` FROM `articles` ORDER BY `Date` DESC; "; // Creation de la requete
$resultat = $fonction->effectuerRequete($requete); // appel de fonction qui permet d effectuer la requete
while ($row = $resultat->fetch_assoc()) {
?>

<div class="container-fluide">
    <div class="row">
        <div class="col-4">
        <div class=image>
            <?php echo "<img src='images/" . $row["Image"] . ".jpg' height='208' width='500'/>" ?>
        </div>
        </div>
        <div class="col-8">
        <div style="display:inline-block;">
            <?php echo "<a href=''> <h1 class=titreArt>" . $row['Titre'] . "</h1></a>" ?>
            <?php echo " <p class=texte>" . $row['Texte'] . "</p> " ?>
        </div><br><br><br>
        </div>
    </div>
</div>
    <?php
}
    ?>

    </div>




    <footer>
        <?php
        // appel de la fonction footer

        $fonction->footer();
        ?>
    </footer>
    </body>