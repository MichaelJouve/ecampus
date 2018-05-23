@extends('layouts.layout-admin')

@section('content')
    <div class="row m-2 p-2">
        <p>Vous êtes connécté à l'espace <b>Administration</b> du {e}Campus</p>
    </div>

    <div class="row justify-content-center">
        <a href="{{route('admin-membres')}}" class="col-3 text-center bg-primary p-3 m-1 rounded">
            <p><i class="fas fa-users" style="color:#fff;font-size:4em;"></i></p>
            <p class="text-light font-weight-bold">{{ $users }} Utilisateurs</p>
        </a>
        <a href="{{route('admin.tutoriels')}}" class="col-2 text-center bg-primary p-3 m-1 rounded">
            <p><i class="fas fa-file-alt" style="color:#fff;font-size:4em;"></i></p>
            <p class="text-light font-weight-bold">{{ $tutoriels }} Tutoriels</p>
        </a>
        <a href="{{route('admin-posts')}}" class="col-2 text-center bg-primary p-3 m-1 rounded">
            <p><i class="far fa-clipboard" style="color:#fff;font-size:4em;"></i></p>
            <p class="text-light font-weight-bold">{{ $posts }} Posts</p>
        </a>
        <a href="{{route('admin-comments')}}" class="col-2 text-center bg-primary p-3 m-1 rounded">
            <p><i class="far fa-comment" style="color:#fff;font-size:4em;"></i></p>
            <p class="text-light font-weight-bold">{{ $comments }} Commentaires</p>
        </a>
        <a href="{{route('admin-request')}}" class="col-2 text-center bg-primary p-3 m-1 rounded">
            <p><i class="far fa-comment" style="color:#fff;font-size:4em;"></i></p>
            <p class="text-light font-weight-bold">{{ $contactRequest }} Requêtes</p>
        </a>
    </div>


@endsection