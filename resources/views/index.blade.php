@extends('layouts.layout')

@section('contenu')

    @include('components.Slide.slide')

    <!-- Ici le bandeau des explications sur la page index.php-->


    <div class="container content">
        <div class="row justify-content-center">
            <div class="col-md-10">


                <!-- Entete de la catégorie-->
                <div class="col-md-12 ">
                    <h1>Derniers tutoriels de nos formateurs..</h1>
                </div>
                <div class="row justify-content-center">
                    @include('components.Publication.tutoriel')
                </div>

                <div class="col-md-12 ">
                    <h1>Derniers posts de nos utilisateurs..</h1>
                </div>
                <div class="row justify-content-center">
                    @include('components.Publication.post')
                </div>
            </div>
            <div class="col-md-2 text-center">
                <div class="border rounded border-primary mb-3">
                    <h6 class="m-3"><b>Derniers Membres:</b></h6>
                    @foreach($users as $user)
                        <div class="card-row">
                            <div class="card-header m-3">
                                <a class="btn btn-light" href="/profil/{{ $user->firstname }}">
                                    <img class=" card-img-top img-fluid" src="{{asset('images/Users/default.png')}}"
                                         alt="Image de profil"><br>
                                {{ucfirst(strtolower($user->firstname))}}
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
                <img class="img-fluid"
                     style="width: 100%; border:3px solid #e5e5e5; border-radius: 2px; cursor:pointer; "
                     src="{{asset('images/bandeau_vertical.gif')}}" class="Bandeau pub">
            </div>
        </div>
    </div>

@endsection