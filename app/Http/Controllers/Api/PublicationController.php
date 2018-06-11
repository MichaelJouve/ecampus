<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Publication;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PublicationController extends Controller
{
    /**
     * @return Publication[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        $publis = Publication::where('type', 'tutorial')->with('user')->latest()->get();
        return response()->json($publis);
    }

    public function showFree()
    {
        $publis = Publication::where('type', 'tutorial')->where('price', 0)->with('user')->get();
        return response()->json($publis);
    }

    /**
     * @param Publication $publication
     * @return Publication|\Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|null|object
     */
    public function show($id)
    {
        $publi = Publication::with('user')->find($id);
        return response()->json($publi);
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
        preg_match_all('!(<img[^>]*src="([^"]*)")!', $request['content'], $tableauDImg);

        foreach ($tableauDImg['1'] as $i) {
            $request['content'] = htmlspecialchars_decode(str_replace($i,
                $i . ' class="img-fluid"',
                $request['content']));
        }

        $request->validate([
            'category_id' => 'required|numeric',
            'title' => 'required|max:150',
            'description' => 'max:255',
            'imgpublication' => 'mimetypes:image/gif,image/jpeg,image/png',
            'price' => 'integer|nullable',
            'required' => 'max:100',
            'goals' => 'max:100',
            'content' => 'required',
        ]);

        $inputs = $request->all();
        if ($inputs['price'] == null) {
            $inputs['price'] = 0;
        }


        $img = Publication::create($inputs);
        $img->imgpublication = $img->category->name . '.jpg';
        $img->save();

    }

}
