@extends('layouts.layout')

@section('contenu')
    <div class="container-fluid" id="bandeau_top_categorie">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <p><a href="index.php"><i class="fa fa-car" style="color:#fff;"></i></a> /&nbsp; Liste de tous les
                        tutoriels</p>

                </div>

                <div class="col-md-8"></div>

                <div class="col-md 12">
                    <ul class="list-inline">
                        <a href="#">
                            <li class="list-inline-item active" id="all_cour">Tous les tutoriels</li>
                        </a>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        @foreach ($groupTutorials as $tutorial)
            <div class="col-md-12 box filter {{ $tutorial->Category->name }} tutorial_horizontal">
                <div class="ribbon"><span>{{ $tutorial->Category->name }}</span></div>
                <div class="row">
                    <div class="col-md-3 nopadding">
                        <a href="/tutoriel/{{$tutorial->slug}}">
                            <img src="{{ asset('images/Publications/5599.jpg') }}" alt="Image du tutoriel" class="img-fluid">
                        </a>
                    </div>

                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-9 mt-3" id="box-descriptif-tuto">
                                <h2>{{ $tutorial->title }}</h2>
                                <p>-- Nom/Prenom --</p>
                                <p>{{ $tutorial->description }}</p>
                            </div>
                            <div class="col-md-3" id="box-prix-note">
                                <div class="add_panier text-center" >Ajouter au panier</div>
                                <p>{{ $tutorial->price }}<b>€</b></p>
                                <p>(Note du tutoriel 4/5)</p>
                                <p>(Nombre de notes sur le tutoriel)</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>



    <!-- FIN CONTENU -->
@endsection

