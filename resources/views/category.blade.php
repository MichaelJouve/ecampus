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
            @foreach($categories as $category)
                <a href="{{ URL::route('listing_categorie') }}/{{ $category->name }}">
                    <li>{{$category->name}}</li>
                </a>
            @endforeach
        </ul>

    </div>

    <!-- FIN DU CONTENU-->
@endsection