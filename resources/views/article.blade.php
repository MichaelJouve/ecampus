@extends('layouts.layout')

@section('contenu')
    <!-- CONTENU -->
    <div class="container-fluid  row align-items-center " id="bandeau-article">
        <div class="container">
            <div class="row ">
                <div class="col-md-8">
                    <h1>--Titre du tutoriel--</h1>
                    <p>--Description du tutoriel-- </p>
                    <p class="option_article"> <b>--Categorie du tutoriel--</b> - (Note tuto sur 10) - <b>(Nb</b> participants en cours...)</p>
                    <p class="auteur_article">Créé par --Nom User-- le --Date d'ajout-- - Derniére mise à jour le --Date MAJ--</p>
                </div>
                <!-- Bandeau d'achat-->
                <div class="col-md-4">
                    <div id="achat">
                        <img src="{{asset('images/Publications/5599.jpg')}}" alt="Image de l'article">
                    </div>
                </div>
                <!-- Bandeau d'achat-->
            </div>
        </div>
    </div>
    <div class="container content">
        <div class="row">
            <div class="col-md-8 ">
                <div id="learn">
                    <h2 class="text-center">Que vais-je apprendre dans ce tutoriel ?</h2>
                    <br>
                    <div class="row text-center">

                        <ul class="col-md-6">
                            <li> <i class="fas fa-check"></i> --Objectifs tutoriel--</li>
                        </ul>
                    </div>
                </div>
                <div id="connaissance_tutoriel">
                    <h3>Connaissances obligatoires</h3>
                    <ul>
                        <li>--Prerequis tutoriel--</li>
                    </ul>
                </div>
                <div id="descriptif_tutoriel">
                    <h3>Descriptif du tutoriel :-- Titre du tutoriel--</h3>
                    <p>-- Description du tutoriel--</p>
                </div>
                <div id="bandeau_horizontal">
                    <img class="img-fluid text-center" style="border:3px solid #e5e5e5; border-radius:2px; cursor: pointer;" src="{{asset('images/bandeau_horizontal.gif')}}" alt="Pub Horizontal">
                </div>
                <div id="formateur_app">
                    <h3>A propos du formateur</h3>
                    <div class="card animated wobble">
                        <div class="row ">
                            <div class="col-3 text-center" id="img_profil_article">
                                <a href="#"><img class="img-fluid rounded-circle" src="{{asset('images/Users/default.png')}}" alt="Image de profil"></a>
                                <p><i class="fas fa-pencil-alt"></i> &nbsp;--Nb commentaires--</p>
                                <p><i class="far fa-play-circle"></i> &nbsp; --Nb tuto User--</p>
                            </div>
                            <div class="col-9">
                                <div class="card-body">
                                    <div class="card-title"><a style="text-decoration: none; color:#007791;" href="#">--Nom et prenom User--</a><span style="font-size: 1.1em;">(Statut d'USERS)</span></div>
                                    <p class="card-text">--Description tutoriel--</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="commentaire_article">
                    <h3>Commentaire(s) de l'article</h3>
                  -- Liste des commentaires sur le tutoriel--
                </div>
            </div>
            <!-- Descriptif tutoriel bandeau droite-->
            <div class="col-md-4" id="descriptif_tutoriel_bandeau_droite">
                <p class="text-center" id="prix"> <i class="fas fa-shopping-cart"></i> -- Prix tuto --€</p>
                <div id="achat_article">
                    <a href="#">Acheter le tutoriel</a>
                </div>
                <div id="contenu_tutoriel_payant" class="text-center">
                    <p>-- Liste des fichiers--</p>
                    <p class="certificated">Tutoriel certifié par l'E-Campus</p>
                </div>
            </div>
            <!-- END Descriptif tutoriel bandeau droite-->
        </div>
    </div>
    <!-- FIN CONTENU -->
@endsection