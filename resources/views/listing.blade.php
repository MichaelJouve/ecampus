@extends('layouts.layout')

@section('contenu')
    <div class="container-fluid" id="bandeau_top_categorie">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <p><a href="index.php"><i class="fa fa-car" style="color:#fff;"></i></a> &nbsp; /(Categorie)</p>
                    <h1>(Categorie)</h1>
                </div>

                <div class="col-md-8"></div>

                <div class="col-md 12">
                    <ul class="list-inline">
                        <li class="list-inline-item active" id="select_cour">Sélection</li>
                        <li class="list-inline-item" id="all_cour">Tous les tutoriels</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="container">

        <!-- SECTION CATEGORIE -->
        <div id="section_selected">
            <div class="row">
                (Meilleur tuto de la catégorie)
            </div>

            <div id="best_cour_categorie">
                <div class="row">
                    <div class="col-md-10">
                        <p>Meilleurs tutoriels de la catégorie : <b>(Catégorie)</b></p>
                    </div>
                    <div class="col-md-2">
                        <a href="#"> Voir tout </a>
                    </div>

                    <!-- On place nos cards -->
                (Best tutos catégorie)
                <!-- Derniers Posts-->
                    <div class="col-md-10 best-post">
                        <p>Derniers posts de la catégorie : <b>(Catégorie)</b></p>
                    </div>
                    <div class="col-md-2 best-post">
                        <a href="#"> Voir tout </a>
                    </div>

                    <!-- On place nos cards -->
                (Last tuto catégorie)


                <!-- FIN placement des posts -->
                </div>
            </div>

        </div>
        <!-- END SECTION CATEGORIE -->

        <!-- START SELCTION ALL -->

        <div id="section_all">
            <div class="row">
                <div class="col-md-12" id="filter-menu">
                    <ul class="nopadding">
                        <li class="button activate" data-filter="all">Tous</li>

                       (Ici on check la base de données)

                        <div style="clear:both;"></div>
                    </ul>
                </div>

                (Tous les tutoriels)



                <div class="col-md-4">
                    <ul class="pagination">
                        <li><a href="#"><</a></li>
                        <li class="actived"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">></a></li>
                    </ul>
                </div>

            </div>


        </div>

        <!-- END SECTION ALL -->
    </div>

    <!-- FIN CONTENU -->
@endsection