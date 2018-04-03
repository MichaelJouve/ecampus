@extends('layouts.homepage')

@section('contenu')
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
        <h1>Je suis dans le container et voila la page d'accueil !</h1>
    </div>

@endsection