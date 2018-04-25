<?php

namespace App\Http\Controllers;

use App\Category;
use App\Publication;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createTuto()
    {
        $user = Auth::user();
        $categories = Category::all();
        return view('addTuto', ['categories' => $categories, 'user' => $user]);
    }

    public function createPost()
    {
        $categories = Category::all();
        $user = Auth::user();
        return view('addPost', ['categories' => $categories, 'user' => $user]);
    }

    public function storePost(Request $request)
    {
        $user = Auth::user();
        $slug = $user->slug;

        $request->validate([
            'category_id' => 'required|numeric',
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        $inputs = $request->all();
        $inputs['user_id'] = $user->id;

        Publication::create($inputs);

        //Un petit message de succés ...
        session()->flash('message', 'Votre post a bien été créé !');

        return redirect()->route('user-profil', $slug);
    }

    public function storeTuto(Request $request)
    {

        $user = Auth::user();
        $slug = $user->slug;

        $request->validate([
            'category_id' => 'required|numeric',
            'title' => 'required|max:150',
            'description' => 'max:255',
            'price' => 'integer',
            'required' => 'max:100',
            'goals' => 'max:100',
            'content' => 'required|max:65000',
        ]);

        $inputs = $request->all();
        $inputs['user_id'] = $user->id;

        Publication::create($inputs);
        session()->flash('message', 'Votre tutoriel a bien été créé !');
        return redirect()->route('user-profil', $slug);


        //Un petit message de succés ...
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category $category
     * @return \Illuminate\Http\Response
     */
    public function show($name)
    {
        $category = Category::with('tuto')->where('name', $name)->firstOrFail();

        $bestTutorials = Category::with('tuto')->where('name', $name)->firstOrFail();

        $bestTutorial = Category::with('best')->where('name', $name)->first();


        return view('listing', ['category' => $category, 'bestTutorial' => $bestTutorial, 'bestTutorials' => $bestTutorials]);
    }

    public function showTutorial($slug)
    {
        $tuto = Publication::where('slug', $slug)->firstOrFail();

        return view('article', ['tuto' => $tuto]);
    }

    public function showPost($slug)
    {
        $post = Publication::where('slug', $slug)->firstOrFail();

        return view('article', ['post' => $post]);
    }

    public function allTutorials()
    {
        $groupTutorials = Publication::where('type', 'tutorial')->get();
        return view('listingall', ['groupTutorials' => $groupTutorials]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Category $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category $category
     * @return \Illuminate\Http\Response
     */
    public function softDelete($slug)
    {
        $publication = Publication::findBySlugOrFail($slug);
        $publication->delete();

        $userAuth = Auth::user();
        $userSlug = $userAuth->slug;

        $user = User::with('publication')->where('slug', $userSlug)->firstOrFail();
        session()->flash('message', 'Votre publication a bien été supprimée !');

        return view('profil', ['user' => $user, 'userAuth' => $userAuth]);
    }
}
