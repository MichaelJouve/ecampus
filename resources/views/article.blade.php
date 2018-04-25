@extends('layouts.layout')

@section('contenu')
    <!-- CONTENU -->
    <div class="container-fluid bandeau-sombre pt-5 pb-5">
        <div class="container">
            <div class="row ">
                <div class="col-md-8">
                    <h1>{{$tuto->title}}</h1>
                    <p>{{$tuto->description}}</p>
                    <p><b>{{$tuto->Category->name}}</b> - (Note tuto sur 10) - <b>(Nb</b> participants en cours...)</p>
                    <p class="small">Créé par {{ $tuto->user->name }} {{ $tuto->user->firstname }}
                        le{{ $tuto->created_at->format('d/m/Y \à\ h:m') }} -
                        Derniére mise à jour le {{ $tuto->updated_at->format('d/m/Y') }}</p>
                </div>
                <div class="col-md-4">
                    <img class="img_bandeau" src="{{asset('images/Publications/5599.jpg')}}" alt="Image de l'article">
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-9">

                <div class="p-2 m-2">
                    <h2>Que vais-je apprendre dans ce tutoriel ?</h2>
                    <ul class="col-md-6">
                        <li><i class="fas fa-check"></i> {{ $tuto->goals }}</li>
                    </ul>
                </div>

                <div class="m-2 p-2">
                    <h3>Connaissances obligatoires</h3>
                    <ul class="col-md-6">
                        <li><i class="fas fa-check"></i> {{ $tuto->required }}</li>
                    </ul>
                </div>
                <div class="m-2 p-2">
                    <h3>Descriptif du tutoriel :{{ $tuto->title }}</h3>
                    <p>{{$tuto->description}}</p>
                </div>


                <img class="img-fluid text-center border" src="{{asset('images/bandeau_horizontal.gif')}}"
                     alt="Pub Horizontal">


                <div class="mt-5">
                    <h3>A propos du formateur</h3>

                    <div class="card border pt-2">
                        <div class="row ">
                            <div class="col-3 text-center">
                                <a href="{{route('user-profil',['slug' => $tuto->user->slug])}}">
                                    <img class="img-fluid rounded-circle w50"
                                         src="{{asset('images/Users/default.png')}}" alt="Image de profil">
                                </a>
                                <p class="small"><i class="fas fa-pencil-alt"></i> &nbsp;--Nb commentaires--<br>
                                    <i class="far fa-play-circle"></i> &nbsp; --Nb tuto User--</p>
                            </div>
                            <div class="col-9">
                                <div class="card-body">
                                    <div class="card-title">
                                        <a href="{{route('user-profil',['slug' => $tuto->user->slug])}}">
                                            {{ $tuto->user->name }} {{ $tuto->user->firstname }}
                                        </a>
                                    </div>
                                    <p class="card-text small">
                                        {{ $tuto->user->description }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="mt-4">
                    <h3>Commentaire(s) de l'article</h3>
                    -- Liste des commentaires sur le tutoriel--
                </div>
            </div>

            <!-- Descriptif tutoriel bandeau droite-->
            <div class="col-md-3 text-center">


                    @if($tuto->price == '0')
                    <p class="text-center text-success lead font-weight-bold"> Gratuit </p>
                    <a href="{{ URL::route('affiche-publication', ['slug' => $tuto->slug]) }}"><button class="btn btn-success">Voir le tutoriel</button></a>
                    @else
                    <p class="text-center text-success lead font-weight-bold">
                    <i class="fas fa-shopping-cart"></i>
                        {{ $tuto->price }} €
                    </p>
                        <button class="btn btn-success" href="#">Acheter le tutoriel</button>
                    @endif



                <div class="text-center mt-2">
                    <p class="border">
                        Liste des fichiers<br>
                        - lalalalla
                        - lalaoaoalala
                        - kfnefknezfez
                    </p>
                    <p class="text-secondary bg-light p-3">Tutoriel certifié par l'E-Campus</p>
                </div>
            </div>
            <!-- END Descriptif tutoriel bandeau droite-->

        </div>
    </div>
    <!-- FIN CONTENU -->
@endsection