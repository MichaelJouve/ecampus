<?php

namespace App\Http\Controllers;

use App\Profil;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Http\Request;

class ConversationsController extends Controller
{
    public function index ()
    {
//        $user = Auth::user()->get();
        $users = User::select('name','id')->where('id','!=',Auth::user()->id)->get();
        return view('configMessage', compact('users'));
    }

    public function show ()
    {

    }
}
