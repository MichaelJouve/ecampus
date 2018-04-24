<div class="col-lg-2 col-12 pl-5 pt-5 naviguation_config">
    <div class="row">
        <div class="block-nav col-lg-12 col-4 ">
            <a href="{{URL::route('user-profil-infos')}}"><p class="infos-personnel"> <i class="far fa-user-circle" style="font-size: 1.6em; margin-right: 20px; color:#616161;"></i>Vos infos</p></a>
        </div>
        <div class="block-nav col-lg-12 col-4">
            <a href="{{URL::route('user-profil-message')}}"><p class="votre-messagerie"> <i class="far fa-envelope" style="font-size: 1.6em; margin-right: 20px; color:#616161;"></i>Messagerie</p></a>
        </div>
        <div class="block-nav col-lg-12 col-4">
            <a href="{{URL::route('user-profil-preference')}}"><p class="preferences-personnel"> <i class="fas fa-cogs" style="font-size: 1.6em; margin-right: 15px; color:#616161;"></i>Préférences</p></a>
        </div>
    </div>
    <div class="statistiques row">
        <div class="col-lg-12 col-4">
            <p>(?) Votre nombre de posts</p>
        </div>
        <div class="col-lg-12 col-4">
            <p>(?) Votre nombre de tutoriels</p>
        </div>
        <div class="col-lg-12 col-4">
            <p>(?) Votre nombre de commentaires</p>
        </div>
    </div>
</div>