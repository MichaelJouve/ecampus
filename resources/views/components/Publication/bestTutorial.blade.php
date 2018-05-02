

    <div class="col-md-12 bandeau-sombre p-4 rounded">
        <div class="row">
            <div class="col-md-8">
                <h2>
                    {{ $bestTutorial->best->title }}
                </h2>
                <p>
                    {{ $bestTutorial->best->description }}
                </p>
                <span class="font-weight-bold text-success">
               @if($bestTutorial->best->price == '0')
                        Gratuit
                    @else
                        Disponible pour seulement {{ $bestTutorial->best->price }} €
                    @endif
            </span>
                <p class="small">
                    Proposé par :
                    <a class="link_bandeau"
                       href="{{route('other-profil',['slug' => $bestTutorial->best->user->slug])}}">{{ $bestTutorial->best->user->name }} {{ $bestTutorial->best->user->firstname }}</a>
                </p>

                <a href="{{route('front-tutorial',['slug' => $bestTutorial->best->slug])}}">
                    <button class="bg-light border-0 rounded mt-3 ml-1 p-2">Découvrir le tutoriel</button>
                </a>
            </div>

            <div class="col-md-4">
                <img src="{{asset('storage/'.$bestTutorial->best->imgpublication)}}" alt="Image du cour" class="img_bandeau">
            </div>

        </div>
    </div>
