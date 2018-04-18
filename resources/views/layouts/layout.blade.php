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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{URL::asset('images/favicon.ico')}}"/>
    <link rel="stylesheet" href="{{URL::asset('css/all.css')}}">

</head>
<body>
<header>
    <div class="container">
        <div class="row align-items-center ">
            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 text-center logo-image">
                <a href="{{URL::asset('/')}}">
                    <img class="img-fluid" src="{{URL::asset('images/logo_sans_ombre.png')}}" alt="Logo E-campus" title="Logo E-campus">
                </a>
            </div>
            <div class="col-xl-1 col-lg-1 col-md-1 col-sm-12 col-xs-12 text-center">
                <div class="dropdown">
                    <button class="btn btn-secondary" type="button" id="dropdownMenu2" title="Choisir une catégorie" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-list"></i>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                        @foreach($categories = \App\Category::all() as $categ)
                            <a href="{{URL::route('listing_categorie')}}/{{$categ->name}}">
                                <button class="dropdown-item">{{$categ->name}}</button>
                            </a>

                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-xl-5 col-lg-5 col-md-4 col-sm-12 col-xs-12 ">
                <form method="get" action="{{URL::route('search')}}">
                    <input type="text" name="recherche" id="recherche" placeholder="Que recherchez-vous?">
                </form>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-5 col-sm-12 col-xs-12 text-center header-link">
                <div class="panier">
                    <a href="{{URL::route('front_panier')}}" id="dropdownMenu3" title="Choisir une catégorie"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="{{asset('images/panier.png')}}" alt="Panier">
                    </a>

                    <div class="dropdown-menu" id="panier_hover" aria-labelledby="dropdownMenu3">
                        <p class="divider_panier">Votre panier est vide</p>
                        <a class="divider" href="{{URL::route('front_panier')}}">Voir le panier</a>
                    </div>
                </div>
                <a href="Pages/connexion.html" class="btn btn-light" title="Connectez-vous!" data-toggle="modal" data-target="#ModalConnexion">Connexion</a>
                <a href="Pages/inscription.html" class="btn btn-primary" title="Inscrivez-vous!" data-toggle="modal" data-target="#ModalInscription">S'inscrire</a>
            </div>
        </div>
    </div>
</header>
{{--Zone de contenu--}}
@yield('contenu')
{{--Fin zone de contenu--}}
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
                <a href="{{URL::route('front_cgu')}}">C.G.U</a>
                <br>
                <a href="{{URL::route('front_aboutus')}}">Qui somme nous ?</a>
                <br>
                <a href="{{URL::route('front_contact')}}">Nous contacter</a>
            </div>
        </div>
    </div>
</footer>

<!-- SCRIPTS -->



<!-- *********************************MODAL CONNEXION************************************************* -->
<div class="modal fade animated rotateIn" id="ModalConnexion" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Rejoingez l'équipe {e}Campus !</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- FORMULAIRE DE CONNEXION-->
                <form class="col-sm-12" method="POST" action="Pages/mes_fonctions.php">
                    <input type="email" id="email" name="email" placeholder="Adresse email">
                    <input type="password" id="password" name="password" placeholder="Mot de passe">
                    <input type="submit" id="submit_login" name="submit_login" value="Se connecter">
                </form>
            </div>
            <div class="modal-footer">
                <p class="pModalfooter">Vous avez oublié votre mot de passe ?</p>
                <a href="#"><img id="imgcle" src="{{asset('images/passwordforget.png')}}" alt="passwordforget.png" width=30></a>
            </div>
            <div class="modal-footer">
                <p class="pModalfooter">Vous n'avez pas de compte ? <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#ModalInscription">Inscrivez-vous ! </a></p>
            </div>
        </div>
    </div>
</div>
<!-- *************************************************************************************************** -->

<!-- *********************************MODAL INSCRIPTION************************************************* -->
<div class="modal fade animated rotateIn" id="ModalInscription" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Inscrivez-vous et commencez l'apprentissage !</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- FORMULAIRE D'INSCRIPTION-->
                <form class="col-sm-12" method="POST" id="form_inscription" action="Pages/inscription_membre.php">
                    <input type="text" id="nom" name="nom" placeholder="Nom" nb_min="2" nb_max="15" title="Entre 2 et 15 caractères">
                    <input type="text" id="prenom" name="prenom" placeholder="Prenom" nb_min="2" nb_max="15" title="Entre 2 et 15 caractères">
                    <input type="text" id="datenaissance" name="datenaissance" class="form-control datepicker" placeholder="14/09/1989" title="Il faut ta date de naissance">
                    <input type="email" id="email_inscription" name="email" placeholder="Adresse email" title="Il faut une adresse E-mail valide">
                    <input type="password" id="password_inscription" name="password" placeholder="Mot de passe" title="Entre 8 et 20 caractères, 1 majuscule, 1 minuscule et 1 chiffre">
                    <input type="password" id="confirm-password_inscription" name="confirm-password" placeholder="Confirmation mot de passe" title="Confirmation du mot de passe">
                    <input type="button" class="btn btn-primary btn-lg btn-block" id="submit_inscription" value="S'inscrire">
                    <div class="input-group-text mt-2" id="check_cgu">
                        <input type="checkbox" id="checkbox">
                        <h6>En vous inscrivant, vous acceptez nos <a href="{{URL::route('front_cgu')}}">conditions générales d'utilisation.</a></h6>
                    </div>
                </form>
                <!-- FIN DE FORMULAIRE DINSCRIPTION -->
            </div>
            <div class="modal-footer">
                <p>Vous avez déja un compte ? <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#ModalConnexion">Connectez-vous </a></p>
            </div>
        </div>
    </div>
</div>
<!-- FIN DE MODAL DINSCRIPTION-->


<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
<script src="{{asset('js/app.js')}}"></script>

<script src="{{asset('js/all.js')}}"></script>
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js"></script>
</body>
</html>