@extends('layout')

@section('ecampus-caroussel')
    <div id="carouselHome" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselHome" data-slide-to="0" class="active"></li>
            <li data-target="#carouselHome" data-slide-to="1"></li>
            <li data-target="#carouselHome" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="carousel-caption">
                    <p id="title_caroussel">Bienvenue sur {e}Campus</p>
                    <a href="Pages/listing.php?categ=HTML" id="link_caroussel">Commencez l'exploration !</a>
                </div>
            </div>
            <div class="carousel-item items2">
                <div class="carousel-caption">
                    <h5>Super site !!!!</h5>
                    <p>Site de ouf</p>
                </div>
            </div>
            <div class="carousel-item items3">
                <div class="carousel-caption">
                    <h5>Super site !!!!</h5>
                    <p>Site de ouf</p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselHome" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselHome" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

@endsection

@section('contenu')

    <!-- Ici le bandeau des explications sur la page index.php-->
    <div id="explication-bandeau" class="animated fadeIn">
        <div class="container ">
            <div class="row text-center">
                <div class="col-md-4 explain-bandeau"><i style="font-size:2em; color:#007791; margin-bottom: 8px;" class="fab fa-hubspot"></i>
                    <br> Des milliers de tutoriels en ligne
                    <br>Rejoignez vite la communauté E-campus!
                </div>
                <div class="col-md-4 explain-bandeau "><i style="font-size:2em;color:#007791; margin-bottom: 8px;" class="fab fa-angellist"></i>
                    <br> Des tutos de qualité par nos Formateurs
                    <br>Devenez Formateur!
                </div>
                <div class="col-md-4  explain-bandeau"><i style="font-size:2em;color:#007791; margin-bottom: 8px;" class="far fa-plus-square"></i>
                    <br>Besoin d'aide sur un sujet ?
                    <br>Envoyez un message privé ou créez un post !
                </div>
            </div>
        </div>
    </div>

    <div class="container text-center mt-5 mb-5">
        <h1>Je suis dans le container</h1>
    </div>
@endsection

@section('script')
    <!-- SCRIPTS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js"></script>
    <!-- bootstrap.datepicker en local pour changer anglais vers français -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script> -->
    <script type="text/javascript" src="Js/bootstrap.datepicker.js"></script>
@endsection


@section('modal')
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
                            <h6>En vous inscrivant, vous acceptez nos <a href="Pages/cgu.php">conditions générales d'utilisation.</a></h6>
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

@endsection