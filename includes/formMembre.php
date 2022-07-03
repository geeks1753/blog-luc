<div class="contact">
        <form id="contact-form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" role="form">
            <div class="row">
                <div class="col-lg-6">
                    <label for="pseudo" class="form-label">Prénom <span class="blue">*</span></label>
                    <input id="pseudo" type="text" name="pseudo" class="form-control" placeholder="Votre pseudo" value="<?php echo $pseudo; ?>">
                    <p class="comments"><?php echo $pseudoErreur; ?> </p>
                </div>
                <div class="col-lg-6">
                    <label for="image" class="form-label">Image <span class="blue">*</span></label>
                    <input id="image" type="text" name="image" class="form-control" placeholder="Nom de votre Image" value="<?php echo $image; ?>">
                    <p class="comments"><?php echo $imageErreur; ?></p>
                </div>
                <div class="col-lg-12">
                    <label for="titre" class="form-label">titre de l'article <span class="blue">*</span></label>
                    <input id="titre" type="text" name="titre" class="form-control" placeholder="titre de l'article" value="<?php echo $titre; ?>">
                    <p class="comments"><?php echo $titreErreur; ?></p>
                </div>
                <div class="col-lg-12">
                    <label for="resume" class="form-label">resume <span class="blue">*</span></label>
                    <textarea id="resume" name="resume" class="form-control" placeholder="Resumé de l'article" rows="4"><?php echo $resume; ?></textarea>
                    <p class="comments"><?php echo $resumeErreur; ?></p>
                </div>
                <div>
                    <label for="texte" class="form-label">Article <span class="blue">*</span></label>
                    <textarea id="texte" name="texte" class="form-control" placeholder="Votre Article" rows="4"><?php echo $texte; ?></textarea>
                    <p class="comments"><?php echo $texteErreur; ?></p>
                </div>
                <div>
                    <p class="blue"><strong>* Ces informations sont requises.</strong></p>
                </div>
                <div>
                    <input type="submit" class="button1" value="Envoyer">
                </div>
            </div>
        </form>
    </div>