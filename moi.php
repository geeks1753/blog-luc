<?php
// on définit le titre 
$titre = "luc investigation présentation";

// on inclut le heder
include_once('includes/header.php');

// on inclut la navbar
@include_once('includes/navbar.php');

// creation de la fonction menu
require_once("fonctions.php");
$fonction = new site('127.0.0.1', 'root', '', 'journal');
?>





	<div class="titre">Je me Présente</div>

	<div class="CV">
		<ul>
			<li>
				<a href="dossier/cv.pdf" download="dossier/cv.pdf">Téléchargement de mon CV</a>
			</li>
		</ul>
	</div>

	<div class="imgProf"><img src="images/charlie.jpg"></div>

	<div class="page">

		<div class="prenom">
			<h1> Luc </h1>
			<p>Journalist d'investigation sur les catastrophes naturelles </p>

		</div>


		<div class="presentation">
			<p>Je suis journaliste depuis 35 ans déja, j'ai sillonné la planètes de fond en comble à la recherche de la moindre catastrophe naturelle .
				afin de vous faire vivre ma passion et vous alerter sur l'avenir climatique je vouspartage ces articles
				La priorité c'est de vous informer, et de vous faire reagir.
				du coup vous avez la possibilité de commenter vous même les articles
			</p>

		</div>


	</div>

	<?php
	// appel de la page footer
	include_once('includes/footer.php');
	?>

