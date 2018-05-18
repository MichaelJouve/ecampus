<!DOCTYPE html>
<html lang="fr">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Titre du site -->
    <title>Administration</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <!-- Include Quill stylesheet -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
    <link rel="icon" type="image/png" href="{{URL::asset('images/favicon.ico')}}"/>
    <link rel="stylesheet" href="{{URL::asset('css/app.css')}}">
</head>
<body>

<div class="container-fluid">
    <div class="row bg-dark text-light">
        <div class="col-2 text-center pt-2 ">
            <p class="font-weight-bold">Administration {e}Campus</p>
        </div>
        <div class="col-4 text-left pt-2">
            <a href="{{ URL::route('front-index') }}"><i class="fas fa-home"></i></a>
            <a class="ml-2" href="{{ URL::route('administration') }}"><i class="fas fa-undo-alt"></i></a>
        </div>
        <div class="col-6 pt-1">
            <form class="form-inline justify-content-end">
                <input class="form-control mr-sm-2" type="search" placeholder="Rechercher.." aria-label="Rechercher..">
                <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Rechercher</button>
            </form>
        </div>
    </div>
    <div class="row text-light">
        <div class="col-2 bg-dark text-center pt-3">
            <img src="{{ asset($user->imgprofil) }}" alt="Image de profil" class="w-50 rounded-circle shadow">
            <p class="mt-2">{{ $user->name }}  {{ $user->firstname }} | <b> {{ $user->role }}</b></p>
            
            <ul class="nav administration pb-4">
                <li class="nav-item bg-light w-100 mt-2"><a href="{{ URL::route('admin-membres') }}" class="nav-link active">Gestion des membres</a></li>
                <li class="nav-item bg-light w-100 mt-2"><a href="{{ URL::route('admin-posts') }}" class="nav-link">Gestion des posts</a></li>
                <li class="nav-item bg-light w-100 mt-2"><a href="{{ URL::route('admin.tutoriels') }}" class="nav-link">Gestion des tutoriels</a></li>
                <li class="nav-item bg-light w-100 mt-2"><a href="{{ URL::route('admin-comments') }}" class="nav-link">Gestion des commentaires</a></li>
                <li class="nav-item bg-light w-100 mt-2"><a href="{{ URL::route('admin-request') }}" class="nav-link">Gestion des requêtes</a></li>
                <hr style="background: #e3e3e3;">
                <li class="nav-item bg-light w-100 mt-2"><a href="" class="nav-link">Gestion des CGU</a></li>
                <li class="nav-item bg-light w-100 mt-2"><a href="" class="nav-link">Gestion mentions légales</a></li>
            </ul>
        </div>

        <div class="col-10 bg-light text-black-50">
                @yield('content')
        </div>
    </div>
</div>


<!-- SCRIPTS -->
<script src="{{asset('js/app.js')}}"></script>

<script src="{{asset('js/all.js')}}"></script>
<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js"></script>
</body>
</html>