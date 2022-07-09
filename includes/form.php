<div class="contact">
        <form id="contact-form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" role="form">
            <div class="row">
                <div class="col-lg-6">
                    <label for="firstname" class="form-label">Prénom <span class="blue">*</span></label>
                    <input id="firstname" type="text" name="firstname" class="form-control" placeholder="Votre prénom">
                    <p class="comments"><?php echo $firstnameErreur; ?> </p>
                </div>
                <div class="col-lg-6">
                    <label for="name" class="form-label">Nom <span class="blue">*</span></label>
                    <input id="name" type="text" name="name" class="form-control" placeholder="Votre Nom">
                    <p class="comments"><?php echo $nameErreur; ?></p>
                </div>
                <div class="col-lg-12">
                    <label for="email" class="form-label">Email <span class="blue">*</span></label>
                    <input id="email" type="email" name="email" class="form-control" placeholder="Votre Email">
                    <p class="comments"><?php echo $emailErreur; ?></p>
                </div>
                <div class="col-lg-12">
                    <label for="sujet" class="form-label">Sujet <span class="blue">*</span></label>
                    <input id="sujet" type="text" name="sujet" class="form-control" placeholder="Sujet">
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