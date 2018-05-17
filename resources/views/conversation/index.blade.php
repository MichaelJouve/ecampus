
@extends('layouts.layout')


@section('contenu')
    <!-- CONTENU -->
    <div class="container-fluid">
        @include('navBarConfig')
    </div>
    <div class="container-fluid p-4 bg-light shadow">
        <h3 class="text-center">
            Votre messagerie : Envoyer/Recevoir des messages
        </h3>
    </div>
    <div class="container-fluid conteneur_config mt-5">
        <div class="row ">
            <div class="col-md-2 text-center list-group">
                <!-- Debut de la messagerie -->
            @include('conversation.users')
            <!--****************  FIN DE MESSAGERIE   ************************************************** -->
            </div>
            <div class="col-md-10">
                <div class="card-header">{{ $otherUser->name }} {{ $otherUser->firstname }}</div>
                <div class="card-body conversations">
                    <form action="" method="POST">
                        @csrf
                        <div class="form-group">
                            <textarea name="content" placeholder="Votre message.." class="form-control" id=""  rows="4"></textarea>
                            <button class="btn btn-info m-2" type="submit">Envoyer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

