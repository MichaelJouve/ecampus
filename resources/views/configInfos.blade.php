@extends('layouts.layout')


@section('contenu')
    <!-- CONTENU -->
    <div class="container-fluid conteneur_config">
        <div class="row ">
            @include('navBarConfig')
            <div class="col-lg-9 col-12 contenu_config">
                <!--****************  INFORMATIONS PERSONNELS   ************************************************** -->
                <div id="box-infos-personnel">
                    <div class="row">
                        <div class="col-md-12 text-center" id="bandeau_naviguation">
                            <h1><img src="Images/infos_perso.png" alt="Bandeau des preferences" class="img-fluid">Vos informations personnelles : Modification de vos données personnelles</h1>
                        </div>
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">
                                        <h3>Ma description</h3>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="card-text">echo $user_donnee['description']
                                    </div>
                                </div>
                                <div class="card-footer text-right">
                                    <button class="btn btn-info" data-toggle="modal" data-target="#description">Modifier</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-12 margedescription">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Mon Profil</h3>
                                </div>

                                <div class="col-11">
                                    <form>
                                        <div class="row pt-2">
                                            <div class="col-6">
                                                <h5>Nom</h5>
                                                <input type="text" class="form-control" value="echo strtoupper($user_donnee['name'])" disabled >
                                            </div>
                                            <div class="col-6">
                                                <h5>Prenom</h5>
                                                <input type="text" class="form-control" value="echo ucfirst($user_donnee['firstname'])" disabled>
                                            </div>
                                        </div>
                                    </form>
                                    <form>
                                        <div class="row">
                                            <div class="col-6">
                                                <h5>Date de Naissance</h5>
                                                <input class="form-control" type="text" value="echo date('d/m/Y', strtotime($user_donnee['birthday']))" disabled="">
                                            </div>
                                            <div class="col-6">
                                                <h5>Email</h5>
                                                <input type="text" class="form-control" value="echo($user_donnee['email']);" disabled>
                                            </div>
                                        </div>
                                    </form>
                                    <form>
                                        <div class="row">
                                            <div class="col-6">
                                                <h5>Mot de Passe</h5>
                                                <input class="form-control" type="password" value="echo $user_donnee['password']" disabled="">
                                            </div>
                                            <div class="col-6">
                                                <h5>Paypal</h5>
                                                <input type="text" class="form-control" value="echo $user_donnee['paypal']" disabled>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="card-footer text-right mt-3">
                                    <button data-target="#modif_profil" data-toggle="modal" class="btn btn-info">Modifier</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Ma Photo</h3>
                                </div>
                                <div class="card-body">
                                    <img src="Images/users/echo $user_donnee['image']" alt="Avatar Romaric" class="rounded border img-fluid offset-3 col-6">
                                </div>
                                <div class="card-footer text-right">
                                    <button class="btn btn-info" data-toggle="modal" data-target="#photo">Modifier</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--****************  FIN DE INFORMATIONS PERSONNELS   ************************************************** -->
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
