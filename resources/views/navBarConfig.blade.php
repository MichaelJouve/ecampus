<div class="row bg-dark p-2 text-center">
    <div class="col-4 border-right">
        <a href="{{URL::route('user-profil-infos')}}" class="text-light">
            <p class="text-uppercase font-weight-bold pt-2">
                <i class="far fa-user-circle" style="font-size: 1.6em; margin-right: 20px; color:#FFFFFF;"></i>
                Vos infos
            </p>
        </a>
    </div>
    <div class="col-4">
        <a href="{{URL::route('user-profil-message')}}" class="text-light">
            <p class="text-uppercase font-weight-bold pt-2">
                <i class="far fa-envelope" style="font-size: 1.6em; margin-right: 20px; color:#FFFFFF;"></i>
                Messagerie
            </p>
        </a>
    </div>
    <div class="col-4 border-left">
        <a href="{{URL::route('user-profil-preference')}}" class="text-light">
            <p class="text-uppercase font-weight-bold pt-2">
                <i class="fas fa-cogs" style="font-size: 1.6em; margin-right: 15px; color:#FFFFFF;"></i>
                Préférences
            </p>
        </a>
    </div>
</div>

