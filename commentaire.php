<?php
// creation de la fonction menu

require_once("fonctions.php");
$fonction = new site('127.0.0.1', 'root', '', 'journal');
$fonction->head();
?>

<body>

	<header>
		<?php

		$fonction->menu();
		?>

	</header>
	<div class="titre">Votre pojet de sites</div>
	<div class="box">

		<article>
			<h1> votre projet en 4 étapes </h1><br>
			<p>
				Etude de votre projet
				Quels sont les objectifs de votre site internet ? S’agit il d’un site personnel ? Ou professionnel ?

				Mise en place d’un cahier des charges

				Conseil sur l’hébergement de votre site .
				Choix du design,couleurs et graphisme de votre site internet.
				Choix des divers modules et composants (Galeries photos,composant E-commerce,composant petites annonces,etc.)
				Choix de votre logo si vous n’en avez pas.
			</p>

			<p>

				Edition de votre devis et versement d’arrhes

				web-services-design vous éditera un devis .
				Le versement des arrhes valide votre projet.
			</p>

			<p>

				Construction et finalisation de votre site internet

				Une fois le site construit il sera transféré sur votre hébergement puis mis en ligne.
				Insertion de vos mots clefs,et référencement de votre site.
				web-services-design effectuera une sauvegarde de votre site à l’aide du composant intégré dans votre site.
				Une fois votre site en ligne vous avez 8 jours pour solder votre site.
				Une fois votre site soldé vous recevrez vos codes personnels de connexion admin.
				web-services-design offre une formation de 2h à l’administration de votre site par téléphone où à mon domicile.
				Nous étudierons votre demande et répondrons dans les meilleurs délais.
				Votre étude de devis est gratuite et sans engagement de votre part.
			</p>

		</article>
		<div id="conteneur">
			<img src="images/zen1.jpg">
			<img class="image-de-dessus" src="images/zen2.jpg">
		</div>







		<footer>
			<?php
			// appel de la fonction footer

			$fonction->footer();
			?>
		</footer>
</body>