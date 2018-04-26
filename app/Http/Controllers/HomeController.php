<?php

namespace App\Http\Controllers;

use App\Category;
use App\Publication;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('created_at', 'desc')->limit(5)->get();

        $tutos = Publication::where('type','=','tutorial')->latest()->limit(6)->get();

        $posts = Publication::with('user')->where('type','=','post')->latest()->limit(4)->get();

        return view('index', ['users' => $users, 'tutos' => $tutos, 'posts' => $posts]);
    }

    public function panier()
    {
        return view('panier');
    }


}
