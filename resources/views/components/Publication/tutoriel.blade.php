@foreach($tutos as $tuto)
    <div class="col-sm-6 col-md-4">
        <div class="card" style="min-height: 490px; height: 490px; max-height: 490px;">
            <div class="ribbon"><span>{{$tuto->Category->name}}</span></div>
            <img class="card-img-top animated jello" src="{{URL::asset('images/Publications/5599.jpg')}}"
                 alt="Image card top">
            <div class="card-body">
                <!--Social shares button-->
                <div class="row">
                    <h3 class="card-title col-9"> {{$tuto->title}} </h3>
                    <span class="card-title col-3" style="font-size: 1em;">{{$tuto->price}}€</span>
                </div>
                <p class="card-text">{{$tuto->description}}</p>
            </div>
            <div class="card-footer">
                <span class="float-left" (Prenom-user) <br>{{$tuto->created_at}}</span>
                <a href="#" class=" float-right">Lire <i class="fa fa-chevron-right"></i></a>
            </div>
        </div>
    </div>
@endforeach