<?php

namespace App\Http\Controllers;


use App\Bought;
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

    public function gestionMembres()
    {
        $user = Auth::user();
        $user->authorizeRoles(['admin', 'superAdmin']);
        $users = User::with('roles')->get();



        return view('admin.gestionMembre', ['user' => Auth::user(), 'users' => $users]);
    }

    public function gestionPosts()
    {
        $user = Auth::user();
        $user->authorizeRoles(['admin', 'superAdmin']);
        $posts = Publication::where('type','=','post')->get();


        return view('admin.gestionPost', ['user' => Auth::user(), 'posts' => $posts]);
    }

    public function gestionTutoriels()
    {
        $user = Auth::user();
        $user->authorizeRoles(['admin', 'superAdmin']);
        $tutoriels = Publication::where('type','=','tutorial')->get();


        return view('admin.gestionTutoriel', ['user' => Auth::user(), 'tutoriels' => $tutoriels]);
    }

    public function gestionComments()
    {
        $user = Auth::user();
        $user->authorizeRoles(['admin', 'superAdmin']);
        $comments = Comment::all();

        return view('admin.gestionComment', ['user' => Auth::user(), 'comments' => $comments]);
    }

    public function gestionContactRequest()
    {
        $user = Auth::user();
        $user->authorizeRoles(['admin', 'superAdmin']);
        $contactRequests = ContactRequest::all();


        return view('admin.gestionContactRequest', ['user' => Auth::user(), 'contactRequests' => $contactRequests]);
    }

    public function changeInfosMembre($slug)
    {
        $user = Auth::user();
        $user->authorizeRoles(['admin', 'superAdmin']);
        $user->load('roles');
        $otherUser = User::findBySlugOrFail($slug);
        $roles = Role::all();


        return view('admin.modifMembre', ['user' => $user, 'otherUser' => $otherUser, 'roles' => $roles]);
    }

    public function adminUpdate(Request $request, $slug)
    {
        $user = Auth::user();
        $user->authorizeRoles(['superAdmin']);
        $otherUser = User::findBySlugOrFail($slug);
        $validateData = $request->validate([
            'name' => 'string|max:50',
            'firstname' => 'string|max:50',
            'email' => 'string|email|max:255',
            'paypal' => 'string|max:200|nullable',
            'birthday' => 'date|nullable',
        ]);

        $validateData['name'] = strtoupper($validateData['name']);
        $validateData['firstname'] = ucfirst($validateData['firstname']);

        $otherUser->update($validateData);

        $role_superAdmin = Role::where('id', $request['role_id'])->first();
        $otherUser->roles()->detach();
        $otherUser->roles()->attach($role_superAdmin);


        return redirect()->route('admin-membres');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function gestionComptable()
    {
        $user = Auth::user();
        $user->authorizeRoles(['admin accounting', 'superAdmin']);
        $purchases = Bought::with('user', 'publi')->get();
        $dailyPurchases = Bought::where('created_at', '>', now()->subday())->get();
        $weeklyPurchases = Bought::where('created_at', '>', now()->subWeek())->get();
        $monthlyPurchases = Bought::where('created_at', '>', now()->subMonth())->get();
        $yearPurchases = Bought::where('created_at', '>', now()->subYear())->get();

        return view('admin.gestionCommercial', [
                'user' => $user,
                'purchases' => $purchases,
                'dailyPurchases' => $dailyPurchases,
                'weeklyPurchases' => $weeklyPurchases,
                'monthlyPurchases' => $monthlyPurchases,
                'yearPurchases' => $yearPurchases]);

    }

    public function gestionMarketing()
    {
        $user = Auth::user();
        $user->authorizeRoles(['admin marketing', 'superAdmin']);

        return view('admin.gestionMarketing', ['user' => $user]);
    }
}
