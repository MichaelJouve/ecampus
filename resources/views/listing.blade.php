@extends('layouts.layout')

@section('contenu')

    @isset ($bestTutorial->best)

        <div class="container-fluid bandeau-sombre">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 pt-4">
                        <p><a href="{{URL::route('front-index')}}"><i class="fa fa-car" style="color:#fff;"></i></a>&nbsp;/&nbsp;{{ $category->name }}
                        </p>
                        <h1>TUTORIELS {{ $category->name }}</h1>
                    </div>


                    <ol class="breadcrumb">
                        <a href="{{URL::route('listing-categorie')}}">
                            <li class="breadcrumb-item active mr-3" aria-current="page">Sélection</li>
                        </a>
                        <a href="{{URL::route('listing-all')}}">
                            <li class="breadcrumb-item">Tous les tutoriels</li>
                        </a>
                    </ol>
                </div>
            </div>
        </div>

        <div class="container mb-5">
            <div class="mt-5">
                <div class="row">
                    @include('components.Publication.bestTutorial')
                </div>

                <div class="row mt-5">
                    <div class="col-md-11">
                        <p class="border-bottom">Meilleurs tutoriels de la catégorie : <b>{{ $category->name }}</b></p>
                    </div>
                    <div class="col-md-1">
                        <a href="#" class="bg-info text-light p-2 rounded link_bandeau"> Voir tout </a>
                    </div>
                </div>
                <!-- On place nos cards -->

                <div class="row">
                    @include('components.Publication.bestTutorials')
                </div>

                <!-- Derniers Posts-->
                <div class="row mt-5">
                    <div class="col-md-11">
                        <p class="border-bottom">Derniers posts de la catégorie : <b>{{ $category->name }}</b></p>
                    </div>
                    <div class="col-md-1">
                        <a href="#" class="bg-info text-light p-2 rounded link_bandeau"> Voir tout </a>
                    </div>
                </div>
                <!-- On place nos cards -->
                <div class="row">
                    @include('components.Publication.lastTutorials')
                </div>

                <!-- FIN placement des posts -->


            </div>

        </div>

    @endisset

@empty($bestTutorial->best)
    <div class="container-fluid bandeau-sombre">
        <div class="container">
            <div class="row">
                <div class="col-md-12 pt-5 pb-5 text-center">
                    <p>AUCUN TUTORIEL DISPONIBLE POUR LA CATEGORIE : <b> {{ $category->name }} </b></p>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        @include('components.404.waitpage')
    </div>
@endempty


@endsection

