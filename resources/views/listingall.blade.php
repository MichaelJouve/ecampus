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

            <div class="col-md-12 rounded mt-5 mb-5">
                <div class="ribbon"><span>{{ $tutorial->Category->name }}</span></div>
                <div class="row">
                    <div class="col-md-3 p-0">
                        <a href="{{route('front-tutorial',['slug' => $tutorial->slug])}}">
                            <img src="{{asset('storage/'.$tutorial->imgpublication)}}" alt="Image du tutoriel"
                                 style="width: 280px; height: 170px;" class="shadow">
                        </a>
                    </div>

                    <div class="col-md-9 pl-5">
                        <div class="row">
                            <div class="col-md-9 mt-3">
                                <h2>{{ $tutorial->title }}</h2>
                                <p class="font-weight-bold p-2 bg-light">{{ $tutorial->description }}</p>
                                <p class="small">
                                    Proposé par
                                    <a href="{{ route('user-profil', ['slug' => $tutorial->user->slug ])}}"
                                       class="link_to_card">
                                        {{ $tutorial->user->name }} {{ $tutorial->user->firstname }}
                                    </a>
                                    <br>
                                Partagé le  {{ $tutorial->created_at->format('d.m.Y') }}</p>
                            </div>
                            <div class="col-md-3 border-left">
                                <p class="text-light lead">
                                    @if( $tutorial->price == '0')
                                        Tutoriel gratuit
                                    @else
                                        {{ $tutorial->price }}<b>€</b>
                                    @endif
                                </p>
                                <p><i class="far fa-edit"></i> {{ $tutorial->comment->count() }} commentaire(s)</p>
                                <p><i class="far fa-user-circle"></i>
                                    @if($tutorial->consultation == null)
                                        <em>Auncun visionnage</em>
                                        @else
                                    {{ $tutorial->consultation->occurrences }} visionnages
                                        @endif
                                </p>
                                <a href="{{route('front-tutorial',['slug' => $tutorial->slug])}}" class="btn btn-info">Visionner</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
        @endforeach
        <div class="row justify-content-center mt-5">
            {{ $groupTutorials->links() }}
        </div>
    </div>



    <!-- FIN CONTENU -->
@endsection

