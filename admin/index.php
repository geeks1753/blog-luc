<?php 
// on définit le titre 
$titre="luc investigation admin";

// on inclut le header
include_once('../includes/header.php');

// on inclut la navbar
include_once('../includes/navbar_admin.php');

// creation de la fonction menu
require_once("../fonctions.php");
$fonction = new site('127.0.0.1', 'root', '', 'journal');
?>

   <?php session_start();

if (isset($_SESSION['firstname']) and isset($_SESSION['pass']) and !empty($_SESSION['firstname']) and !empty($_SESSION['pass'])) {
   ?>
    <div class="deco">
		<ul>
			<li>
				<a href="deconnexion.php">Deconnexion</a> <br>
			</li>
		</ul>
	</div>
   <?php
} else {
    header("location: ../connexion.php");
}

?> 
   
        <div class="container admin">
            <div class="row">
                <h1><strong>Liste des Articles   </strong><a href="article.php" class="btn btn-success btn-lg"><span class="bi-plus"></span> Ajouter</a></h1>
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Image</th>
                      <th>Titre</th>
                      <th>Resumé</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php
                        require 'databaseJ.php';
                        $db = Database::connect();
                        $statement = $db->query( 'SELECT `ID`, `Titre`, `Resume`,`Image` FROM articles ORDER BY articles.ID DESC');
                        while($item = $statement->fetch()) {
                            echo '<tr>';
                            echo '<td>'. $item['Image'] . '</td>';
                            echo '<td>'. $item['Titre'] . '</td>';
                            echo '<td>'. $item['Resume'] . '</td>';                            
              
                            echo '<td width=250>';
                            echo '<a class="btn btn-primary" href="modifier.php?id='.$item['ID'].'"><span class="bi-pencil"></span> Modifier</a>';
                            echo ' ';
                            echo '<a class="btn btn-danger" href="supprimer.php?id='.$item['ID'].'"><span class="bi-x"></span> Supprimer</a>';
                            echo '</td>';
                            echo '</tr>';
                        }
                        Database::disconnect();
                      ?>
                  </tbody>
                </table>
            </div>
        </div>
      <div id="scroll_to_top">
          <a href="#top"><img src="../images/scrolltop.png" alt="Retourner en haut" /></a>
      </div>
    </body>
</html>
