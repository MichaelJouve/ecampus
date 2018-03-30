<!-- *********************************MODAL CONNEXION************************************************* -->
<div class="modal fade animated rotateIn" id="ModalConnexion" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Rejoingez l'équipe {e}Campus !</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- FORMULAIRE DE CONNEXION-->
                <form class="col-sm-12" method="POST" action="Pages/mes_fonctions.php">
                    <input type="email" id="email" name="email" placeholder="Adresse email">
                    <input type="password" id="password" name="password" placeholder="Mot de passe">
                    <input type="submit" id="submit_login" name="submit_login" value="Se connecter">
                </form>
            </div>
            <div class="modal-footer">
                <p class="pModalfooter">Vous avez oublié votre mot de passe ?</p>
                <a href="#"><img id="imgcle" src="Images/passwordforget.png" alt="passwordforget.png" width=30></a>
            </div>
            <div class="modal-footer">
                <p class="pModalfooter">Vous n'avez pas de compte ? <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#ModalInscription">Inscrivez-vous ! </a></p>
            </div>
        </div>
    </div>
</div>
<!-- *************************************************************************************************** -->

<!-- *********************************MODAL INSCRIPTION************************************************* -->
<div class="modal fade animated rotateIn" id="ModalInscription" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Inscrivez-vous et commencez l'apprentissage !</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- FORMULAIRE D'INSCRIPTION-->
                <form class="col-sm-12" method="POST" id="form_inscription" action="Pages/inscription_membre.php">
                    <input type="text" id="nom" name="nom" placeholder="Nom" nb_min="2" nb_max="15" title="Entre 2 et 15 caractères">
                    <input type="text" id="prenom" name="prenom" placeholder="Prenom" nb_min="2" nb_max="15" title="Entre 2 et 15 caractères">
                    <input type="text" id="datenaissance" name="datenaissance" class="form-control datepicker" placeholder="14/09/1989" title="Il faut ta date de naissance">
                    <input type="email" id="email_inscription" name="email" placeholder="Adresse email" title="Il faut une adresse E-mail valide">
                    <input type="password" id="password_inscription" name="password" placeholder="Mot de passe" title="Entre 8 et 20 caractères, 1 majuscule, 1 minuscule et 1 chiffre">
                    <input type="password" id="confirm-password_inscription" name="confirm-password" placeholder="Confirmation mot de passe" title="Confirmation du mot de passe">
                    <input type="button" class="btn btn-primary btn-lg btn-block" id="submit_inscription" value="S'inscrire">
                    <div class="input-group-text mt-2" id="check_cgu">
                        <input type="checkbox" id="checkbox">
                        <h6>En vous inscrivant, vous acceptez nos <a href="Pages/cgu.php">conditions générales d'utilisation.</a></h6>
                    </div>
                </form>
                <!-- FIN DE FORMULAIRE DINSCRIPTION -->
            </div>
            <div class="modal-footer">
                <p>Vous avez déja un compte ? <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#ModalConnexion">Connectez-vous </a></p>
            </div>
        </div>
    </div>
</div>
<!-- FIN DE MODAL DINSCRIPTION-->
