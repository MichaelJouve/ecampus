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


<div id="formulaire_ajout_tuto" class="collapse" data-parent="#accordion">
    <form method="post" name="post_tuto" id="post_tuto" action="">
        <input type="hidden" name="create_tuto" value="">
        <i class="far fa-file-code" style="font-size: 3em; color:#fff;"></i>
        <p class="large_title">Nouveau Tutoriel</p>
        <p class="minuscule_title">Veuillez ajouter un nouveau tutoriel au E-campus</p>
        <hr>
        <div class="input-group mb-3">
            <select class="custom-select" id="selecteur_tuto" name="selecteur_tuto">
                <option selected disabled>Choisir une categorie de tutoriel.. </option>

            </select>
        </div>
        <label class="add_image_post">
            <i class="far fa-image" style="color:#fff;"></i>
            Ajouter une image pour ce tutoriel?<br>
            <input type="file" name="image">
        </label>
        <input type="text" name="prix" id="prix" placeholder="Prix du tutoriel (Si gratuit ne pas remplir)" title="Oui, mais combien ?">
        <input type="text" name="titre" id="titre_tuto" placeholder="Titre du tutoriel" nb_max="50" title="Maximum 50 caractères">
        <input type="text" name="objectifs" id="objectifs"  placeholder="Objectifs du tutoriel">
        <input type="text" name="prerequis" id="prerequis" placeholder="Prerequis du tutoriel">
        <input type="text" name="liste_fichier" id="liste_fichier" placeholder="La liste de vos fichiers">
        <input type="text" name="descriptif" placeholder="Un descriptif rapide de votre tutoriel.." nb_max="100" id="description_tuto" title="Maximum 100 caractères">
        <label class="add_textarea text-left">
            Ajouter un contenu pour votre tutoriel
        </label>
        <textarea id="summernote_tuto" name="contenu_tuto"></textarea>
        <input class="btn btn-danger" type="reset" value="Effacer">
        <input type="submit" value="Valider le Tutoriel" class="btn btn-primary" name="submit_tuto" id="submit_tuto">
    </form>
</div>
