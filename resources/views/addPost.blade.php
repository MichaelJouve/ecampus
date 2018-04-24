@extends('layouts.layout')

@section('contenu')
    <div class="container-fluid pb-4" id="bandeau_top_categorie">
        <div class="container">
                <h1> <i class="far fa-file-alt"></i> Formulaire d'ajout de post</h1>
            <p><b><u> {{ $user->firstname }}</u></b> vous allez ajouter un nouveau post à votre profil !</p>
        </div>
    </div>
    <div class="container mt-3 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Ajouter un nouveau <b>post</b> à votre profil..</div>

                    <div class="card-body">
                        <form method="POST" action="{{URL::route('store-post')}}">
                            @csrf
                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                            <input type="hidden" name="type" value="post">
                            <div class="form-group">
                                <label for="category_id">
                                    Sélectionner une catégorie pour votre post :
                                </label>
                                <select class="custom-select" name="category_id" id="selecteur_post">
                                    <option selected disabled>Choisir une categorie..</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="title">Saisir un titre pour votre post :</label>
                                <input type="text" name="title" class="form-control" id="title" placeholder="Titre du post..." nb_max="50"
                                       title="Maximum 50 caractères" />
                            </div>

                            <div class="form-group">
                                <label for="content">Saisir le contenu de votre post : </label>
                                <textarea name="content" class="form-control" placeholder="Un contenu de votre post..."></textarea>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-8 offset-md-4">
                                    <button type="reset"  class="btn btn-danger" value="Effacer">Effacer</button>
                                    <button type="submit" class="btn btn-primary" value="Enregistrer">Envoyer</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection