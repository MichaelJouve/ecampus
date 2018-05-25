<?php

namespace App\Http\Controllers\FrontEnd;

use App\Category;
use App\Http\Controllers\Controller;
use App\Publication;
use App\User;
use Illuminate\Http\Request;

class SearchController extends Controller
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
    public function index(Request $request)
    {
        $posts = Publication::where([['title', 'like', '%'.$request['search'].'%']])
            ->orWhere([['description', 'like', '%'.$request['search'].'%']])
            ->get();


        return view('search', ['tutorial' => $posts]);
    }


}