<?php
// on définit le titre 
$titre = "luc investigation suppression";

// on inclut le header
include_once('../includes/header.php');

// creation de la fonction menu
require_once("../fonctions.php");
$fonction = new site('127.0.0.1', 'root', '', 'journal');

require 'databaseJ.php';

if (!empty($_GET['id'])) {
    $id = checkInput($_GET['id']);
}

if (!empty($_POST)) {
    $id = checkInput($_POST['id']);
    $db = Database::connect();
    $statement = $db->prepare("DELETE * FROM articles WHERE id = ?");
    //var_dump($statement); die();
    $statement->execute(array($id));
    Database::disconnect();
    header("Location: index.php");
}

function checkInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<div id="logo">
    <img src="../images/LOGO.png" alt="Logo" id="logo" height="100" width="100" />
    <p class="logo">Luc investigation </p>
</div>

<div class="container admin">
    <div class="row">
        <h1><strong>Supprimer un Article</strong></h1>
        <br>
        <form class="form" action="supprimer.php" role="form" method="post">
            <br>
            <input type="hidden" name="id" value="<?php echo $id; ?>" />
            <p class="alert alert-warning">Etes vous sur de vouloir supprimer ?</p>
            <div class="form-actions">
                <button type="submit" name="submit-valide" class="btn btn-warning">Oui</button>
                <button type="submit" name="submit-invalide" class="btn btn-secondary">Non</button>
            </div>
        </form>
    </div>
</div>
<?php
if(isset($_POST['submit-valide'])) { // si action sur le bonton envoie

    $requeteTitre = "DELETE FROM `articles` WHERE `ID`= '$id'; "; // Creation de la requete
    $resultatTitre = $fonction->effectuerRequete($requeteTitre);

}
if(isset($_POST['submit-invalide'])) { // si action sur le bonton envoie
header("location: index.php" );
}
?>


</body>

</html>