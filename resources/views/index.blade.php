@extends('layouts.layout')

@section('contenu')

    @include('components.Slide.slide')

    <!-- Ici le bandeau des explications sur la page index.php-->


    <div class="container content">
        <div class="row justify-content-center">
            <div class="col-md-10">


                <!-- Entete de la catégorie-->
                <div class="col-md-12 m-5">
                    <h5><b>Derniers tutoriels de nos formateurs:</b></h5>
                </div>
                <div class="row justify-content-center">
                    @include('components.Publication.tutoriel')
                </div>

                <div class="col-md-12 m-5">
                    <h5><b>Derniers posts de nos utilisateurs:</b></h5>
                </div>
                <div class="row justify-content-center">
                    @include('components.Publication.post')
                </div>
            </div>
            <div class="col-md-2 text-center">
                <div class="mb-3">
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
                <div class="border border-light rounded">
                    <img class="img-fluid" style="width: 100%" src="{{asset('images/bandeau_vertical.gif')}}">
                </div>
            </div>
        </div>
    </div>

@endsection