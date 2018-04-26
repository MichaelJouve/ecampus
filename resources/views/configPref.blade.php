@extends('layouts.layout')


@section('contenu')
    <!-- CONTENU -->
    <div class="container-fluid p-4 bandeau-sombre">

        <h3 class="text-center"><img src="{{asset('images/preferences.png')}}" alt="Bandeau des preferences"
                                     class="logo-config img-fluid">Votre compte : Gestion des préférences personnelles
        </h3>
    </div>
    <div class="container-fluid conteneur_config">
        <div class="row ">
            @include('navBarConfig')
            <div class="col-lg-9 col-12 ">
                <!-- DEBUT VOS PREFERENCES -->
                <div class="row">
                    <div class="col-md-10   ">
                        <p class="title text-center">Connexion et sécurité</p>
                    </div>
                    <div class="col-md-10    ">
                        <p class="title text-center"> Informations personnelles et confidentialité</p>
                    </div>
                    <div class="col-md-10   ">
                        <p class="title text-center ">Préférences de compte</p>
                    </div>
                </div>
                <!--FIN DE VOS PREFERENCES -->
            </div>
        </div>
    </div>

@endsection
