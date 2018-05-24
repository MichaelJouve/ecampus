<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Publication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class AdminPostController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        $user->authorizeRoles(['admin', 'superAdmin']);
        $posts = Publication::where('type','=','post')->get();

        return view('admin.posts.gestionPost', ['user' => Auth::user(), 'posts' => $posts]);
    }

    public function softDeletePost($slug)
    {
        $publication = Publication::findBySlugOrFail($slug);
        $publication->delete();

        return redirect()->route('administration')->with('message', 'Publication supprimée');
    }


    public function viewChangePost($slug)
    {
        $user = Auth::user();
        $user->load('roles');

        $categories = Category::all();
        $publication = Publication::where('slug', $slug)
            ->with('user')
            ->firstOrFail();
        $decodeContent = html_entity_decode($publication->content);

        return view('admin.posts.publication.changePost', [
            'user' => $user,
            'publication' => $publication,
            'categories' => $categories,
            'decodeContent' => $decodeContent
        ]);

    }
    public function updatePost(Request $request, $slug)
    {
        $publication = Publication::findBySlugOrFail($slug);
        $inputs['imgpublication'] = $publication->imgpublication;
        $inputs = $request->all();

        if ($publication->type === 'post') {
            $validateData = $request->validate([
                'category_id' => 'integer',
                'title' => 'string|max:191',
                'content' => 'required'
            ]);

            $publication->update($validateData);
        } else {

            if ($request->hasFile('imgpublication')) {

                // open an image file
                $imgResize = Image::make($request->imgpublication->path());
                $imgOrigin = Image::make($request->imgpublication->path());
                $imgCrop = Image::make($request->imgpublication->path());

                // True colors

                $imgResize->limitColors(null);

                // Resize 300x300

                $imgResize->resize(680, 380, function ($constraint) {

                    $constraint->aspectRatio();

                });

                $imgCrop->crop(680, 380);

                // Blank background if canvas

                $imgResize->resizeCanvas(680, 380, 'center', false, '#fff');

                // je force la photo en jpg
                $imgResize->stream('jpg', 90);
                $imgOrigin->stream('jpg', 100);
                $imgCrop->stream('jpg', 100);


                //je lenregistre dans public / img-user de notre storage
                Storage::disk('public')->put('imgpublication-resize/' . $imgResize->filename . '.jpg', $imgResize);
                Storage::disk('public')->put('imgpublication-origin/' . $imgOrigin->filename . '.jpg', $imgOrigin);
                Storage::disk('public')->put('imgpublication-crop/' . $imgCrop->filename . '.jpg', $imgCrop);

                // MAJ request
                $inputs['imgpublication'] = $imgResize->filename . '.jpg';

                $publication->update($inputs);

            }

            $validateData = $request->validate([
                'category_id' => 'integer',
                'title' => 'string|max:191',
                'description' => 'max:255',
                'price' => 'integer',
                'required' => 'string|max:191|nullable',
                'goals' => 'string|max:191|nullable',
                'content' => 'required'
            ]);


            $publication->update($validateData);

        }

        return redirect()->route('administration')->with('message', 'Modification effectuée');
    }

}
