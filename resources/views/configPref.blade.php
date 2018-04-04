@extends('layouts.layout')


@section('contenu')
    <!-- CONTENU -->
    <div class="container-fluid conteneur_config">
        <div class="row ">
            @include('navBarConfig')
            <div class="col-lg-9 col-12 contenu_config">
                <!-- DEBUT VOS PREFERENCES -->
                <div id="box-preferences-personnel">
                    <div class="row justify-content-center">
                        <div class="col-md-12 text-center" id="bandeau_naviguation">
                            <h1><img src="Images/preferences.png" alt="Bandeau des preferences" class="img-fluid">Votre compte : Gestion des préférences personnelles</h1>
                        </div>
                        <div class="col-md-10  box_de_preference nopadding">
                            <p class="title text-center">Connexion et sécurité</p>
                        </div>
                        <div class="col-md-10   box_de_preference nopadding">
                            <p class="title text-center"> Informations personnelles et confidentialité</p>
                        </div>
                        <div class="col-md-10  box_de_preference nopadding">
                            <p class="title text-center ">Préférences de compte</p>
                        </div>
                    </div>
                </div>
                <!--FIN DE VOS PREFERENCES -->
            </div>
        </div>
    </div>
    <!-- ***************MODAL DE MODIFICATION*************************************************************-->
    <div class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" id="description">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modification</h5>
                    <button type="button" data-dismiss="modal" class="close" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                </div>
                <form action="pages/maj.php" method="post" class="modal-body">
                    <textarea type="text" name="formulaire_description" class="form-control" placeholder="echo $user_donnee['description']"></textarea>
                    <div class="modal-footer">
                        <input type="submit" id="submit_modif" name="submit_modif" value="Valider" class="btn btn-primary" >
                </form>
            </div>
        </div>
    </div>
    </div>
    <div class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" id="photo">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modification</h5>
                    <button type="button" data-dismiss="modal" class="close" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form class="form-group">
                        <label for="Photo de profil">Selectionner</label>
                        <input name="fileToUpload" type="file" class="form-control-file" id="Photo de profil">
                </div>
                <div class="modal-footer">
                    <button type="submit" name="submit_photo" class="btn btn-secondary" data-dismiss="modal">Valider</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" id="modif_profil">
        <div class="modal-dialog" role="document">
            <form class="modal-content" method="POST" action="pages/maj.php">
                <div class="modal-header">

                    <h5 class="modal-title">Modification</h5>
                    <button type="button" data-dismiss="modal" class="close" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="row pt-2">
                        <div class="col-6">
                            <h5>Nom</h5>
                            <input type="text"  name="name"class="form-control" value="echo strtoupper($user_donnee['name'])" >
                        </div>
                        <div class="col-6">
                            <h5>Prenom</h5>
                            <input type="text" name="firstname" class="form-control" value="echo ucfirst($user_donnee['firstname'])">
                        </div>
                        <div class="col-6">
                            <h5>Date de Naissance</h5>
                            <input class="form-control" name="birthday" type="text" value="echo date('d/m/Y', strtotime($user_donnee['birthday']))">
                        </div>
                        <div class="col-6">
                            <h5>Email</h5>
                            <input type="text" name="email" class="form-control" value="echo($user_donnee['email']);">
                        </div>
                        <div class="col-6">
                            <h5>Mot de Passe</h5>
                            <input type="password" name="password" class="form-control" value="echo $user_donnee['password']" >
                        </div>
                        <div class="col-6">
                            <h5>Paypal</h5>
                            <input type="text" name="paypal" class="form-control" value="echo $user_donnee['paypal']" >
                        </div>
                    </div>

                    <div class="modal-footer">
                        <input type="submit" name="submit_profil" class="btn btn-primary" >
                    </div>
            </form>
        </div>

    </div>
    <!-- *************************FIN DE MODAL DE MODIFICATION************************************************************-->
@endsection
