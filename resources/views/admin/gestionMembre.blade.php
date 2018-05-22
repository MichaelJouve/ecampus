@extends('layouts.layout-admin')

@section('content')
    <p class="m-4 font-weight-bold">Administration / Gestion des membres</p>

    <table class="table table-hover">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nom</th>
            <th scope="col">Prenom</th>
            <th scope="col">Email</th>
            <th scope="col">Rôle</th>
            <th scope="col">Date d'enregistrement</th>
            <th scope="col">Modifier</th>
            <th scope="col">Supprimer</th>
        </tr>
        </thead>
        @foreach( $users as $utilisateur)
            <tbody>
            <tr>
                <th scope="row">{{ $utilisateur->id }}</th>
                <td>{{ $utilisateur->name }}</td>
                <td>{{ $utilisateur->firstname }}</td>
                <td>{{ $utilisateur->email }}</td>
                <td class="font-weight-bold">{{ $utilisateur->roles[0]->name }}</td>
                <td>{{ $utilisateur->created_at->format('d.m.Y') }}</td>
                <td><a href="{{route('admin-change', ['slug' => $utilisateur->slug])}}">Modifier</a></td>
                <td><a href="">Supprimer</a></td>
            </tr>
            </tbody>
        @endforeach
    </table>

@endsection