@foreach($posts as $post)
    <div class="col-sm-6  mb-3">
        <div class="card shadow" style="height:300px;">
            <div class="ribbon"><span>{{$post->Category->name}}</span></div>
            <div class="row" style="height: 264px">
                <div class="col-3 align-self-center img_profil ">
                    <img class="img-fluid rounded-circle ml-1 shadow" src="{{asset('storage/'.$post->user->imgprofil)}}"
                         alt="Image de profil">
                </div>
                <div class="col-9">
                    <div class="card-body">
                        <div class="card-title" id="card-title-post">{{ $post->user->name }} {{ $post->user->firstname }}
                            <br> <b>{{$post->title}}</b></div>
                        <div class="card-text small">{!! $post->content !!}</div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-right">
                <span class="float-left small">Ecrit à {{$post->created_at->format('h:m \l\e d/m/Y')}}</span>
                <a href="{{route('user-profil',['slug' => $post->user->slug])}}" class="btn btn-light">Voir <i class="fa fa-chevron-right"></i></a>
            </div>
        </div>
    </div>
@endforeach