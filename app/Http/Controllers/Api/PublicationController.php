<?php

namespace App\Http\Controllers\Api;

use App\Bought;
use App\Category;
use App\Consultation;
use App\Http\Controllers\Controller;
use App\Publication;
use App\Post;
use App\User;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Symfony\Component\VarDumper\Dumper\DataDumperInterface;

class PublicationController extends Controller
{
    public function index()
    {
        return Publication::all();
    }

    public function show(Publication $publication)
    {
        return $publication->with('category', 'user', 'consultation', 'comment', 'userOwner' )->first();
    }

    public function create(Request $request)
    {
        $publication = Publication::create($request->all());

        return response()->json($publication, 201);
    }

    public function update(Request $request, Publication $publication)
    {
        $publication->update($request->all());

        return response()->json($publication, 200);
    }

    public function delete(Publication $publication)
    {
        $publication->delete();

        return response()->json(null, 204);
    }
}
