<?php

namespace App\Http\Controllers\Admin;

use App\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminCommentController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        $user->authorizeRoles(['admin', 'superAdmin']);
        $comments = Comment::all();
        return view('admin.comments.gestionComment', ['user' => Auth::user(), 'comments' => $comments]);
    }

}
