@extends('layouts.layout')

@section('contenu')

    <div class="container-fluid pt-4 pb-4 bandeau-sombre">
        <div class="container">
            <h1> <i class="far fa-file-alt"></i> Formulaire d'ajout de tutoriel</h1>
            <p><b><u> {{ $user->firstname }}</u></b> vous allez ajouter un nouveau tutoriel à votre profil !</p>
        </div>
    </div>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Ajouter un nouveau <b>tutoriel</b> à votre profil..</div>

                    <div class="card-body">
                        <form method="POST" action="{{URL::route('store-tuto')}}">
                            @csrf
                            <div class="form-group">
                                <label for="selecteur_tuto">Selectionner une catégorie </label>
                                <select class="custom-select" name="category_id" id="selecteur_tuto">
                                    <option selected disabled>Choisir une categorie..</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="title">Titre de votre tutoriel</label>
                                <input type="text" name="title" class="form-control" id="title" placeholder="Titre du post" nb_max="50"
                                       title="Maximum 50 caractères">
                            </div>
                            <div class="form-group">
                                <label for="description_tuto">Déscription de votre tutoriel</label>
                                    <input type="text" name="descriptif" class="form-control" placeholder="Un descriptif rapide de votre tutoriel.." nb_max="100" id="description_tuto" title="Maximum 100 caractères">

                            </div>
                            <div class="form-group">
                                <label for="price">Prix de votre tutoriel</label>
                                <input type="text" name="price" id="price" placeholder="Prix du tutoriel (Si gratuit ne pas remplir)" class="form-control" title="Oui, mais combien ?">
                            </div>
                            <div class="form-group">
                                <label for="prerequis">Prérequis de votre tutoriel</label>
                                <input type="text" name="prerequis" id="prerequis"  class="form-control" placeholder="Prerequis du tutoriel">
                            </div>
                            <div class="form-group">
                                <label for="objectifs">Objectifs de votre tutoriel</label>
                                <input type="text" name="objectifs" id="objectifs"   class="form-control" placeholder="Objectifs du tutoriel">
                            </div>
                            <div class="form-group">
                                <label for="liste_fichier">Liste de fichier présent dans le tutoriel</label>
                                <input type="text" name="liste_fichier" id="liste_fichier"  class="form-control" placeholder="La liste de vos fichiers">
                            </div>
                            <div class="form-group">
                                <label for="content">Saisir le contenu de votre tutoriel</label>
                                <textarea name="content" class="form-control"  class="form-control" placeholder="Contenu de votre tutoriel"></textarea>
                            </div>

                            <div class="form-group">
                                <div class="col-md-8 offset-md-4">
                                    <button type="reset" class="btn btn-danger" value="Effacer">Effacer</button>
                                    <button type="submit" class="btn btn-primary" value="Enregistrer">Enregistrer</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection