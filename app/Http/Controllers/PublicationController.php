<?php

namespace App\Http\Controllers;

use App\Bought;
use App\Category;
use App\Consultation;
use App\Publication;
use App\Post;
use App\User;
use Illuminate\Foundation\Validation\ValidatesRequests;
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

        $this->validate($request, [
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
            'imgpublication' => 'mimetypes:image/gif,image/jpeg,image/png',
            'price' => 'integer|nullable',
            'required' => 'max:100',
            'goals' => 'max:100',
            'content' => 'required|max:65000',
        ]);

        //Gestion d'image tutoriel

        $inputs = $request->all();
        if ($inputs['price'] == null) {
            $inputs['price'] = 0;
        }

        if ($request->has('imgpublication')) {

            $imgpublication = $request->file('imgpublication')->storePublicly('imgpublication', 'public');
            $inputs['imgpublication'] = $imgpublication;
            $inputs['user_id'] = $user->id;
            Publication::create($inputs);

        } else {

            $p = Publication::create($inputs);
            $p->imgpublication = 'images/Tutos/' . $p->category->name . '.jpg';
            $p->save();

        }
        //Un petit message de succés ...
        session()->flash('message', 'Votre tutoriel a bien été créé !');
        return redirect()->route('user-profil', $slug);
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

        $bestTutorial = Publication::where('category_id', $category->id)->tuto()->first();

        $bestsTutorials =  Publication::where('category_id', $category->id)->tuto()->limit(4)->get();

        $lastTutorials = Publication::where('category_id', $category->id)->tuto()->latest()->limit(8)->get();



        return view('listing', ['category' => $category, 'bestTutorial' => $bestTutorial, 'bestsTutorials' => $bestsTutorials, 'lastTutorials' => $lastTutorials]);
    }

    public function showAll($name)
    {
        $category = Category::where('name', $name)->firstOrFail();
        $tutorials = Publication::with('category', 'user', 'consultation')->withCount('comment')->tuto()->where('category_id', $category->id)->paginate();

        return view('publication.categoryalltutorial', ['category' => $category, 'tutorials' => $tutorials]);
    }

    public function showTutorial($slug)
    {
        $user = Auth::user();
        $userId = $user->id;
        $tuto = Publication::where('slug', $slug)
            ->with(['comment' => function ($query){
                $query->with('user');
            }])
            ->withCount(['userOwner as bought' => function($query) use ($userId){
                $query->where('user_id', $userId);
            }])
            ->withCount(['consultation as seen' => function($query) use ($userId){
                $query->where('user_id', $userId);
            }])
            ->firstOrFail();


        if ($userId !== $tuto->user->id) {
            $consultation = Consultation::updateOrCreate(['publication_id' => $tuto->id, 'user_id' => $userId]);
            Consultation::find($consultation->id)->increment('occurrences');
        }

        return view('article', ['tuto' => $tuto]);
    }

    public function showPost($slug)
    {
        $post = Publication::where('slug', $slug)->firstOrFail();

        return view('article', ['post' => $post]);
    }

    public function showpublication($slug)
    {
        $publication = Publication::where('slug', $slug)
            ->with('user')
            ->firstOrFail();

        return view('publication.affichepublication', ['publication' => $publication]);
    }


    public function allTutorials()
    {
        if (request()->has('price')){

            if(request('price') === 'asc'){
                $tutorials = Publication::with('category', 'user', 'consultation')
                    ->withCount('comment')
                    ->tuto()
                    ->orderBy('price','asc')
                    ->paginate();
                return view('listingall', ['tutorials' => $tutorials]);
            }
            elseif(request('price') === 'desc'){

                $tutorials = Publication::with('category', 'user', 'consultation')
                    ->withCount('comment')
                    ->tuto()
                    ->orderBy('price','desc')
                    ->paginate();
                return view('listingall', ['tutorials' => $tutorials]);
            }
        }
        else{
            $tutorials = Publication::with('category', 'user', 'consultation')
                ->withCount('comment')
                ->tuto()
                ->paginate();

            return view('listingall', ['tutorials' => $tutorials]);
        }
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
     * @throws \Exception
     */
    public function softDelete($slug)
    {
        $publication = Publication::findBySlugOrFail($slug);
        $publication->delete();

        session()->flash('message', 'Votre publication a bien été supprimée !');

        return redirect()->route('user-profil');
    }

    public function buyTutorial($slug)
    {
        $publication = Publication::findBySlugOrFail($slug);
        $user = Auth::user();

        $publication->userOwner()->attach($user->id);


        return back();
    }
}
