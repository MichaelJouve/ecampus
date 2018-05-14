@extends('layouts.layout')

@section('contenu')

<div class="container-fluid ml-5">
    <div class="row mt-5">
        <div class="col-3">
            <img src="{{ asset($user->imgprofil) }}" alt="Image de profil" class="w-50 rounded shadow mb-2">
            <form action="" method="post" class="small">
                <input type="file" name="imgprofil" class="mb-1"><br>
                <input type="submit" value="Valider modification">
            </form>

            <p class="border-bottom mt-4 pt-2">Ma déscription</p>

            <form action="" method="post" class="small">
                <textarea> {{ $user->description }}"></textarea><br>
                <input type="submit" value=" Modifier description">
            </form>
        </div>
        <div class="col-9">

        </div>
    </div>
</div>

@endsection
