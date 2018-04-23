@extends('layouts.layout')

@section('contenu')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Nouveau Post</div>

                    <div class="card-body">
                        <form method="POST" action="{{URL::route('storePost')}}">
                            @csrf
                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                            <div class="form-group row">
                                <select class="custom-select" name="category_id" id="selecteur_post">
                                    <option selected disabled>Choisir une categorie..</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group row">
                                <input type="text" name="title" id="title" placeholder="Titre du post" nb_max="50"
                                       title="Maximum 50 caractères">
                            </div>

                            <div class="form-group row">
                                <textarea name="content" ></textarea>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-8 offset-md-4">
                                    <button type="reset" class="btn btn-danger" value="Effacer">Effacer</button>
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