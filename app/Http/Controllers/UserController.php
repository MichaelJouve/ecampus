<?php

namespace App\Http\Controllers;

use App\Profil;
use Illuminate\Support\Facades\Auth;
use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class UserController extends Controller
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

    public function otherprofil($slug)
    {
        $user = Auth::user();
        $userId = $user->id;
        $otherUser = User::where('slug', $slug)->withCount(['followers as follow' => function($query) use ($userId){
            $query->where('user_id_following', $userId);
        }])->firstOrFail();

        if ($userId === $otherUser->id) {
            return redirect()->route('user-profil');
        }

        return view('profil', ['user' => $otherUser, 'userFollowing' => $user]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category $category
     * @return \Illuminate\Http\Response
     */
    public function myProfil()
    {
        $userAuth = Auth::user();
        $userAuth->load('publication');
        $user = $userAuth;

        return view('profil', ['user' => $user, 'userAuth' => $userAuth]);
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
        $validateData['name'] = strtoupper($validateData['name']);
        $validateData['firstname'] = ucfirst($validateData['firstname']);

        Auth::user()->update($validateData);


        return redirect()->route('user-profil-infos');

    }


    public function updateDescription(Request $request)
    {
        $validateData = $request->validate([
            'description' => 'string|nullable',
        ]);

        Auth::user()->update($validateData);

        return redirect()->route('user-profil-infos');

    }


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

    // view infos
    public function infos()
    {
        $userAuth = Auth::user();
        $user = $userAuth;

        return view('configInfos', ['user' => $user, 'userAuth' => $userAuth]);
    }

//view message
    public function message()
    {
        $userAuth = Auth::user();
        $user = $userAuth;

        return view('configMessage', ['user' => $user, 'userAuth' => $userAuth]);
    }

//viex preference
    public function preference()
    {
        $userAuth = Auth::user();
        $user = $userAuth;

        return view('configPref', ['user' => $user, 'userAuth' => $userAuth]);
    }
}
