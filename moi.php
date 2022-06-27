<?php
// creation de la fonction menu

require_once("fonctions.php");
$fonction = new site('127.0.0.1', 'root', '', 'journal');
$fonction->head();
?>


<body>


	<header>

		<?php include_once('header.php'); // appel de la page header
		?>

	</header>

	<div class="titre">Je me Présente</div>
	<div class="box">
		<article>
			<h1> Kohl-Web-Design</h1><br>
			<p>Concepteur de site web et de logos</p>

			<p>kohl-web-Design, créateur de site internet et de logos, vous propose de vous accompagner dans vos projets digitaux.</p>
			<p> - Anisi nous pouvons créer ou modifier vos sites internet et vos logos</p>
			<p> - La priorité c'est de vous créer un site ou un logo qui répondent le plus possible à votre image .</p>
			<p> - Vous avez la possibilité d'administrer vous même votre site</p><br><br><br><br><br><br><br><br>
			<p>pour essai</p>



		</article>

	</div>
	
	<aside>
		<h1>À propos de l'auteur</h1>

		<p>Passionné d'informatique et de dessin depuis de nombreuses années </p>
		<p>du coup allier le design et la creativité était pour moi une évidence</p>
		<div class="reseau">
			<a href="#"><i class="icon ion-social-instagram"></i></a>
			<a href="https://www.facebook.com/" target="_blank"><i class="icon ion-social-facebook"></i></a>
		</div>
	</aside>




	<footer>
		<?php include_once('footer.php'); // appel de la page footer
		?>
	</footer>
</body>