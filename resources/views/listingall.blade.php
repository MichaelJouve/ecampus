@extends('layouts.layout')

@section('contenu')
    <div class="container-fluid" id="bandeau_top_categorie">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <p><a href="index.php"><i class="fa fa-car" style="color:#fff;"></i></a> &nbsp; /{{$categ->name}}
                    </p>
                    <h1>Categorie : {{$categ->name}}</h1>
                </div>

                <div class="col-md-8"></div>

                <div class="col-md 12">
                    <ul class="list-inline">
                        <a href="{{URL::route('front_listing_categorie')}}">
                            <li class="list-inline-item" id="select_cour">Sélection</li>
                        </a>
                        <a href="{{URL::route('front_listing_all')}}">
                            <li class="list-inline-item active" id="all_cour">Tous les tutoriels</li>
                        </a>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <h1>Je suis dans la section {{$categ->name}}</h1>
    </div>



    <!-- FIN CONTENU -->
@endsection

