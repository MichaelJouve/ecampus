@foreach ($bestTutorial->tuto as $BestTuto)

<div class="col-md-12" id="meilleur_tutoriel">
    <div class="row">
        <div class="col-md-6">
            <h2>{{ $BestTuto->title }}</h2>
            <p>{{ $BestTuto->description }}</p>
            <p>Prix : {{ $BestTuto->price }} €</p>
            <p>Proposé par : <a style="background-color: transparent; color:#fff;" href="#"><b>-- Nom/Prenom--</b></a>
            </p>
        </div>
        <div class="col-md-2"></div>
        <div class="col-md-4">
            <img src="{{ asset('images/Publications/5599.jpg') }}" alt="Image du cour" class="img-fluid">
        </div>
        <div class="col-md-12">
            <a href="#">Découvrez le cour </a>
        </div>
    </div>
</div>
@endforeach