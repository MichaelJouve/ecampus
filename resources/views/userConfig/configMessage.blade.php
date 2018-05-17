@extends('layouts.layout')


@section('contenu')
    <!-- CONTENU -->
    <div class="container-fluid">
        @include('navBarConfig')
    </div>
    <div class="container-fluid p-4 bg-light shadow">
        <h3 class="text-center">
            Votre messagerie : Envoyer/Recevoir des messages
        </h3>
    </div>
    <div class="container-fluid conteneur_config mt-5">
        <div class="row ">
            <div class="col-lg-9 col-12 contenu_config">
                <!-- Debut de la messagerie -->
                    ICI VOTRE MESSAGERIE
                <!--****************  FIN DE MESSAGERIE   ************************************************** -->
            </div>
        </div>
    </div>
@endsection
