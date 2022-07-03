<div class="commentaire">
    <form id="contact-com" method="POST" action="" role="form">
        <div class="row">
            <div class="col-lg-6">
                <label for="firstname" class="form-label">Prénom</label>
                <input id="firstname" type="text" name="firstname" class="form-control" placeholder="Votre prénom" value="<?php echo $firstname; ?>">
                <p class="comments"><?php echo $firstnameErreur; ?> </p>
            </div>

            <div class="col-lg-6">
                <label for="name" class="form-label">Nom</label>
                <input id="name" type="text" name="name" class="form-control" placeholder="Votre nom" value="<?php echo $name; ?>">
                <p class="comments"><?php echo $nameErreur; ?> </p>
            </div>


            <div class="col-lg-12">
                <label for="pass" class="form-label">mot de passe</label>
                <input id="pass" type="pass" name="pass" class="form-control" placeholder="Votre mot de passe" value="<?php echo $pass; ?>">
                <p class="comments"><?php echo $passErreur; ?> </p>
            </div>

            <div>
                <input type="submit" class="button2" value="Connexion" name="submit-commentaire">
            </div>
                    
            <p class="thank-you" style="display:<?php if ($isSucces) echo 'block';
                                                else echo 'none'; ?>">Identifiants ou mot de passe incorect.</p>

        </div>

    </form>
</div>