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


                                    <div class="card-footer text-right">
                                        <button class="btn btn-info" data-toggle="modal" data-target="#description">
                                            Modifier
                                        </button>
                                        Modifier
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-12 margedescription">
                                <form action="{{URL::route('update_info')}}" method="post">
                                    @csrf
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Mon Profil</h3>
                                        </div>

                                        <div class="col-11">
                                            <form>
                                                <div class="row pt-2">
                                                    <div class="col-6">
                                                        <h5>Nom</h5>

                                                        <input id="name" type="text"
                                                               class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                                               name="name" value="{{strtoupper($user->name)}}">


                                                    </div>
                                                    <div class="col-6">
                                                        <h5>Prenom</h5>
                                                        <input id="firstname" type="text"
                                                               class="form-control{{ $errors->has('firstname') ? ' is-invalid' : '' }}"
                                                               name="firstname" value="{{ucfirst($user->firstname)}}">
                                                    </div>
                                                </div>
                                            </form>
                                            <form>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <h5>Date de Naissance</h5>
                                                        <input id="birthdate" type="text"
                                                               class="form-control{{ $errors->has('birthdate') ? ' is-invalid' : '' }}"
                                                               name="birthdate" value="{{$user->birthdate}}">
                                                    </div>
                                                    <div class="col-6">
                                                        <h5>Email</h5>
                                                        <input id="email" type="text"
                                                               class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                                               name="email" value="{{$user->email}}">
                                                    </div>
                                                </div>
                                            </form>
                                            <form>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <h5>Paypal</h5>
                                                        <input id="paypal" type="text"
                                                               class="form-control{{ $errors->has('paypal') ? ' is-invalid' : '' }}"
                                                               name="paypal" value="{{$user->paypal}}">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                        <div class="card-footer text-right mt-3">
                                            <input type="submit" value="Modifier" name="submit_profil"
                                                   class="btn btn-info">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Ma Photo</h3>
                                    </div>
                                    <div class="card-body">
                                        <img src="{{asset('images/Users')}}/{{$user->image_profil}}"
                                             alt="Avatar Romaric"
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
                </div>
            </div>
        </div>
        <!--****************  FIN DE INFORMATIONS PERSONNELS   ************************************************** -->
        <div class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" id="modif_profil">
            <div class="modal-dialog" role="document">
                <form class="modal-content" method="POST" action="{{URL::route('update_info')}}">
                    @csrf
                    <div class="modal-header">

                        <h5 class="modal-title">Modification</h5>
                        <button type="button" data-dismiss="modal" class="close" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="row pt-2">
                            <div class="col-6">
                                <h5>Nom</h5>
                                <input type="text" name="name" class="form-control"
                                       value="{{strtoupper($user->name)}}">
                            </div>
                            <div class="col-6">
                                <h5>Prenom</h5>
                                <input type="text" name="firstname" class="form-control"
                                       value="{{ucfirst($user->firstname)}}">
                            </div>
                            <div class="col-6">
                                <h5>Date de Naissance</h5>
                                <input class="form-control" name="birthday" type="text"
                                       value="{{$user->birthdate}}">
                            </div>
                            <div class="col-6">
                                <h5>Email</h5>
                                <input type="text" name="email" class="form-control"
                                       value="{{$user->email}}">
                            </div>
                            <div class="col-6">
                                <h5>Paypal</h5>
                                <input type="text" name="paypal" class="form-control"
                                       value="{{$user->paypal}}">
                            </div>
                        </div>

                        <div class="modal-footer">
                            <input type="submit" name="submit_profil" class="btn btn-primary">
                        </div>
                    </div>

                </form>
            </div>
        </div>
        <!--****************             FIN DES MODALS    ************************************************** -->

@endsection
