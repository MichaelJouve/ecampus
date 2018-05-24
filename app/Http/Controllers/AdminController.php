<?php

namespace App\Http\Controllers;


use App\Category;
use App\Bought;
use App\Comment;
use App\ContactRequest;
use App\Publication;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;


class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        $user->authorizeRoles(['admin', 'superAdmin']);
        $users = User::all()->count();
        $tutoriels= Publication::where('type','tutorial')->get()->count();
        $posts= Publication::where('type','post')->get()->count();
        $comments = Comment::all()->count();
        $contactRequest = ContactRequest::all()->count();

        return view('admin.index',
                ['user' => $user,
                'users' =>$users,
                'tutoriels' => $tutoriels,
                'posts' => $posts,
                'comments' => $comments,
                'contactRequest' => $contactRequest]);

    }

}
