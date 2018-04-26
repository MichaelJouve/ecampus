@extends('layouts.layout')

@section('contenu')
    <!-- CONTENU -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12 mt-3 mb-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ '/' }}">Accueil</a></li>
                        <li class="breadcrumb-item"><a href="{{ '/profil/'.$publication->user->slug }}">Profil</a></li>
                        <li class="breadcrumb-item"><a href="{{ '/tutoriel/'.$publication->slug }}">Tutoriel</a></li>
                        <li class="breadcrumb-item actived" aria-current="page">{{ $publication->title }}</li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-12">
                <p class="title_font">{{ $publication->title }}</p>
                <p class="by_font"> Par {{ $publication->user->firstname }} {{ $publication->user->name }}</p>
            </div>
            <div class="col-md-12 text-center">
                <hr/>
                <p>{{ $publication->description }}</p>
                <img class="w-50 rounded shadow" src="{{asset($publication->imgpublication)}}">
            </div>
            <div class="col-md-12 mt-5">
                <div class="row">
                    <div class="col-md-2 text-right">
                        <img class="rounded w-50 shadow" src="{{asset($publication->user->imgprofil)}}">
                    </div>
                    <div class="col-md-7 text-left border-left small">
                        <p>{{ $publication->user->firstname }} {{ $publication->user->name }}<br>
                         {{ $publication->user->email }}</p>
                        <p><i class="fas fa-quote-left"></i>  {{ $publication->user->description }}  <i class="fas fa-quote-right"></i></p>
                    </div>
                    <div class="col-md-2 small">
                        Vos statistiques utilisateur!
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12  border p-4 mt-2 mb-5 rounded shadow">
                {!! $publication->content !!}
            </div>
        </div>
    </div>
    <!-- FIN CONTENU -->
@endsection