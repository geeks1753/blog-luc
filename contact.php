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
    <div class="titre">contactez-moi</div>
    <div class="box">
        <form id="contact-form" method="post" action="" role="form">
            <div class="row">
                <div class="col-lg-6">
                    <label for="firstname" class="form-label">Prénom <span class="blue">*</span></label>
                    <input id="firstname" type="text" name="firstname" class="form-control" placeholder="Votre prénom">
                    <p class="comments">Message d'erreur</p>
                </div>
                <div class="col-lg-6">
                    <label for="name" class="form-label">Nom <span class="blue">*</span></label>
                    <input id="name" type="text" name="name" class="form-control" placeholder="Votre Nom">
                    <p class="comments">Message d'erreur</p>
                </div>
                <div class="col-lg-6">
                    <label for="email" class="form-label">Email <span class="blue">*</span></label>
                    <input id="email" type="text" name="email" class="form-control" placeholder="Votre Email">
                    <p class="comments">Message d'erreur</p>
                </div>
                <div class="col-lg-6">
                    <label for="phone" class="form-label">Téléphone</label>
                    <input id="phone" type="text" name="phone" class="form-control" placeholder="Votre Téléphone">
                    <p class="comments">Message d'erreur</p>
                </div>
                <div>
                    <label for="message" class="form-label">Message <span class="blue">*</span></label>
                    <textarea id="message" name="message" class="form-control" placeholder="Votre Message" rows="4"></textarea>
                    <p class="comments">Message d'erreur</p>
                </div>
                <div>
                    <p class="blue"><strong>* Ces informations sont requises.</strong></p>
                </div>
                <div>
                    <input type="submit" class="button1" value="Envoyer">
                </div>
            </div>
            <p class="thank-you">Votre message a bien été envoyé. Merci de m'avoir contacté :)</p>
        </form>
    </div>

    <footer>
        <?php
        // appel de la fonction footer

        $fonction->footer();
        ?>
    </footer>
</body>