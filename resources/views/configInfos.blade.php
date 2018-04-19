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
                            <h1><img src="{{asset('images/infos_perso.png')}}" alt="Bandeau des preferences"
                                     class="img-fluid">Vos informations personnelles : Modification de vos données
                                personnelles</h1>
                        </div>
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">
                                        <h3>Ma description</h3>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="card-text">{{$user->description}}
                                    </div>
                                </div>
                                <div class="card-footer text-right">
                                    <button class="btn btn-info" data-toggle="modal" data-target="#description">
                                        Modifier
                                    </button>
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
                                                <input type="text" class="form-control"
                                                       value="{{strtoupper($user->name)}}" disabled>
                                            </div>
                                            <div class="col-6">
                                                <h5>Prenom</h5>
                                                <input type="text" class="form-control"
                                                       value="{{ucfirst($user->firstname)}}" disabled>
                                            </div>
                                        </div>
                                    </form>
                                    <form>
                                        <div class="row">
                                            <div class="col-6">
                                                <h5>Date de Naissance</h5>
                                                <input class="form-control" type="text"
                                                       value="{{$user->birthdate}}"
                                                       disabled="">
                                            </div>
                                            <div class="col-6">
                                                <h5>Email</h5>
                                                <input type="text" class="form-control"
                                                       value="{{$user->email}}" disabled>
                                            </div>
                                        </div>
                                    </form>
                                    <form>
                                        <div class="row">
                                            <div class="col-6">
                                                <h5>Mot de Passe</h5>
                                                <input class="form-control" type="password"
                                                       value="*******" disabled="">
                                            </div>
                                            <div class="col-6">
                                                <h5>Paypal</h5>
                                                <input type="text" class="form-control"
                                                       value="{{$user->paypal}}" disabled>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="card-footer text-right mt-3">
                                    <button data-target="#modif_profil" data-toggle="modal" class="btn btn-info">
                                        Modifier
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Ma Photo</h3>
                                </div>
                                <div class="card-body">
                                    <img src="{{asset('images/Users')}}/{{$user->image_profil}}" alt="Avatar Romaric"
                                         class="rounded border img-fluid offset-3 col-6">
                                </div>
                                <div class="card-footer text-right">
                                    <button class="btn btn-info" data-toggle="modal" data-target="#photo">Modifier
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--****************  FIN DE INFORMATIONS PERSONNELS   ************************************************** -->
            </div>
        </div>
    </div>

@endsection
