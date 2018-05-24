@extends('layouts.layout-admin')

@section('content')
    <p class="m-4 font-weight-bold">Administration / Gestion des posts</p>

    <table class="table table-hover">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Catégorie</th>
            <th scope="col">Créateur</th>
            <th scope="col">Contenu</th>
            <th scope="col">Date d'ajout</th>
            <th scope="col">Modifier</th>
            <th scope="col">Supprimer</th>
        </tr>
        </thead>
        @foreach( $posts as $post)
            <tbody>
            <tr>
                <th scope="row">{{ $post->id }}</th>
                <td>
                    <a href="{{route('other-profil',['slug' => $post->user->slug])}}">
                        {{ $post->title }}
                    </a>
                </td>
                <td>{{ $post->Category->name}}</td>
                <td>{{ $post->user->name }} {{ $post->user->firstname }}</td>
                <td>{!! str_limit($post->content, $limit = 300) !!}</td>
                <td>{{ $post->created_at->format('d.m.Y') }}</td>
                <td><a href="{{route('admin-view-change-post', ['slug' => $post->slug])}}">Modifier</a></td>
                <td><a href="{{route('admin-delete-post', ['slug' => $post->slug])}}">Supprimer</a></td>
            </tr>
            </tbody>
        @endforeach
    </table>

@endsection