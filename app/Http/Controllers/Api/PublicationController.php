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
    /**
     * @return Publication[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        return response()->json(Publication::all());
    }

    /**
     * @param Publication $publication
     * @return Publication|\Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|null|object
     */
    public function show(Publication $publication)
    {
        return response()->json(Publication::find($publication->id)->with('category', 'user', 'consultation', 'comment', 'userOwner'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(Request $request)
    {
        $publication = Publication::create($request->all());

        return response()->json($publication, 201);
    }

    /**
     * @param Request $request
     * @param Publication $publication
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Publication $publication)
    {
        $publication->update($request->all());

        return response()->json($publication, 200);
    }

    /**
     * @param Publication $publication
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Publication $publication)
    {
        $publication->delete();

        return response()->json(null, 204);
    }

    public function store(Request $request)
    {

    }

}
