<header>
    <div class="container">
        <div class="row align-items-center ">
            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 text-center logo-image">
                <a href="index.php">
                    <img class="img-fluid" src="Images/logo_sans_ombre.png" alt="Logo E-campus" title="Logo E-campus">
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


            <div class="col-xl-3 col-lg-4 col-md-5 col-sm-12 col-xs-12 text-center justify-content-around header-link">



                <!-- Bouton de profil-->
                <div id="profil_personnel">

                    <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="dropdownLogin">
                        <img style="width: 50px; height:50px; border-radius: 50%; cursor: pointer; border:1px solid #000;" class="img-fluid" src="Images/Users/">
                    </a>

                    <a href="Pages/profil.php" style="font-size: 0.8em; text-decoration: none; margin:5px;">

                    </a>

                    <div class="dropdown-menu" aria-labelledby="dropdownLogin" >
                        <a href="Pages/config.php"> <i class="far fa-edit" style="font-size: 1.2em;"></i> Mon compte </a><br>
                        <a href="Pages/panier.php"> <i class="fas fa-shopping-bag" style="font-size: 1.2em;"></i> Mon panier </a>
                    </div>

                </div>

            </div>



        </div>
    </div>


    <div id="bouton_deconnexion">
        <form method="POST" action="Pages/mes_fonctions.php" name="deconnexion_form" id="deconnexion_form">
            <button id="deconnexion" name="deconnexion" class="btn btn-light">Déconnexion</button>
        </form>

    </div>

</header>
