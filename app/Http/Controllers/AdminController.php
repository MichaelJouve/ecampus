<?php

namespace App\Http\Controllers;

use App\Category;
use App\Comment;
use App\Publication;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        $users = User::all()->count();
        $tutoriels= Publication::where('type','tutorial')->get()->count();
        $posts= Publication::where('type','post')->get()->count();
        $comments = Comment::all()->count();


        if ($user->role == "administrateur") {
            return view('admin.index', ['user' => $user, 'users' =>$users, 'tutoriels' => $tutoriels, 'posts' => $posts, 'comments' => $comments]);
        } else {
            return abort(404);
        }
    }

    public function gestionMembres()
    {
        $users = User::all();

        return view('admin.gestionMembre', ['user' => Auth::user(), 'users' => $users]);
    }

    public function gestionPosts()
    {
        $posts = Publication::where('type','=','post')->get();

        return view('admin.gestionPost', ['user' => Auth::user(), 'posts' => $posts]);
    }

    public function gestionTutoriels()
    {
        $tutoriels = Publication::where('type','=','tutorial')->get();

        return view('admin.gestionTutoriel', ['user' => Auth::user(), 'tutoriels' => $tutoriels]);
    }

    public function gestionComments()
    {
        $comments = Comment::all();

        return view('admin.gestionComment', ['user' => Auth::user(), 'comments' => $comments]);
    }
}
