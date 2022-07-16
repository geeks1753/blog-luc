<?php
// on définit le titre 
$titre = "luc investigation modifications";

// on inclut le header
include_once('../includes/header.php');

// creation de la fonction menu
require_once("../fonctions.php");
$fonction = new site('127.0.0.1', 'root', '', 'journal');

session_start();


require 'databaseJ.php';

// initialisation des varibles 

$pseudo = $_SESSION['ID'];
    $titre = $texte = $photo = $resume = $id = "";
    $titreErreur = $texteErreur = $imageError = $resumeErreur = "";
    $isSucces = false;

    if (!empty($_GET['id'])) {
        $id = $_GET['id'];
    }

    $requeteTitre = "SELECT `Image`,`Titre`, `Resume`, `Texte` FROM `articles` WHERE `ID`= '$id'; "; // Creation de la requete
    $resultatTitre = $fonction->effectuerRequete($requeteTitre);



    while ($row = $resultatTitre->fetch_assoc()) {

        $titre = $row['Titre'];
        $texte = $row['Texte'];
        $photo = $row['Image'];
        $resume = $row['Resume'];
    }

    // recuperation des informations pour les envoyer dans les variables
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $titre              = checkInput($_POST['titre']);
        $resume             = checkInput($_POST['resume']);
        $texte              = checkInput($_POST['texte']);
        $image              = checkInput($_FILES["image"]["name"]);
        $imagePath          = '../images/' . basename($image);
        $imageExtension     = pathinfo($imagePath, PATHINFO_EXTENSION);
        $isSucces          = true;

        $titre =  $fonction->securite($_POST["titre"]);
        $texte =  $fonction->securite($_POST["texte"]);
        $resume = $fonction->securite($_POST["resume"]);


        if (empty($titre)) {
            $titreErreur = "veuillez entrer un titre merci";
            $isSucces = true;
        }
        if (empty($texte)) {
            $texteErreur = "veuillez ecrire votre article merci";
            $isSucces = true;
        }


        if (empty($resume)) {
            $resumeErreur = "veuillez résumer votre article merci";
            $isSucces = true;
        }
    }







    if (empty($image)) { // le input file est vide, ce qui signifie que l'image n'a pas ete update
        $isImageUpdated = false;
        $image = $photo;
    } else {
        $isImageUpdated = true;
        $isUploadSuccess = true;
        if ($imageExtension != "jpg" && $imageExtension != "png" && $imageExtension != "jpeg" && $imageExtension != "gif") {
            $imageError = "Les fichiers autorises sont: .jpg, .jpeg, .png, .gif";
            $isUploadSuccess = false;
        }
        if (file_exists($imagePath)) {
            $imageError = "Le fichier existe deja";
            $isUploadSuccess = false;
        }
        if ($_FILES["image"]["size"] > 600000) {
            $imageError = "Le fichier ne doit pas depasser les 600KB";
            $isUploadSuccess = false;
        }
        if ($isUploadSuccess) {
            if (!move_uploaded_file($_FILES["image"]["tmp_name"], $imagePath)) {
                $imageError = "Il y a eu une erreur lors de l'upload";
                $isUploadSuccess = false;
            }
        }
    }
    // pour pouvoir modifier un article sans forcement uploader une photo
    if (($isSucces && $isImageUpdated && $isUploadSuccess) || ($isSucces && !$isImageUpdated)) {
        $db = Database::connect();
        if ($isImageUpdated) {
            $statement = $db->prepare("UPDATE articles  set Titre = ?, Resume = ?, Texte = ?, image = ? WHERE id = ?");
            $statement->execute(array($titre, $resume, $texte, $image, $id));
        } else {
            $statement = $db->prepare("UPDATE articles  set Titre = ?, Resume = ?, Texte = ?, WHERE id = ?");
            $statement->execute(array($titre, $resume, $texte, $id));
        }
        Database::disconnect();
        header("Location: index.php");
    } else if ($isImageUpdated && !$isUploadSuccess) {
        $db = Database::connect();
        $statement = $db->prepare("SELECT * FROM articles where id = ?");
        $statement->execute(array($id));
        $item = $statement->fetch();
        $image          = $item['Image'];
        Database::disconnect();
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
<div class="form-insc">
      <a class="btn btn-primary" href="index.php"><span class="bi-arrow-left"></span> Retour</a>
</div>

<div class="contact">
    <div class="row">
       


        <form id="contact-form" class="form" role="form" action="<?php echo 'modifier.php?id=' . $id; ?>" method="post" enctype="multipart/form-data">
            <h1><strong>Modifier un Article</strong></h1>
            <br>
            <div class="col-lg-12">
                <label for="titre" class="form-label">titre de l'article <span class="blue">*</span></label>
                <input id="titre" type="text" name="titre" class="form-control" placeholder="titre de l'article" value="<?php echo $titre; ?>">
                <p class="comments"><?php echo $titreErreur; ?></p>
            </div>
            <div class="col-lg-12">
                <label for="resume" class="form-label">resume <span class="blue">*</span></label>
                <textarea id="resume" name="resume" class="form-control" placeholder="Resumé de l'article" rows="4"><?php echo $resume; ?></textarea>
                <p class="comments"><?php echo $resumeErreur; ?></p>
            </div>
            <div>
                <label for="texte" class="form-label">Article <span class="blue">*</span></label>
                <textarea id="wysibb" name="texte" class="form-control" placeholder="Votre Article" rows="4"><?php echo $texte; ?></textarea>
                <p class="comments"><?php echo $texteErreur; ?></p>
            </div>
            <br>
            <div>
                <label class="form-label" for="image">Image:</label>
                <p><?php echo $photo; ?></p><br>
                <label for="image">Sélectionner une nouvelle image:</label>
                <input type="file" id="image" name="image">
                <span class="help-inline"><?php echo $imageError; ?></span>
            </div>
            <br>
            <div class="form-actions">
                <button type="submit" class="btn btn-success" name="submit-article"><span class="bi-pencil"></span> Modifier</button>
            </div>
            
        </form>
    </div>
    <?php
    if (isset($_POST['submit-article'])) { // si action sur le bonton envoie
        if (isset($_POST["titre"]) and isset($_POST["texte"]) and isset($_POST["resume"])) {
           

            $requeteComm = "UPDATE `articles` SET `Image`='$image',
        `Texte`='$texte', `Titre`='$titre',`Date`=NOW(),`Resume`='$resume' WHERE `ID`= '$id';"; // Creation de la requete
            //var_dump($requeteComm); die();
            $resultatComm = $fonction->effectuerRequete($requeteComm); // appel de fonction qui permet d effectuer la requete 
        }
    }
    ?>
</div>
</body>

</html>