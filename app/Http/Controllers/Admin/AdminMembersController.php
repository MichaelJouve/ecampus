<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminMembersController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        $user->authorizeRoles(['admin', 'superAdmin']);
        $users = User::with('roles')->get();

        return view('admin.members.gestionMembre', ['user' => Auth::user(), 'users' => $users]);
    }


    public function changeInfosMember($slug)
    {
        $user = Auth::user();
        $user->authorizeRoles(['admin', 'superAdmin']);
        $user->load('roles');
        $otherUser = User::findBySlugOrFail($slug);
        $roles = Role::all();

        return view('admin.members.modifMembre', ['user' => $user, 'otherUser' => $otherUser, 'roles' => $roles]);
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

}
