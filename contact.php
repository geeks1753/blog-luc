<?php

require_once("fonctions.php");
$fonction = new site('127.0.0.1', 'root', '', 'journal'); // Appel de la class

$firstname = $name = $email = $sujet = $message = ""; // initialisation des varibles 
$firstnameErreur = $nameErreur = $emailErreur = $sujetErreur = $messageErreur = "";
$isSucces = false;
$emailTo = "geeks1753@gmail.com";

if ($_SERVER["REQUEST_METHOD"] == "POST") // recuperation des informations pour les envoyer dans les variables
{
    $firstname =  $fonction->securite($_POST["firstname"]);
    $name =  $fonction->securite($_POST["name"]);
    $email =  $fonction->securite($_POST["email"]);
    $sujet =  $fonction->securite($_POST["sujet"]);
    $message =  $fonction->securite($_POST["message"]);
    $isSucces = true;
    $emailText = "";

    if (empty($firstname)) {
        $firstnameErreur = "veuillez entrer votre prénom merci";
        $isSucces = false;
    } else {
        $emailText .= "firstname: $firstname ";
    }
    if (empty($name)) {
        $nameErreur = "veuillez entrer votre nom merci";
        $isSucces = false;
    } else {
        $emailText .= "name: $name\n";
    }
    if (!isEmail($email)) {
        $emailErreur = "veuillez entrer votre email merci";
        $isSucces = false;
    } else {
        $emailText .= "email: $email\n";
    }
    if (empty($sujet)) {
        $sujetErreur = "veuillez entrer le motif de votre message";
        $isSucces = false;
    } else {
        $emailText .= "sujet: $sujet\n";
    }

    if (empty($message)) {
        $messageErreur = "votre message est vide ";
        $isSucces = false;
    } else {
        $emailText .= "message: $message";
    }
    if ($isSucces) {
        $headers = "From: $firstname $name <$email>\r\n Reply-To: $email";
        mail($emailTo, $sujet, $emailText, $headers);
        $firstname = $name = $email = $sujet = $message = "";
    }
}

function isEmail($var)
{
    return filter_var($var, FILTER_VALIDATE_EMAIL);
}






$fonction->head(); // Appel de la fonction d'entete
?>

<body>

    <header>
        <?php

        $fonction->menu();
        ?>

    </header>
    <div class="titre">contactez-moi</div>
    <div class="contact">
        <form id="contact-form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" role="form">
            <div class="row">
                <div class="col-lg-6">
                    <label for="firstname" class="form-label">Prénom <span class="blue">*</span></label>
                    <input id="firstname" type="text" name="firstname" class="form-control" placeholder="Votre prénom" value="<?php echo $firstname; ?>">
                    <p class="comments"><?php echo $firstnameErreur; ?> </p>
                </div>
                <div class="col-lg-6">
                    <label for="name" class="form-label">Nom <span class="blue">*</span></label>
                    <input id="name" type="text" name="name" class="form-control" placeholder="Votre Nom" value="<?php echo $name; ?>">
                    <p class="comments"><?php echo $nameErreur; ?></p>
                </div>
                <div class="col-lg-12">
                    <label for="email" class="form-label">Email <span class="blue">*</span></label>
                    <input id="email" type="email" name="email" class="form-control" placeholder="Votre Email" value="<?php echo $email; ?>">
                    <p class="comments"><?php echo $emailErreur; ?></p>
                </div>
                <div class="col-lg-12">
                    <label for="sujet" class="form-label">Sujet <span class="blue">*</span></label>
                    <input id="sujet" type="text" name="sujet" class="form-control" placeholder="Sujet" value="<?php echo $sujet; ?>">
                    <p class="comments"><?php echo $sujetErreur; ?></p>
                </div>
                <div>
                    <label for="message" class="form-label">Message <span class="blue">*</span></label>
                    <textarea id="message" name="message" class="form-control" placeholder="Votre Message" rows="4"><?php echo $message; ?></textarea>
                    <p class="comments"><?php echo $messageErreur; ?></p>
                </div>
                <div>
                    <p class="blue"><strong>* Ces informations sont requises.</strong></p>
                </div>
                <div>
                    <input type="submit" class="button1" value="Envoyer">
                </div>
            </div>
            <p class="thank-you" style="display:<?php if ($isSucces) echo 'block';
                                                else echo 'none'; ?>">Votre message a bien été envoyé. Merci de m'avoir contacté.</p>
        </form>
    </div>

    <footer>
        <?php
        // appel de la fonction footer

        $fonction->footer();
        ?>
    </footer>
</body>