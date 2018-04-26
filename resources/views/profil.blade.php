@extends('layouts.layout')

@section('contenu')

    <!-- CONTENU -->
    <div class="container mt-2">
        <div class="row">
            <div class="col-md-3">
                <div class="text-center">
                    <img class="img-fluid" style="border:2px solid #007791; border-radius: 4px;"
                         src="{{asset('storage/'.$user->imgprofil)}}" alt="Image de profil">
                </div>
                <div class="mt-3">
                    <p class="text-center small">
                        <a href="#"><i class="fas fa-globe" style="font-size: 1.5em; margin:0 5px;"></i></a>
                        <a href="#"><i class="fab fa-facebook-f" style="font-size: 1.5em; margin:0 5px;"></i></a>
                        <a href="#"><i class="fab fa-twitter" style="font-size: 1.5em; margin:0 5px;"></i></a>
                        <a href="{{URL::route('user-profil-message')}}"><i class="far fa-envelope-open"
                                                                            style="font-size: 1.5em; margin:0 5px;"></i></a>

                    </p>
                </div>
                <div>
                    <h5 class="font-weight-light border-bottom">Description</h5>
                    <p class="small overflow-200">{{$user->description}}</p>
                </div>
                <div>
                    <h5 class="border-bottom">Statistiques membre</h5>
                    <p class="small">Nombre de commentaire : <b>(0)</b><br>
                        Nombre de post : <b>(0)</b><br>
                        Nombre de tutoriel(s) : <b>(0)</b>
                    </p>
                </div>
                <div>
                    <h5 class="font-weight-light border-bottom">Coordonnées Personnel</h5>


                    <p class="small">
                        <strong> Identité </strong>: {{ucfirst($user->firstname)}} {{ucfirst($user->name)}}<br/>
                        <strong> Date de naissance</strong>: {{$user->birthdate}}<br/>
                        <strong> Email </strong>: {{$user->email}}<br/>
                        <strong> Date d'inscription</strong> : {{$user->created_at->format('d/m/Y')}}<br/>
                    </p>


                </div>
            </div>
            <div class="col-md-9 text-center  pt-4">
            @isset($userAuth)
                @if($user->id == $userAuth->id)
                    <h5 class="text-center">Voilà votre profil actuel <b>{{ $user->firstname }} !</b></h5>
                    <div>
                        <a href="{{URL::route('post-ajout')}}">
                            <button class="btn btn-primary" data-toggle="collapse" data-target="#formulaire_ajout_post"
                                    aria-expanded="false" aria-controls="formulaire_ajout_post">
                                Publiez un Post
                            </button>
                        </a>
                        <a href="{{URL::route('tuto-ajout')}}">
                            <button class="btn btn-primary" data-toggle="collapse" data-target="#formulaire_ajout_tuto"
                                    aria-expanded="false" aria-controls="formulaire_ajout_tuto">
                                Publier un Tutoriel
                            </button>
                        </a>
                    </div>
                @endif


                <h2 class="text-center font-weight-light pt-4">Vos dernieres publications !</h2>

                <div class="row justify-content-center mt-5">

                    @foreach( $user->publication as $publication)
                        @if ($publication->type == 'post')
                            <div class="col-10 mt-3 mb-2">
                                <div class="card shadow">
                                    <div class="ribbon"><span>{{ $publication->category->name }}</span></div>

                                    <div class="card-header text-right" style="padding:0;">
                                        @if ($user->id == $userAuth->id)

                                            <a href="{{route('publication-delete',['slug' => $publication->slug])}}">
                                                <span name="delete" style="color:#dc3545;  margin-right: 10px;"><i class="far fa-trash-alt"></i></span></a>


                                        @endif
                                    </div>

                                    <div class="row ">
                                        <div class="col-3 align-self-center img_profil ">
                                            <img class="img-fluid rounded-circle" style="margin:20px;"
                                                 src="{{ asset('images/Users/default.png') }}" alt="Image de profil">
                                        </div>
                                        <div class="col-9">
                                            <div class="card-body">

                                                <div class="card-title font-weight-bold">{{ $publication->title }}</div>
                                                <div class="card-text small">{!! $publication->content !!}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer text-right">
                                        <span class="float-left small">Ecrit le : {{ $publication->created_at->format('d/m/Y')}}</span>
                                        <i class="fab fa-facebook-f"></i>
                                        <i class="far fa-heart"></i>
                                        <a href="#" data-toggle="modal"
                                           data-target="#exampleModal{{ $publication->id }}"><i
                                                    class="far fa-comment"></i></a>
                                        <i class="fas fa-share"></i>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="col-10 mt-3 mb-2">
                                <div class="card shadow">
                                    <div class="ribbon"><span>{{ $publication->category->name }}</span></div>
                                    <div class="card-header text-right" style="padding:0;">
                                        @if ($user->id == $userAuth->id)

                                            <a href="{{route('publication-delete',['slug' => $publication->slug])}}">
                                                <span name="delete" style="color:#dc3545;  margin-right: 10px;"><i class="far fa-trash-alt"></i></span></a>
                                        @endif
                                    </div>
                                    <img class="card-img-top img-fluid"
                                         src="{{asset('storage/'.$publication->imgpublication)}}"
                                         alt="Image card top" style="height: 220px;">
                                    <div class="card-body">
                                        <!--Social shares button-->
                                        <p class="text-success">
                                            @if( $publication->price == '0')
                                                Tutoriel gratuit
                                            @else
                                                En vente pour seulement <b>{{ $publication->price }}€</b>
                                            @endif
                                        </p>
                                        <h3 class="card-title">
                                            {{ $publication->title }}
                                        </h3>


                                        <p class="card-text small" id="affichage_post">{{ $publication->description }}</p>
                                    </div>
                                    <div class="card-footer small">
                                        <span class="float-left"> Ecrit le : {{ $publication->created_at->format('d/m/Y') }}</span>
                                        <a href="{{route('front-tutorial',['slug' => $publication->slug])}}" class="btn btn-light float-right">Lire <i class="fa fa-chevron-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach

                </div>
                @endisset

                @empty($userAuth)
                    <h5 class="text-center">Voilà le profil de <b>{{ $user->firstname }} !</b></h5>
                    <div class="row justify-content-center mt-5">

                        @foreach( $user->publication as $publication)
                            @if ($publication->type == 'post')
                                <div class="col-10 mt-3 mb-2">
                                    <div class="card shadow">
                                        <div class="ribbon"><span>{{ $publication->category->name }}</span></div>

                                        <div class="card-header text-right" style="padding:0;">

                                        </div>

                                        <div class="row ">
                                            <div class="col-3 align-self-center img_profil ">
                                                <img class="img-fluid rounded-circle" style="margin:20px;"
                                                     src="{{ asset('images/Users/default.png') }}" alt="Image de profil">
                                            </div>
                                            <div class="col-9">
                                                <div class="card-body">

                                                    <div class="card-title font-weight-bold">{{ $publication->title }}</div>
                                                    <div class="card-text small">{{ $publication->content }}</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer text-right">
                                            <span class="float-left small">Ecrit le : {{ $publication->created_at->format('d/m/Y')}}</span>
                                            <i class="fab fa-facebook-f"></i>
                                            <i class="far fa-heart"></i>
                                            <a href="#" data-toggle="modal"
                                               data-target="#exampleModal{{ $publication->id }}"><i
                                                        class="far fa-comment"></i></a>
                                            <i class="fas fa-share"></i>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="col-10 mt-3 mb-2">
                                    <div class="card shadow">
                                        <div class="ribbon"><span>{{ $publication->category->name }}</span></div>
                                        <div class="card-header text-right" style="padding:0;">

                                        </div>
                                        <img class="card-img-top img-fluid"
                                             src="{{ asset('images/Publications/5599.jpg') }}"
                                             alt="Image card top" style="height: 220px;">
                                        <div class="card-body">
                                            <!--Social shares button-->
                                            <p class="text-success">
                                                @if( $publication->price == '0')
                                                    Tutoriel gratuit
                                                @else
                                                    En vente pour seulement <b>{{ $publication->price }}€</b>
                                                @endif
                                            </p>
                                            <h3 class="card-title">
                                                {{ $publication->title }}
                                            </h3>


                                            <p class="card-text small" id="affichage_post">{{ $publication->description }}</p>
                                        </div>
                                        <div class="card-footer small">
                                            <span class="float-left"> Ecrit le : {{ $publication->created_at->format('d/m/Y') }}</span>
                                            <a href="{{route('front-tutorial',['slug' => $publication->slug])}}" class="btn btn-light float-right">Lire <i class="fa fa-chevron-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach

                    </div>
                    @endempty
            </div>
        </div>
    </div>

    <!-- FIN CONTENU -->


@endsection