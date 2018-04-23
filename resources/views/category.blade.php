@extends('layouts.layout')

@section('contenu')
    <!-- CONTENU -->
    <div class="container-fluid bandeau-sombre">
        <div class="container pt-4 pb-4">
            <div class="row">
                <div class="col-md-12">
                    <h1>Liste des catégories {e}Campus </h1>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-3">
        <ul>
            @foreach($categories as $category)
                <a href="{{ URL::route('listing-categorie') }}/{{ $category->name }}">
                    <li>{{$category->name}}</li>
                </a>
            @endforeach
        </ul>

    </div>

    <!-- FIN DU CONTENU-->
@endsection