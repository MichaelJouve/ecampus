<?php

namespace App\Http\Controllers;

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
/*
        try {
// Sous WAMP (Connexion à la base de donnée)
            $bdd = new \PDO('mysql:host=phpmyadmin.test;dbname=' . env('DB_DATABASE') . ';charset=utf8', env('DB_USERNAME'), env('DB_PASSWORD'));

        } catch (\Exception $e) {
            // En cas d'erreur, on affiche un message et on arrête tout
            die('Erreur de connexion : ' . $e->getMessage());
        }


        $reponse = $bdd->query("SELECT * FROM categories WHERE status='1'");
        $categories = $reponse->fetchAll();*/
        return view('index');
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
