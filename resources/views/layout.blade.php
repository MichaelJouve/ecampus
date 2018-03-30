<!DOCTYPE html>
<html lang="fr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Titre du site -->
    <title>E-Campus - Le site des E-tudiants</title>
    <base href="http://localhost/E-Campus/"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
    <!-- Summernote usage-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="icon" type="image/ico" href="{{asset('images/favicon.ico')}}"/>
</head>
<body>
<header>
    <div class="container">
        <div class="row align-items-center ">
            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 text-center logo-image">
                <a href="#">
                    <img class="img-fluid" src="{{ asset('images/logo_sans_ombre.png') }}" alt="Logo E-campus" title="Logo E-campus">
                </a>
            </div>
            <div class="col-xl-1 col-lg-1 col-md-1 col-sm-12 col-xs-12 text-center">
                <div class="dropdown">
                    <button class="btn btn-secondary" type="button" id="dropdownMenu2" title="Choisir une catégorie" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-list"></i>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">

                        <a href="Pages/listing.php>
                            <button class="dropdown-item" type="button"></button>
                        </a>

                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-5 col-md-4 col-sm-12 col-xs-12 ">
                <form method="get" action="Pages/recherche.php">
                    <input type="text" name="recherche" id="recherche" placeholder="Que recherchez-vous?">
                </form>
            </div>

            <div class="col-xl-3 col-lg-4 col-md-5 col-sm-12 col-xs-12 text-center header-link">
                <a href="Pages/connexion.html" class="btn btn-light" title="Connectez-vous!" data-toggle="modal" data-target="#ModalConnexion">Se connecter</a>
                <a href="Pages/inscription.html" class="btn btn-primary" title="Inscrivez-vous!" data-toggle="modal" data-target="#ModalInscription">S'inscrire</a>
            </div>

        </div>
    </div>

</header>

<div class="container-fluid">
    @yield('ecampus-caroussel')
</div>
<div class="container-fluid">
    @yield('contenu')
</div>

<footer>
    <div class="container">
        <div class="row text-center">
            <div class="col-md-4" id="Ecampus_start">
                <p class="title-footer">E-Campus, qui sommes nous ? </p>
                <p>E-Campus, site d’apprentissage communautaire, permet de mettre en relation des apprentis codeurs et des professionnels qui partagent et vendent leur savoir. Devenez ce développeur, que s'arrachent aujourd’hui toutes les entreprises !</p>
            </div>
            <div class="col-md-4" id="Ecampus_start">
                <p class="title-footer">Nos derniers articles ..</p>
                <a href="#">Initiation CSS</a>
                <br>
                <a href="#">Initiation HTML</a>
                <br>
                <a href="#">Initiation JAVASCRIPT</a>
                <br>
                <a href="#">Initiation PHP</a>
            </div>
            <div class="col-md-4" id="Ecampus_start">
                <p class="title-footer">Contact</p>
                <a href="../views/cgu.blade.php">C.G.U</a>
                <br>
                <a href="#">Qui somme nous ?</a>
                <br>
                <a href="Pages/contact.php">Nous contacter</a>
            </div>
        </div>
    </div>
</footer>

@yield('script')
@yield('modal')
</body>
</html>