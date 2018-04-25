@extends('layouts.layout')


@section('contenu')
    <!-- CONTENU -->
    <div class="container-fluid conteneur_config">
        <div class="row ">
            @include('navBarConfig')
            <div class="col-lg-9 col-12 contenu_config">
                <!-- Debut de la messagerie -->
                @foreach($users as $user)
                <ul>
                    <li>
                        {{ $user->name }}
                    </li>
                </ul>
                @endforeach












                <!--****************  FIN DE MESSAGERIE   ************************************************** -->
            </div>
        </div>
    </div>
@endsection
