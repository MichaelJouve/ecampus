@extends('layouts.homepage')
@section('contenu')
    <link rel="stylesheet" href="{{URL::asset('css/contact.css')}}">

    <div id="bandeau_contact">
        <div class="container text-center" id="content_contact">
            <h1>Contact E-Campus</h1>
            <span>Envoyez nous un message directement</span>
        </div>
    </div>


    <!-- CONTENU -->
    <div class="container text-center" id="contact">
        <div class="col md-12 ">
            <h3>Envoyer une requête </h3>

            <form method="POST" name="formulaire_contact" id="formulaire_contact">
                <div class="form-group">
                    <input type="text" name="objet" id="objet" class="form-control" placeholder="Objet de votre requête" />
                </div>
                <div class="form-group">

                    <textarea class="form-control" id="summernote" placeholder="Contenu de votre requête"></textarea>
                </div>
                <button type="submit" class="btn btn-primary" id="submit_contact">Envoyer ma requête</button>
            </form>
        </div>
    </div>
@endsection