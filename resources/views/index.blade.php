@extends('layouts.layout')

@section('contenu')

    @include('components.Slide.slide')

    <!-- Ici le bandeau des explications sur la page index.php-->
    <div id="explication-bandeau" class="animated fadeIn">
        <div class="container ">
            <div class="row text-center">
                <div class="col-md-4 explain-bandeau"><i style="font-size:2em; color:#007791; margin-bottom: 8px;" class="fab fa-hubspot"></i>
                    <br> Des milliers de tutoriels en ligne
                    <br>Rejoignez vite la communauté E-campus!
                </div>
                <div class="col-md-4 explain-bandeau "><i style="font-size:2em;color:#007791; margin-bottom: 8px;" class="fab fa-angellist"></i>
                    <br> Des tutos de qualité par nos Formateurs
                    <br>Devenez Formateur!
                </div>
                <div class="col-md-4  explain-bandeau"><i style="font-size:2em;color:#007791; margin-bottom: 8px;" class="far fa-plus-square"></i>
                    <br>Besoin d'aide sur un sujet ?
                    <br>Envoyez un message privé ou créez un post !
                </div>
            </div>
        </div>
    </div>

    <div class="container content">
        <div class="row justify-content-center">
            <div class="col-md-10">


                <!-- Entete de la catégorie-->
                <div class="col-md-12 bandeau-titre">
                    <h1>Derniers tutoriels de nos formateurs..</h1>
                </div>
                <div class="row justify-content-center">
                    @include('components.Publication.tutoriel')
                </div>

                <div class="col-md-12 bandeau-titre">
                    <h1>Derniers posts de nos utilisateurs..</h1>
                </div>
                <div class="row justify-content-center">
                    @include('components.Publication.post')
                </div>
            </div>
            <div class="col-md-2 bandeau-pub text-center  animated bounceInRight">
                <div class="JsonConnexion">
                    <p class="title">Derniers Membres</p>
                    @foreach($uses as $user)
                        <p>
                            <img style="border:1px solid #007791;" class="img-fluid" src="{{asset('images/Users/default.png')}}" alt="Image de profil"><br>
                            <a style="text-decoration: none; font-size: 0.9em; color:#007791;" href="{{URL::route('front_profil')}}"> {{$user->name}}&nbsp;{{$user->firstname}}</a><br/>
                        </p>
                    @endforeach
                </div>
                <img class="img-fluid" style="width: 100%; border:3px solid #e5e5e5; border-radius: 2px; cursor:pointer; " src="{{asset('images/bandeau_vertical.gif')}}" class="Bandeau pub">
            </div>
        </div>
    </div>

@endsection