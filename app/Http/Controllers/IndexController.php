<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
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
    public function profil()
    {
        return view('profil');
    }


    public function article()
    {
        return view('article');
    }

    public function configInfos()
    {
        return view('configInfos');
    }

    public function configMessage()
    {
        return view('configMessage');
    }

    public function configPref()
    {
        return view('configPref');
    }



}
