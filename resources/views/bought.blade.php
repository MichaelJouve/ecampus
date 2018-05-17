@extends('layouts.layout')

@section('contenu')
    <div class="container-fluid bandeau-sombre">
        <div class="container pt-5">
            <div class="row">
                <div class="col-md-12">
                    <p><a href="{{route('user-profil-bought')}}"><i class="fa fa-home" style="color:#fff;"></i></a> /&nbsp; Liste de vos Achats</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-5 mb-5">

        <div>
            <a href="{{route('front-buy-tutorial', ['slug' => $user->slug])}}">
                <button type="submit" class="btn btn-success">Acheter</button>
            </a>
        </div>
    </div>



    <!-- FIN CONTENU -->
@endsection

