<?php

namespace App\Http\Controllers;

use App\Category;
use App\Profil;
use App\Publication;
use Illuminate\Support\Facades\Auth;
use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    /**
     * UserController constructor.
     */
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
        return view('profil', ['user' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function otherprofil($slug)
    {
        $user = Auth::user();
        $userId = $user->id;
        $otherUser = User::where('slug', $slug)
            ->withCount(['followers as follow' => function ($query) use ($userId) {
                $query->where('user_id_following', $userId);
            }])->firstOrFail();

        if ($userId === $otherUser->id) {
            return redirect()->route('user-profil');
        }

        return view('profil', ['user' => $otherUser, 'userFollowing' => $user]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function myProfil()
    {
        $userAuth = Auth::user();
        $userAuth->load('publication');
        $publications = Publication::where('user_id', $userAuth->id)
            ->with('category')
            ->latest()
            ->get();
        $user = $userAuth;

        return view('profil', [
            'user' => $user,
            'userAuth' => $userAuth,
            'publications' => $publications
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category $category
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Category $category
     * @return \Illuminate\Http\Response
     * todo coinfirmation de mot de passe pour changement =)
     */
    public function update(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'string|max:50',
            'firstname' => 'string|max:50',
            'email' => 'string|email|max:255',
            'paypal' => 'string|max:200|nullable',
            'birthday' => 'date|nullable',
        ]);
        $validateData['name'] = ucfirst($validateData['name']);
        $validateData['firstname'] = ucfirst($validateData['firstname']);

        Auth::user()->update($validateData);


        return redirect()->route('user-profil-infos');

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateDescription(Request $request)
    {
        $validateData = $request->validate([
            'description' => 'string|nullable',
        ]);

        Auth::user()->update($validateData);

        return redirect()->route('user-profil-infos');

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateAvatar(Request $request)
    {

// logo
        if ($request->hasFile('avatar')) {

            if ($request->file('avatar')->isValid()) {
                $user = Auth::user();

                // open an image file
                $img = Image::make($request->avatar->path());

                // True colors

                $img->limitColors(null);

                // Resize 300x300

                $img->resize(300, 300, function ($constraint) {

                    $constraint->aspectRatio();

                });

                // Blank background if canvas

                $img->resizeCanvas(290, 300, 'center', false, '#ffffff');

                // je force la photo en jpg
                $img->stream('jpg', 90);


                //je lenregistre dans public / img-user de notre storage
                Storage::disk('public')->put('img-user/' . $img->filename . '.jpg', $img);

                // MAJ user
                $user->imgprofil = 'storage/img-user/' . $img->filename . '.jpg';
                $user->save();

                return redirect()->route('user-profil-infos');

            }

        } else {

            return redirect()->route('user-profil-infos');


        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function infos()
    {
        $userAuth = Auth::user();
        $user = $userAuth;

        return view('userConfig.configInfos', ['user' => $user, 'userAuth' => $userAuth]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function message()
    {
        $userAuth = Auth::user();
        $user = $userAuth;
        $userId = $user->id;

        $user->load('unreadMessage');


        $users = User::where('id', '!=', $userAuth->id)
            ->withCount(['unreadMessageByUser' => function ($query) use ($userId) {
                $query->where('to_user_id', $userId);
            }])->get();

        return view('userConfig.configMessage', ['user' => $user, 'userAuth' => $userAuth, 'users' => $users]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function preference()
    {
        $userAuth = Auth::user();
        $user = $userAuth;

        return view('userConfig.configPref', ['user' => $user, 'userAuth' => $userAuth]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function bought()
    {
        if (request()->has('price')) {

            if (request('price') === 'asc') {
                $user = User::where('id', Auth::id())
                    ->with(['postsBought' => function ($query) {
                        $query->withCount('comment')
                            ->tuto()
                            ->orderBy('price', 'asc');
                    }])
                    ->first();
                return view('bought', ['user' => $user]);

            } elseif (request('price') === 'desc') {
                $user = User::where('id', Auth::id())
                    ->with(['postsBought' => function ($query) {
                        $query->withCount('comment')
                            ->tuto()
                            ->orderBy('price', 'desc');
                    }])
                    ->first();
                return view('bought', ['user' => $user]);
            }
        } else {
            $user = User::where('id', Auth::id())
                ->with(['postsBought' => function ($query) {
                    $query->withCount('comment')
                        ->tuto();
                }])
                ->first();

            return view('bought', ['user' => $user]);

        }
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function categoryBought()
    {
        $user = Auth::user();
        $categories = Category::with('post')->get();
        return view('bought.categoryBought', ['categories' => $categories, 'user' => $user]);
    }

    /**
     * @param $name
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showAllBoughtByCategory($name)
    {
        $category = Category::where('name', $name)->firstOrFail();

        if (request()->has('price')) {

            if (request('price') === 'asc') {
                $user = User::where('id', Auth::id())
                    ->with(['postsBought' => function ($query) use ($category) {
                        $query->where('category_id', $category->id)
                            ->withCount('comment')
                            ->tuto()
                            ->orderBy('price', 'asc');
                    }])
                    ->first();
                return view('bought.categoryAllBought', ['category' => $category, 'user' => $user]);

            } elseif (request('price') === 'desc') {
                $user = User::where('id', Auth::id())
                    ->with(['postsBought' => function ($query) use ($category) {
                        $query->where('category_id', $category->id)
                            ->withCount('comment')
                            ->tuto()
                            ->orderBy('price', 'desc');
                    }])
                    ->first();
                return view('bought.categoryAllBought', ['category' => $category, 'user' => $user]);

            }
        } else {
            $user = User::where('id', Auth::id())
                ->with(['postsBought' => function ($query) use ($category) {
                    $query->where('category_id', $category->id)
                        ->withCount('comment')
                        ->tuto();
                }])
                ->first();
            return view('bought.categoryAllBought', ['category' => $category, 'user' => $user]);

        }
    }

    public function subscription()
    {
        $user = Auth::user();
        $user->subscription = 1;
        $user->save();


        session()->flash('message', 'Bravo, Vous êtes maintenant abonné');
        return redirect()->route('user-profil');
    }

    public function unsubscription()
    {
        $user = Auth::user();
        $user->subscription = 0;
        $user->save();

        session()->flash('message', 'Votre abonnement a été désactivé');
        return redirect()->route('user-profil');
    }
}
