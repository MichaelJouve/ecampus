@extends('layouts.layout')

@section('contenu')

    <!-- CONTENU -->
    <div class="container animated bounce content">
        <div class="row">
            <div class="col-md-3" id="profil_personnel_infos">
                <img class="img-fluid" style="border:2px solid #007791; border-radius: 4px;" src="{{asset('images/Users')}}/{{$user->image_profil}}" alt="Image de profil">

                <div id="social_profil_infos" class="mt-3">
                    <p class="text-center">
                        <a href="#"><i class="fas fa-globe" style="font-size: 1.5em; margin:0 5px;"></i></a>
                        <a href="#"><i class="fab fa-facebook-f" style="font-size: 1.5em; margin:0 5px;"></i></a>
                        <a href="#"><i class="fab fa-twitter" style="font-size: 1.5em; margin:0 5px;"></i></a>
                        <a href="{{URL::route('front-config-message')}}"><i class="far fa-envelope-open" style="font-size: 1.5em; margin:0 5px;"></i></a>

                    </p>
                </div>
                <div id="description_profil_infos">
                    <h4 class="font-weight-light">Description</h4>
                    <p>{{$user->description}}</p>
                </div>
                <div id="reputation_profil_infos">
                    <h4>Statistiques membre</h4>
                    <p>Nombre de commentaire : <b>(Le nombre de commentaires)</b><br>
                        Nombre de post : <b>(Le nombre de posts)</b><br>
                        Nombre de tutoriel(s) :  <b>(Le nombre de tuto)</b>
                    </p>
                </div>
                <div id="coordonnees_profil_infos">
                    <h4 class="font-weight-light">Coordonnées Personnel</h4>



                    <p>
                        <strong> Identité </strong>: {{ucfirst($user->firstname)}} {{ucfirst($user->name)}}<br />
                        <strong> Date de naissance</strong>: {{$user->birthdate}}<br />
                        <strong> Email </strong>: {{$user->email}}<br />
                        <strong> Date d'inscription</strong> : {{$user->created_at->format('d / m / Y')}}<br />
                    </p>



                </div>
            </div>
            <div class="col-md-9 text-center  pt-4">

                <h4 class="text-center font-weight-light">Ajouter un nouveau post ? Allez y !</h4>
                <div id="accordion">
                    <button class="btn btn-primary" data-toggle="collapse" data-target="#formulaire_ajout_post" aria-expanded="false" aria-controls="formulaire_ajout_post">
                        Publiez un Post
                    </button>
                    <button class="btn btn-primary" data-toggle="collapse" data-target="#formulaire_ajout_tuto" aria-expanded="false" aria-controls="formulaire_ajout_tuto">
                        Publier un Tutoriel
                    </button>

                    @include('components.Membres.ajoutpublication')
                </div>


                <h2 class="text-center font-weight-light pt-4">Vos dernières publications !</h2>

                <div class="row justify-content-center">

                    (On affiche les dérnieres publications de l'utilisateur)

                </div>
            </div>
        </div>
    </div>

    <!-- FIN CONTENU -->


@endsection