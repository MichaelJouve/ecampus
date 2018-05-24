@extends('layouts.layout-admin')

@section('content')
    <p class="m-4 font-weight-bold">Administration / Gestion des tutoriels</p>

    <table class="table table-hover">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Content</th>
            <th scope="col">Utilisateur</th>
            <th scope="col">Répondre</th>
            <th scope="col">Supprimer</th>

        </tr>
        </thead>
        @foreach( $contactRequests as $request)
            <tbody>
            <tr>
                <th scope="row">{{ $request->id }}</th>
                <td>{{ $request->title }}</td>
                <td>{{ $request->content}}</td>
                <td>{{ $request->user->name }} {{ $request->user->firstname }}</td>
                <td><a href="">Répondre</a></td>
                <td><a href="">Supprimer</a></td>
            </tr>
            </tbody>
        @endforeach
    </table>

@endsection