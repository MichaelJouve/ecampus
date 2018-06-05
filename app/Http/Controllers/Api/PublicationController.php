<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Publication;
use App\Post;
use Illuminate\Http\Request;

class PublicationController extends Controller
{
    /**
     * @return Publication[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        $publis = Publication::with('user')->get();
        return response()->json($publis);
    }

    /**
     * @param Publication $publication
     * @return Publication|\Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|null|object
     */
    public function show($id)
    {
        return response()->json(Publication::find($id));
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
