@extends('layouts.layout-admin')

@section('content')
    <p class="m-4 font-weight-bold">Administration / Gestion des membres</p>
    <a class="btn btn-success ml-5 shadow" href="{{ route('admin.member.store') }}">Ajouter un membre</a>
    <table class="table table-hover mt-4">
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
        @foreach( $users as $user)
            <tbody>
            <tr>
                <th scope="row">{{ $user->id }}</th>
                <td>{{ $user->name }}</td>
                <td>{{ $user->firstname }}</td>
                <td>{{ $user->email }}</td>
                <td class="font-weight-bold">{{ $user->roles[0]->name }}</td>
                <td>{{ $user->created_at->format('d.m.Y') }}</td>
                <td><a href="{{route('admin.member.edit', ['user' => $user])}}">Modifier</a></td>
                <td><a href="">Supprimer</a></td>
            </tr>
            </tbody>
        @endforeach
    </table>

@endsection