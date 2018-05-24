<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminMarketingController extends Controller
{


    public function index()
    {
        $user = Auth::user();
        $user->authorizeRoles(['admin marketing', 'superAdmin']);

        return view('admin.marketing.gestionMarketing', ['user' => $user]);
    }
}
