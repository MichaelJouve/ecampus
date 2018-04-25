<?php

namespace App\Http\Controllers;

use App\Profil;
use Illuminate\Support\Facades\Auth;
use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $otherUser = User::findBySlugOrFail($slug);

        if ($user == $otherUser) {
            return redirect()->route('user-profil');
        }

        return view('profil', ['user' => $otherUser]);
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

        Auth::user()->update($validateData);

        $user = Auth::user();
        return view('configInfos', ['user' => $user]);

    }


    public function updateDescription(Request $request)
    {
        $validateData = $request->validate([
            'description' => 'string|nullable',
        ]);

        Auth::user()->update($validateData);

        $user = Auth::user();
        return view('configInfos', ['user' => $user]);
    }


    public function updateAvatar(Request $request)
    {
        if ($request->has('avatar')) {
            $request->validate([
               'avatar' =>'required|mimetypes:image/png,image/jpeg,image/png'
            ]);

            $avatar = $request->avatar->store('imgprofil', 'public');

            $user = Auth::user();
            $user->imgprofil = $avatar;
            $user->save();

            return view('configInfos', ['user' => $user]);
        } else {
            session()->flash('message','Vous n\'avez pas inséré d\'image');

            $user = Auth::user();
            return view('configInfos', ['user' => $user]);

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

    // infos message preference
    public function infos()
    {
        $userAuth = Auth::user();
        $user = $userAuth;

        return view('configInfos', ['user' => $user, 'userAuth' => $userAuth]);
    }

    public function message()
    {
        $userAuth = Auth::user();
        $user = $userAuth;

        return view('configMessage', ['user' => $user, 'userAuth' => $userAuth]);
    }

    public function preference()
    {
        $userAuth = Auth::user();
        $user = $userAuth;

        return view('configPref', ['user' => $user, 'userAuth' => $userAuth]);
    }
}
