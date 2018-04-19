<div id="formulaire_ajout_post" class="collapse" data-parent="#accordion">

    <form method="post" name="post_POST" id="post_POST" action="">
        <input type="hidden" name="create_post" value="">
        <i class="fab fa-stack-exchange" style="font-size: 3em; color:#fff;"></i>
        <p class="large_title">Nouveau Post</p>
        <p class="minuscule_title">Veuillez ajouter un nouveau post à votre profil.</p>
        <hr>
        <div class="input-group mb-3">
            <select class="custom-select" name="selecteur_post" id="selecteur_post">
                <option selected disabled>Choisir une categorie.. </option>

            </select>
        </div>
        <input type="text" name="titre" id="titre_post" placeholder="Titre du post" nb_max="50" title="Maximum 50 caractères">
        <label class="add_textarea text-left">
            Ajouter un contenu pour votre post
        </label>
        <textarea name="contenu_post" id="summernote_post"></textarea>
        <input class="btn btn-danger" type="reset" value="Effacer">
        <input type="submit" id="submit_post" value="Valider le post" class="btn btn-primary">
    </form>
</div>