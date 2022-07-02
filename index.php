<?php 
// on définit le titre 
$titre="luc investigation Accueil";

// on inclut le heder
include_once('includes/header.php');

// on inclut la navbar
include_once('includes/navbar.php');

// creation de la fonction menu
require_once("fonctions.php");
$fonction = new site('127.0.0.1', 'root', '', 'journal');
?>

<body>
    

        <div class="titre">Accueil</div>



    <?php
    session_start();
    $requete = "SELECT `Image`,`Resume`,`Titre`,`Date` FROM `articles` ORDER BY `Date` DESC LIMIT 3; "; // Creation de la requete
    $resultat = $fonction->effectuerRequete($requete); // appel de fonction qui permet d effectuer la requete
   
    while ($row = $resultat->fetch_assoc()) {
        
    ?>
        <div class="container-fluide">
            <div class="row">
                <div class="col-4">
                        <?php echo "<img  class='image' src='images/" . $row["Image"] . ".jpg' />" ?>
                </div>
                <div class="col-8">
                    <div style="display:inline-block;"> 
                        <a href='edito.php?article=<?php echo $row['Image'];?>'> <h1 class=titreArt> <?php echo $row['Titre'];?></h1></a>
                        <?php echo " <p class=texte>" . $row['Resume']. " </p> " ?>
                    </div><br><br><br>
                </div>
            </div>
        </div>
    <?php
    }
    ?>

<?php  
        // appel de la page footer
         include_once('includes/footer.php'); 
?>
    



</body>