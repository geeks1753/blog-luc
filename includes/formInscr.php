<div class="commentaire">
    <form id="contact-com" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" role="form">
        <div class="row">
        <div class="titre"><h1>Formulaire d'inscription</h1></div>
            <div class="col-lg-6">
                <label for="firstname" class="form-label">Prénom<span class="blue">*</span></label>
                <input id="firstname" type="text" name="firstname" class="form-control" placeholder="Votre prénom">
                <p class="comments"><?php echo $firstnameErreur; ?> </p>
            </div>

            <div class="col-lg-6">
                <label for="name" class="form-label">Nom<span class="blue">*</span></label>
                <input id="name" type="text" name="name" class="form-control" placeholder="Votre nom">
                <p class="comments"><?php echo $nameErreur; ?> </p>
            </div>


            <div class="col-lg-12">
                <label for="pass" class="form-label">mot de passe<span class="blue">*</span></label>
                <input id="pass" type="pass" name="pass" class="form-control" placeholder="Votre mot de passe">
                <p class="comments"><?php echo $passErreur; ?> </p>
            </div>
            <div class="col-lg-12">
                <label for="Dpass" class="form-label">Confirmation du mot de passe<span class="blue">*</span></label>
                <input id="Dpass" type="pass" name="Dpass" class="form-control" placeholder="Confirmation du mot de passe">
                <p class="comments"><?php echo $passErreur; ?> </p>
            </div>
            <div>
                    <p class="blue"><strong>* Ces informations sont requises.</strong></p>
                </div>

            <div>
                <input type="submit" class="button2" value="Envoyer" name="submit-inscription">
            </div>
                    
            <p class="thank-you" style="display:<?php if ($isSucces) echo 'block';
                                                else echo 'none'; ?>"><?php echo $Erreur;?></p>

        </div>

    </form>
</div>