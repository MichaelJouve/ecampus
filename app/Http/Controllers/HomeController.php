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
        $uses = User::all();
        $tutos = Publication::where('type','=','tutorial')->latest()->limit(6)->get();
        $posts = Publication::where('type','=','post')->latest()->limit(4)->get();

        return view('index', ['uses' => $uses, 'tutos' => $tutos, 'posts' => $posts]);
    }


}
