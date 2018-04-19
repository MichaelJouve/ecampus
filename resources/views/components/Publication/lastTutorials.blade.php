@foreach( $bestTutorials->tuto as $bestTutos)
    <div class="col-md-3">
        <a href="/tutoriel/{{$bestTutos->slug}}">
            <div class="card">
                <img class="card-img-top" src="{{ asset('images/Publications/5599.jpg') }}" alt="Card image cap">
                <div class="card-body">
                    <p class="card-text"><b>{{ $bestTutos->title }}</b></p>
                    <p class="card-text" style="color:#333;">Disponible à partir de
                        <b>{{ $bestTutos->price }} €</b></p><br>
                    <p class="card-text" style="color:#333;">{{ $bestTutos->description }}</p>
                </div>
            </div>
        </a>
    </div>
@endforeach