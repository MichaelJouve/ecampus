@extends('layouts.layout-admin')

@section('content')
    <div class="container text-center">
        <h1 class="text-success"><i class="far fa-file-alt"></i> Modification du Commentaire de
            <b>{{ $comment->user->firstname }}</b></h1>
    </div>
    <div class="container mt-3 mb-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">Modification du Commentaire</div>

                    <div class="card">
                        <form action="" method="post">
                            @csrf
                            <div class="card-header">
                                <h3 class="card-title">Ma description</h3>
                            </div>
                            <div class="card-body">
                                <textarea name="description" rows="15"
                                          class="form-control">{{$user->comment}}</textarea>
                            </div>
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-info">Modifier</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
