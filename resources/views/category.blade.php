@extends('layouts.layout')

@section('contenu')
    <!-- CONTENU -->
    <div class="container-fluid" id="bandeau_recherche">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Liste des catégories {e]Campus </h1>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-3" id="resultat_recherche">
        <ul>
            @foreach($category = \App\Category::all() as $categ)
                <a href="{{URL::route('listing_categorie')}}/{{$categ->name}}">
                    <li>{{$categ->name}}</li>
                </a>
            @endforeach
        </ul>

    </div>

    <!-- FIN DU CONTENU-->
@endsection