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
            <div class="col-md-2 text-center mt-5">
                <div class="mb-3">
                    <h6 class="m-3 text-secondary border-bottom"><b>Derniers Membres</b></h6>
                    <div class="row">
                    @foreach($users as $user)
                        <div class="row justify-content-center m-2">
                                <a class="btn btn-light w50" href="{{route('other-profil',['slug' => $user->slug])}}">
                                    <img class=" card-img-top img-fluid rounded-circle" src="{{asset($user->imgprofil)}}"
                                         alt="Image de profil"><br>
                                    {{ucfirst(strtolower($user->firstname))}}
                                </a>
                        </div>
                    @endforeach
                    </div>
                </div>
                <div class="border border-light rounded">
                    <img class="img-fluid" style="width: 100%" src="{{asset('images/bandeau_vertical.gif')}}">
                </div>
            </div>
        </div>
    </div>

@endsection