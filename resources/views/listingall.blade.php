@extends('layouts.layout')

@section('contenu')
    <div class="container-fluid bandeau-sombre">
        <div class="container pt-5">
            <div class="row">
                <div class="col-md-12">
                    <p><a href="index.php"><i class="fa fa-car" style="color:#fff;"></i></a> /&nbsp; Liste de tous les
                        tutoriels</p>
                </div>
            </div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <a href="{{URL::route('listing-categorie')}}">
                        <li class="breadcrumb-item mr-3">Liste des catégories</li>
                    </a>
                    <a href="{{URL::route('listing-all')}}">
                        <li class="breadcrumb-item active" aria-current="page"> Tous les tutoriels</li>
                    </a>
                </ol>
            </nav>

        </div>
    </div>

    <div class="container mt-5 mb-5">
        @foreach ($groupTutorials as $tutorial)

            <div class="col-md-12 rounded mt-5 shadow">
                <div class="ribbon"><span>{{ $tutorial->Category->name }}</span></div>
                <div class="row">
                    <div class="col-md-3 p-0">
                        <a href="{{route('front-tutorial',['slug' => $tutorial->slug])}}">
                            <img src="{{asset('storage/'.$tutorial->imgpublication)}}" alt="Image du tutoriel"
                                 class="img_bandeau">
                        </a>
                    </div>

                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-9 mt-3">
                                <h2>{{ $tutorial->title }}</h2>
                                <p>{{ $tutorial->description }}</p>
                                <p class="small">
                                    Proposé par
                                    <a href="{{ route('user-profil', ['slug' => $tutorial->user->slug ])}}"
                                       class="link_to_card">
                                        {{ $tutorial->user->name }} {{ $tutorial->user->firstname }}
                                    </a>
                                </p>
                            </div>
                            <div class="col-md-3">

                                <p class="text-success lead">{{ $tutorial->price }}<b>€</b></p>
                                <p>NOTE TUTO</p>
                                <p>NB NOTES TUTO</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>



    <!-- FIN CONTENU -->
@endsection

