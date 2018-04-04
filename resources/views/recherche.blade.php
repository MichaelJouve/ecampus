@extends('layouts.layout')

@section('contenu')
    <!-- CONTENU -->
    <div class="container-fluid" id="bandeau_recherche">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Page de recherche</h1>
                    <p> Vous avez effectuer une recherche sur cet élément : <?php echo "<b>".$_GET['recherche']."</b>"; ?></p>

                </div>
            </div>
        </div>
    </div>
    <div class="container mt-3" id="resultat_recherche">
        (Votre résultat de recherche)
    </div>

    <!-- FIN DU CONTENU-->
@endsection