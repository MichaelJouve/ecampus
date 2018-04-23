@extends('layouts.layout')

@section('contenu')

    <!-- CONTENU -->
    <div class="container">
        <div class="row">
            <div class="col-md-3" >
                <img class="img-fluid" style="border:2px solid #007791; border-radius: 4px;"
                     src="{{asset('images/Users/default.png')}}" alt="Image de profil">

                <div class="mt-3">
                    <p class="text-center">
                        <a href="#"><i class="fas fa-globe" style="font-size: 1.5em; margin:0 5px;"></i></a>
                        <a href="#"><i class="fab fa-facebook-f" style="font-size: 1.5em; margin:0 5px;"></i></a>
                        <a href="#"><i class="fab fa-twitter" style="font-size: 1.5em; margin:0 5px;"></i></a>
                        <a href="{{URL::route('front-config-message')}}"><i class="far fa-envelope-open"
                                                                            style="font-size: 1.5em; margin:0 5px;"></i></a>

                    </p>
                </div>
                <div >
                    <h5 class="font-weight-light">Description</h5>
                    <p>{{$user->description}}</p>
                </div>
                <div >
                    <h5>Statistiques membre</h5>
                    <p>Nombre de commentaire : <b>(Le nombre de commentaires)</b><br>
                        Nombre de post : <b>(Le nombre de posts)</b><br>
                        Nombre de tutoriel(s) : <b>(Le nombre de tuto)</b>
                    </p>
                </div>
                <div>
                    <h5 class="font-weight-light">Coordonnées Personnel</h5>


                    <p>
                        <strong> Identité </strong>: {{ucfirst($user->firstname)}} {{ucfirst($user->name)}}<br/>
                        <strong> Date de naissance</strong>: {{$user->birthdate}}<br/>
                        <strong> Email </strong>: {{$user->email}}<br/>
                        <strong> Date d'inscription</strong> : {{$user->created_at->format('d/m/Y')}}<br/>
                    </p>


                </div>
            </div>
            <div class="col-md-9 text-center  pt-4">

                    @if($user->id == $userAuth->id)
                    <h5 class="text-center">Voilà votre profil actuel <b>{{ $user->firstname }} !</b> </h5>
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


                <h2 class="text-center font-weight-light pt-4">Vos dernières publications !</h2>

                <div class="row justify-content-center">

                    @foreach( $user->publication as $publication)
                        @if ($publication->type = 'post')
                            <div class="card col-10">
                                <div class="ribbon"><span>{{ $publication->category->name }}</span></div>

                                <div class="card-header" style="padding:0;">
                                    @if ($user->id == $userAuth->id)

                                        <a href="{{route('publication.delete',['slug' => $publication->slug])}}"
                                           onclick="event.preventDefault(); document.getElementById('delete-publi').submit();"
                                           ><span
                                                    name="delete" style="color:#dc3545;  margin-right: 10px;"><i
                                                        class="far fa-trash-alt"></i></span></a>

                                        <form id="delete-publi" action="{{ route('publication.delete',['slug' => $publication->slug]) }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    @endif
                                </div>

                                <div class="row ">
                                    <div class="col-3 align-self-center img_profil ">
                                        <img class="img-fluid rounded-circle" style="margin:20px;"
                                             src="{{ asset('images/Users/default.png') }}" alt="Image de profil">
                                    </div>
                                    <div class="col-9">
                                        <div class="card-body">

                                            <div class="card-title"
                                                 id="card-title-post"> {{ $publication->title }}</div>
                                            <div class="card-text" id="affichage_post">{{ $publication->content }}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-right">
                                    <span class="float-left">Ecrit le : {{ $publication->created_at->format('d/m/Y')}}</span>
                                    <i class="fab fa-facebook-f"></i>
                                    <i class="far fa-heart"></i>
                                    <a href="#" data-toggle="modal" data-target="#exampleModal{{ $publication->id }}"><i
                                                class="far fa-comment"></i></a>
                                    <i class="fas fa-share"></i>
                                </div>
                            </div>
                        @else
                            <div class="card col-10">
                                <div class="ribbon"><span>{{ $publication->category->name }}</span></div>
                                <div class="card-header" style="padding:0;">
                                    @if ($user->id == $userAuth->id)
                                        <a href="{{URL::route('deletePublication')}}/{{ $publication->slug }}"><span
                                                    name="delete" style="color:#dc3545;  margin-right: 10px;""><i
                                                    class="far fa-trash-alt"></i><span></a>
                                        <a href="#"><span name="edit"
                                                          style="color:#007791; cursor: pointer; margin-right: 10px;""><i
                                                    class="far fa-edit"></i><span></a>
                                    @endif
                                </div>
                                <img class="card-img-top img-fluid" src="{{ asset('images/Publications/5599.jpg') }}"
                                     alt="Image card top" style="height: 220px;">
                                <div class="card-body">
                                    <!--Social shares button-->
                                    <h3 class="card-title">{{ $publication->title }} <span>{{ $publication->price }}
                                            €</span></h3>
                                    <p class="card-text" id="affichage_post">{{ $publication->description }}</p>
                                </div>
                                <div class="card-footer">
                                    <span class="float-left">{{ $publication->user->firstname }} {{ $publication->user->name }}
                                        <br> Ecrit le : {{ $publication->created_at->format('d/m/Y') }}</span>
                                    <a href="#" class=" float-right">Lire <i class="fa fa-chevron-right"></i></a>
                                </div>
                            </div>
                        @endif
                    @endforeach

                </div>
            </div>
        </div>
    </div>

    <!-- FIN CONTENU -->


@endsection