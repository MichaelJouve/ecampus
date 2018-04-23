@extends('layouts.layout')

@section('contenu')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Nouveau Tutoriel</div>

                    <div class="card-body">
                        <form method="POST" action="{{URL::route('storeTuto')}}">
                            @csrf
                            <div class="form-group row">
                                <select class="custom-select" name="category_id" id="selecteur_post">
                                    <option selected disabled>Choisir une categorie..</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group row justify-content-between">
                                <input type="text" name="title" id="title" placeholder="Titre du post" nb_max="50" title="Maximum 50 caractères">
                                <input type="file" name="image" placeholder="Image par défaut">
                                <input type="text" name="price" placeholder="Prix: si gratuit ne pas remplir">
                            </div>

                            <div class="form-group row justify-content-between">
                                <input type="text" placeholder="Description">
                                <input type="text" placeholder="Buts du tutoriel">
                                <input type="text" placeholder="Prérequis">
                            </div>

                            <div class="form-group row">
                                <textarea name="content" ></textarea>
                            </div>

                            <div class="form-group row">
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

















<div id="formulaire_ajout_tuto" class="collapse" data-parent="#accordion">
    <form method="post" name="post_tuto" id="post_tuto" action="{{URL::route('storeTuto')}}">
        <input type="hidden" name="create_tuto" value="">
        <i class="far fa-file-code" style="font-size: 3em; color:#fff;"></i>
        <p class="large_title">Nouveau Tutoriel</p>
        <p class="minuscule_title">Veuillez ajouter un nouveau tutoriel au E-campus</p>
        <hr>
        <div class="input-group mb-3">
            <select class="custom-select" id="selecteur_tuto" name="selecteur_tuto">
                <option selected disabled>Choisir une categorie de tutoriel.. </option>

            </select>
        </div>
        <label class="add_image_post">
            <i class="far fa-image" style="color:#fff;"></i>
Ajouter une image pour ce tutoriel?<br>
            <input type="file" name="image">
        </label>
        <input type="text" name="prix" id="prix" placeholder="Prix du tutoriel (Si gratuit ne pas remplir)" title="Oui, mais combien ?">
        <input type="text" name="titre" id="titre_tuto" placeholder="Titre du tutoriel" nb_max="50" title="Maximum 50 caractères">
        <input type="text" name="objectifs" id="objectifs"  placeholder="Objectifs du tutoriel">
        <input type="text" name="prerequis" id="prerequis" placeholder="Prerequis du tutoriel">
        <input type="text" name="liste_fichier" id="liste_fichier" placeholder="La liste de vos fichiers">
        <input type="text" name="descriptif" placeholder="Un descriptif rapide de votre tutoriel.." nb_max="100" id="description_tuto" title="Maximum 100 caractères">
        <label class="add_textarea text-left">
Ajouter un contenu pour votre tutoriel
</label>
        <textarea id="summernote_tuto" name="contenu_tuto"></textarea>
        <input class="btn btn-danger" type="reset" value="Effacer">
        <input type="submit" value="Valider le Tutoriel" class="btn btn-primary" name="submit_tuto" id="submit_tuto">
    </form>
</div>