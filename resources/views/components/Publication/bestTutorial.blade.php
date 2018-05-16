

    <div class="col-md-12 bandeau-sombre p-4 rounded">
        <div class="row">
            <div class="col-md-8">
                <h2>
                    {{ $bestTutorial->title }}
                </h2>
                <p>
                    {{ $bestTutorial->description }}
                </p>
                <span class="font-weight-bold text-success">
               @if($bestTutorial->price == '0')
                        Gratuit
                    @else
                        Disponible pour seulement {{ $bestTutorial->price }} €
                    @endif
            </span>
                <p class="small">
                    Proposé par :
                    <a class="link_bandeau"
                       href="{{route('other-profil',['slug' => $bestTutorial->user->slug])}}">{{ $bestTutorial->user->name }} {{ $bestTutorial->user->firstname }}</a>
                </p>

                <a href="{{route('front-tutorial',['slug' => $bestTutorial->slug])}}">
                    <button class="bg-light border-0 rounded mt-3 ml-1 p-2">Découvrir le tutoriel</button>
                </a>
            </div>

            <div class="col-md-4 text-right">
                <img src="{{asset('storage/'.$bestTutorial->imgpublication)}}" alt="Image du cour" class="img_bandeau w-75">
            </div>

        </div>
    </div>
