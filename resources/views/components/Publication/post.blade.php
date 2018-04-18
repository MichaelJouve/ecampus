@foreach($posts as $post)
    <div class="col-sm-6 col-md-6">
        <div class="card" style="min-height: 300px; height: 300px; max-height: 300px;">
            <div class="ribbon"><span>{{$post->Category->name}}</span></div>
            <div class="row" style="height: 264px">
                <div class="col-3 align-self-center img_profil ">
                    <img class="img-fluid rounded-circle" src="{{URL::asset('images/Users/default.png')}}"
                         alt="Image de profil">
                </div>
                <div class="col-9">
                    <div class="card-body">
                        <div class="card-title" id="card-title-post">(Prenom user)
                            <br> {{$post->title}}</div>
                        <div class="card-text">{{$post->content}}</div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-right">
                <span class="float-left">Ecrit le :{{$post->created_at}}</span>
                <a href="#" class=" float-right">Voir <i class="fa fa-chevron-right"></i></a>
            </div>
        </div>
    </div>
@endforeach