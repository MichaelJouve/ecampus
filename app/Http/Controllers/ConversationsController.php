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
//
        $users = User::select('name','id')->where('id','!=',Auth::user()->id)->get();

        return view('conversations.index', compact('users'));
    }

    public function show (int $id)
    {

    }
}
