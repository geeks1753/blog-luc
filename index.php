<?php
    // creation de la fonction menu

    require_once("fonctions.php");
    $fonction = new site('127.0.0.1', 'root', '', 'journal');
    $fonction->head();
    ?>

<body>
    <header>
        <?php
        // appel de la fonction menu

        $fonction->menu();
        ?>
    </header>

    <div class="titre">Accueil</div>


    <div class=image>
        <img src="images/incendie.jpg" class="image-card" />
    </div>
    <div style="display:inline-block;">
        <a href="">
            <h1 class=titreArt> Californie : les causes de l'incendie meurtrier de 2018 enfin connues</h1>
        </a>
        <p class=texte>
            L'origine du Mendocino Comlex Fire, qui a ravagé la Californie entre juillet et septembre 2018,<br>
            vient d'être révélée. Un homme aurait utilisé un poteau en métal pour boucher un nid de guêpes de son jardin,<br>
            provoquant une étincelle qui a mis le feu aux herbes.
        </p>
    </div><br><br><br>



    <div class=image>
        <img src="images/tsunami.jpg" class="image-card" />
    </div>
    <div style="display:inline-block;">
        <a href="">
            <h1 class=titreArt> Tsunami Thaïlande </h1>
        </a>
        <p class=texte>
            Le dimanche 26 décembre 2004, à 7 h 58, heure locale, <br>
            un tremblement de terre de magnitude 9,3 se produit au large de l'Indonésie,<br>
            déclenchant un tsunami dévastateur qui fait plus de 220 000 morts.
        </p>

    </div><br><br><br>


    <div class=image>
        <img src="images/inondation.jpg" class="image-card" />
    </div>

    <div style="display:inline-block;">
        <a href="">
            <h1 class=titreArt> Inodation Vaison-la-Romaine </h1>
        </a>
        <p class=texte>
            Le 22 septembre 1992, à Vaison-la-Romaine (Vaucluse), l'Ouvèze se transforme en un furieux torrent d'eau et de boue <br>
            qui emporte tout sur son passage. La crue provoque 32 décès et quatre disparus. Près de 30 ans après, le traumatisme est resté. <br>
            Germain et Élise Ribot ont réussi à se sauver d'extrême justesse. Leur maison a été engloutie par les flots. <br>
            "L'eau qui me poussait d'un côté, l'eau qui descendait d'en haut, je ne savais plus où j'étais. Quand je suis arrivé en haut, <br>
            je voyais ma maison qui partait [...] c'était affreux", se souvient Germain Ribot, très ému. Pour tenter de tourner la page, <br>
            ils ont rebâti une maison dans un autre quartier, loin de la rivière.
        </p>

    </div><br><br><br>





    </div>


    <footer>
        <?php
        // appel de la fonction footer

        $fonction->footer();
        ?>
    </footer>
</body>