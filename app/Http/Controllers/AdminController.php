<?php

namespace App\Http\Controllers;


use App\Comment;
use App\ContactRequest;
use App\Publication;
use App\Role;
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
        $contactRequest = ContactRequest::all()->count();


        $user->authorizeRoles(['admin', 'superAdmin']);

        return view('admin.index',
                ['user' => $user,
                'users' =>$users,
                'tutoriels' => $tutoriels,
                'posts' => $posts,
                'comments' => $comments,
                'contactRequest' => $contactRequest]);

    }

    public function gestionMembres()
    {
        $users = User::with('roles')->get();

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

    public function gestionContactRequest()
    {
        $contactRequests = ContactRequest::all();

        return view('admin.gestionContactRequest', ['user' => Auth::user(), 'contactRequests' => $contactRequests]);
    }

    public function changeInfosMembre($slug)
    {
        $user = Auth::user();
        $user->load('roles');
        $otherUser = User::findBySlugOrFail($slug);
        $roles = Role::all();

        return view('admin.modifMembre', ['user' => $user, 'otherUser' => $otherUser, 'roles' => $roles]);
    }

    public function adminUpdate(Request $request, $slug)
    {
        $user = User::findBySlugOrFail($slug);
        $validateData = $request->validate([
            'name' => 'string|max:50',
            'firstname' => 'string|max:50',
            'email' => 'string|email|max:255',
            'paypal' => 'string|max:200|nullable',
            'birthday' => 'date|nullable',
        ]);

        $validateData['name'] = strtoupper($validateData['name']);
        $validateData['firstname'] = ucfirst($validateData['firstname']);

        $user->update($validateData);

        $role_superAdmin = Role::where('id', $request['role_id'])->first();
        $user->roles()->detach();
        $user->roles()->attach($role_superAdmin);


        return redirect()->route('admin-membres');
    }
}
