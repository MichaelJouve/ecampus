<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminRequestController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        $user->authorizeRoles(['admin', 'superAdmin']);
        $contactRequests = ContactRequest::all();

        return view('admin.requests.gestionContactRequest', [
            'user' => Auth::user(),
            'contactRequests' => $contactRequests
        ]);
    }

}
