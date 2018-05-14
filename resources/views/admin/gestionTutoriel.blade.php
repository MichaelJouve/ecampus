@extends('layouts.layout-admin')

@section('content')
    <p class="m-4 font-weight-bold">Administration / Gestion des tutoriels</p>

    <table class="table table-hover">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Catégorie</th>
            <th scope="col">Créateur</th>
            <th scope="col">Description</th>
            <th scope="col">But</th>
            <th scope="col">Prérequis</th>
            <th scope="col">Date d'ajout</th>
            <th scope="col">Modifier</th>
            <th scope="col">Supprimer</th>
        </tr>
        </thead>
        @foreach( $tutoriels as $tutorial)
            <tbody>
            <tr>
                <th scope="row">{{ $tutorial->id }}</th>
                <td>
                    <a href="{{route('front-tutorial',['slug' => $tutorial->slug])}}">
                        {{ $tutorial->title }}
                    </a>
                </td>
                <td>{{ $tutorial->Category->name}}</td>
                <td>{{ $tutorial->user->name }} {{ $tutorial->user->firstname }}</td>
                <td>{{ $tutorial->description }}</td>
                <td>{{ $tutorial->goals }}</td>
                <td>{{ $tutorial->required }}</td>
                <td>{{ $tutorial->created_at->format('d.m.Y') }}</td>
                <td><a href="">Modifier</a></td>
                <td><a href="">Supprimer</a></td>
            </tr>
            </tbody>
        @endforeach
    </table>

@endsection