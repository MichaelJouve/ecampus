@extends('layouts.layout')

@section('contenu')
    <div class="container-fluid" id="bandeau_top_categorie">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <p><a href="{{URL::route('front-index')}}"><i class="fa fa-car" style="color:#fff;"></i></a>&nbsp;/&nbsp;{{ $category->name }}</p>
                    <h1>TUTORIELS {{ $category->name }}</h1>
                </div>

                <div class="col-md-8"></div>

                <div class="col-md 12">
                    <ul class="list-inline">
                        <a href="{{URL::route('listing-categorie')}}"><li class="list-inline-item active" id="select_cour">Sélection</li></a>
                        <a href="{{URL::route('listing-all')}}"><li class="list-inline-item" id="all_cour">Tous les tutoriels</li></a>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="container">

        <div id="section_selected">
            <div class="row">
                @include('components.Publication.bestTutorial')
            </div>

            <div id="best_cour_categorie">
                <div class="row">
                    <div class="col-md-10">
                        <p>Meilleurs tutoriels de la catégorie : <b>{{ $category->name }}</b></p>
                    </div>
                    <div class="col-md-2">
                        <a href="#"> Voir tout </a>
                    </div>

                    <!-- On place nos cards -->
                    <div class="row">
                        @include('components.Publication.bestTutorials')
                    </div>

                <!-- Derniers Posts-->
                    <div class="col-md-10 best-post">
                        <p>Derniers posts de la catégorie : <b>{{ $category->name }}</b></p>
                    </div>
                    <div class="col-md-2 best-post">
                        <a href="#"> Voir tout </a>
                    </div>

                    <!-- On place nos cards -->
                    <div class="row">
                        @include('components.Publication.lastTutorials')
                    </div>

                <!-- FIN placement des posts -->
                </div>
            </div>

        </div>

    </div>

    <!-- FIN CONTENU -->
@endsection

