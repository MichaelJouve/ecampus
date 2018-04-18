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
        $tutos = Publication::all()->where('type','=','tutorial');
        $posts = Publication::all()->where('type','=','post');

        return view('index', ['uses' => $uses, 'tutos' => $tutos, 'posts' => $posts]);
    }

    public function cgu()
    {
        return view('cgu');
    }

    public function contact()
    {
        return view('contact');
    }

    public function aboutus()
    {
        return view('aboutus');
    }

    public function listing($id)
    {
        //todo : add query to get all post
        return view('listing');
    }

    public function listingall()
    {
        return view('listingall');
    }

    public function recherche()
    {

        return view('recherche');
    }


}
