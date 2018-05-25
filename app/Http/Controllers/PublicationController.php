<?php

namespace App\Http\Controllers;

use App\Bought;
use App\Category;
use App\Consultation;
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
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $categories = Category::with('post')->get();
        return view('category', ['categories' => $categories, 'user' => $user]);
    }



    /**
     * store post into publication
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */


    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */



    /**
     * Display the specified resource.
     *
     * @param  \App\Category $category
     * @return \Illuminate\Http\Response
     */
    public function show($name)
    {
        $category = Category::with('tuto')->where('name', $name)->firstOrFail();

        $bestTutorial = Publication::where('category_id', $category->id)->tuto()->first();

        $bestsTutorials = Publication::where('category_id', $category->id)->tuto()->limit(4)->get();

        $lastTutorials = Publication::where('category_id', $category->id)->tuto()->latest()->limit(8)->get();


        return view('listing', ['category' => $category, 'bestTutorial' => $bestTutorial, 'bestsTutorials' => $bestsTutorials, 'lastTutorials' => $lastTutorials]);
    }

    public function showAll($name)
    {
        $category = Category::where('name', $name)->firstOrFail();
        $tutorials = Publication::with('category', 'user', 'consultation')
            ->withCount('comment')
            ->tuto()
            ->where('category_id', $category->id)
            ->paginate();

        return view('publication.categoryalltutorial', ['category' => $category, 'tutorial' => $tutorials]);
    }


    public function showPost($slug)
    {
        $post = Publication::where('slug', $slug)->firstOrFail();

        return view('article', ['post' => $post]);
    }

    /**
     * Show publication page
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */


    public function allTutorials()
    {
        if (request()->has('price')) {

            if (request('price') === 'asc') {
                $tutorials = Publication::with('category', 'user', 'consultation')
                    ->withCount('comment')
                    ->tuto()
                    ->orderBy('price', 'asc')
                    ->paginate();
            } elseif (request('price') === 'desc') {

                $tutorials = Publication::with('category', 'user', 'consultation')
                    ->withCount('comment')
                    ->tuto()
                    ->orderBy('price', 'desc')
                    ->paginate();
            }
        } else {
            $tutorials = Publication::with('category', 'user', 'consultation')
                ->withCount('comment')
                ->tuto()
                ->paginate();
        }
        return view('listingall', ['tutorials' => $tutorials]);

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category $category
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function softDelete($slug)
    {
        $publication = Publication::findBySlugOrFail($slug);
        $publication->delete();

        session()->flash('message', 'Votre publication a bien été supprimée !');

        return redirect()->route('user-profil');
    }


}
