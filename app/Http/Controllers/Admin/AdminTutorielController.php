<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Publication;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminTutorielController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        $user->authorizeRoles(['admin', 'superAdmin']);
        $tutoriels = Publication::where('type','=','tutorial')->get();

        return view('admin.posts.gestionTutoriel', ['user' => Auth::user(), 'tutoriels' => $tutoriels]);
    }

    public function viewChangeTuto($slug)
    {
        $user = Auth::user();
        $user->load('roles');

        $categories = Category::all();
        $publication = Publication::where('slug', $slug)
            ->with('user')
            ->firstOrFail();
        $decodeContent = html_entity_decode($publication->content);

        return view('admin.posts.tutorial.changeTuto', [
            'user' => $user,
            'publication' => $publication,
            'categories' => $categories,
            'decodeContent' => $decodeContent
        ]);

    }


}
