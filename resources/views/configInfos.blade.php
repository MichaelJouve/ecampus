@extends('layouts.layout')


@section('contenu')
    <!-- CONTENU -->
    <div class="container-fluid">
        <div class="row ">
            @include('navBarConfig')
            <div class="col-lg-9 col-12 ">
                <div class="row p-5 mb-2 justify-content-center bandeau-sombre">
                    <div class="row">
                        <h3><img src="{{asset('images/infos_perso.png')}}" alt="Bandeau des preferences"
                                 class="img-fluid logo-config">Vos informations personnelles : Modification de vos
                            données
                            personnelles</h3>
                    </div>
                </div>

                <div class="card-columns">

                    <!-- MON PROFIL-->
                    <div class="card">
                        <form action="{{URL::route('update-info')}}" method="post">
                            @csrf
                            <div class="card-header">
                                <h3 class="card-title">Mon Profil</h3>
                            </div>
                            <div class="card-body">
                                <h5>Nom</h5>

                                <input id="name" type="text"
                                       class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                       name="name" value="{{strtoupper($user->name)}}">

                                <h5>Prenom</h5>
                                <input id="firstname" type="text"
                                       class="form-control{{ $errors->has('firstname') ? ' is-invalid' : '' }}"
                                       name="firstname" value="{{ucfirst($user->firstname)}}">


                                <h5>Date de Naissance</h5>
                                <input id="birthday" type="date"
                                       class="form-control{{ $errors->has('birthday') ? ' is-invalid' : '' }}"
                                       name="birthday" value="{{$user->birthday}}">


                                <h5>Email</h5>
                                <input id="email" type="text"
                                       class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                       name="email" value="{{$user->email}}">

                                <h5>Paypal</h5>

                                <input id="paypal" type="text"
                                       class="form-control{{ $errors->has('paypal') ? ' is-invalid' : '' }}"
                                       name="paypal" value="{{$user->paypal}}">
                            </div>

                            <div class="card-footer text-right">
                                <button type="submit"
                                        class="btn btn-info">Modifier
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- DESCRIPTION-->
                    <div class="card">
                        <form action="{{URL::route('update-description')}}" method="post">
                            @csrf
                            <div class="card-header">
                                <h3 class="card-title">Ma description</h3>
                            </div>
                            <div class="card-body">
                                <textarea name="description" rows="15"
                                          class="form-control">{{$user->description}}</textarea>
                            </div>
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-info">Modifier</button>
                            </div>
                        </form>
                    </div>
                    <!-- PHOTO-->

                    <div class="card ">
                        <div class="card-header">
                            <h3 class="card-title">Ma Photo</h3>
                        </div>
                        <div class="card-body text-center">
                            <img src="{{asset('images/Users')}}/{{$user->imgprofil}}"
                                 alt="Avatar Romaric"
                                 class="rounded border img-fluid">
                        </div>
                        <div class="card-footer">
                            <form action="{{URL::route('update-avatar')}}" method="post">
                                <input type="file" name="avatar">
                                <button class="btn btn-info float-right" type="submit">Modifier</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--****************  FIN DE INFORMATIONS PERSONNELS   ************************************************** -->

@endsection