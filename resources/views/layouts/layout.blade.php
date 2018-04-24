<!DOCTYPE html>
<html lang="fr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Titre du site -->
    <title>E-Campus - Le site des E-tudiants</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <!-- Summernote usage-->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{URL::asset('images/favicon.ico')}}"/>
    <link rel="stylesheet" href="{{URL::asset('css/app.css')}}">

</head>
<body>
            @if (session()->has('message'))
            <div class="message_alert">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session()->get('message') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            @endif

<header class="p-3">
    <div class="container">
        <div class="row align-items-center ">
            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 text-center logo-image">
                <a href="{{URL::asset('/')}}">
                    <img class="img-fluid" src="{{URL::asset('images/logo_sans_ombre_leger.png')}}" alt="Logo E-campus"
                         title="Logo E-campus">
                </a>
            </div>
            <div class="col-xl-1 col-lg-1 col-md-1 col-sm-12 col-xs-12 text-center">
                <div class="dropdown">
                    <button class="btn btn-info" type="button" id="dropdownMenu2" title="Choisir une catégorie"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-list"></i>
                    </button>
                    <div class="dropdown-menu " aria-labelledby="dropdownMenu2">
                        @foreach($categories = \App\Category::all() as $category)
                            <a class="dropdown-item" href="{{URL::route('listing-categorie')}}/{{$category->name}}">
                                {{$category->name}}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-xl-5 col-lg-5 col-md-4 col-sm-12 col-xs-12 ">
                <form method="get" action="{{URL::route('search')}}">
                    <input class="form-control mr-sm-2" type="search" placeholder="Que recherchez vous ?">
                </form>
            </div>
            <div class="col-1 text-center header-link">
                <div class="panier">
                    <a href="{{URL::route('front-panier')}}" class="dropdown" id="dropdownMenuPanier"
                       title="Choisir une catégorie"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="img-fluid w50" src="{{asset('images/panier.png')}}" alt="Panier">
                    </a>
                    <div class="dropdown-menu" id="panier_hover" aria-labelledby="dropdownMenuPanier">
                        <p class="divider_panier">Votre panier est vide</p>
                        <a class="divider" href="{{URL::route('front-panier')}}">Voir le panier</a>
                    </div>
                </div>
            </div>
            @guest
                <a href="{{URL::route('login')}}" class="btn btn-light" title="Connectez-vous!">Connexion</a>
                <a href="{{URL::route('register')}}" class="btn btn-info" title="Inscrivez-vous!">S'inscrire</a>
            @else
                <div class="dropdown">
                    <button class="btn btn-info dropdown  dropdown-toggle" id="dropdownMenuProfil" title="Profil"
                            data-toggle="dropdown" aria-label="dropdownMenuProfil" aria-haspopup="true"
                            aria-expanded="false">
                        <span>{{ Auth::user()->firstname }}</span>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuProfil">
                        <a class="dropdown-item" href="{{route('user-profil',['slug' => Auth::user()->slug])}}" title="Mon Profil">
                            Profil
                        </a>
                        <a class="dropdown-item" href="{{URL::route('front-config-infos')}}">
                            Infos
                        </a>
                        <a class="dropdown-item" href="{{URL::route('front-config-message')}}">
                            Messages
                        </a>
                        <a class="dropdown-item" href="{{URL::route('front-config-preference')}}">
                            Preferences
                        </a>
                    </div>
                    <a href="{{route('logout')}}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                       class="btn btn-light" title="Deconnexion">Deconnexion</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            @endguest

        </div>
    </div>
</header>
{{--Zone de contenu--}}
@yield('contenu')
{{--Fin zone de contenu--}}
<footer class="p-4 mt-3">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-4">
                <h5>E-Campus, qui sommes nous ? </h5>
                <p>E-Campus, site d’apprentissage communautaire, permet de mettre en relation des apprentis codeurs
                    et
                    des professionnels qui partagent et vendent leur savoir. Devenez ce développeur, que s'arrachent
                    aujourd’hui toutes les entreprises !</p>
            </div>

            <div class="col-md-4">
                <h5>Nos derniers articles</h5>
                <!-- todo mettre en place l'url route direction les posts-->
                @forelse($publications = App\Publication::all()->sortByDesc('created_ad')->take(5) as $publication)
                    <a href="###">{{$publication->title}}</a>
                    <br>
                @empty
                    <p>Vide</p>
                    <br>
                @endforelse
            </div>

            <div class="col-md-4">
                <h5>Contact</h5>
                <a href="{{URL::route('front-cgu')}}">C.G.U</a>
                <br>
                <a href="{{URL::route('front-aboutus')}}">Qui somme nous ?</a>
                <br>
                <a href="{{URL::route('front-contact')}}">Nous contacter</a>
                <br>
                <a href="{{URL::route('front-rgpd')}}">Mentions légales</a>
            </div>
        </div>
    </div>
</footer>
<!-- SCRIPTS -->


<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
<script src="{{asset('js/app.js')}}"></script>

<script src="{{asset('js/all.js')}}"></script>
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js"></script>
</body>
</html>