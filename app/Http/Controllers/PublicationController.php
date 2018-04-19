<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Publication;
use Illuminate\Http\Request;

class PublicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::with('post')->get();
        return view('category', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createTuto()
    {
        return view('addTuto');
    }

    public function createPost()
    {
        return view('addPost');
    }

    public function storePost(Request $request)
    {
        $validateData = $request->validate([
            'type' => 'required',
            'title' => 'required|max:255',
            'description' => 'required',
            'content' => 'required',
        ]);

        Post::created($validateData);

        // views

    }

    public function storeTuto(Request $request)
    {
        $validateData = $request->validate([
            'type' => 'required',
            'title' => 'required',
            'description' => 'required',
            'content' => 'required',
            'goals' => 'required',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

        $bestTutorial = Category::with('tuto')->where('name', $name)->first();

        $bestTutorials = Category::with('tuto')->where('name', $name)->firstOrFail();

        return view('listing', ['category' => $category, 'bestTutorial' => $bestTutorial, 'bestTutorials' => $bestTutorials]);

    }

    public function showTutorial($slug)
    {
        $tuto = Publication::where('slug',$slug)->firstOrFail();

        return view('article', ['tuto' => $tuto]);
    }

    public function allTutorials(){

        $groupTutorials = Publication::where('type','tutorial')->get();

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
    public function destroy(Category $category)
    {
        //
    }
}
