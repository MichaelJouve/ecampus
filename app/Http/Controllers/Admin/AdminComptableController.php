<?php

namespace App\Http\Controllers\Admin;

use App\Bought;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminComptableController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $user = Auth::user();
        $user->authorizeRoles(['admin accounting', 'superAdmin']);
        $purchases = Bought::with('user', 'publi')->get();
        $dailyPurchases = Bought::where('created_at', '>', now()->subday())->get();
        $weeklyPurchases = Bought::where('created_at', '>', now()->subWeek())->get();
        $monthlyPurchases = Bought::where('created_at', '>', now()->subMonth())->get();
        $yearPurchases = Bought::where('created_at', '>', now()->subYear())->get();

        return view('admin.comptables.gestionCommercial', [
            'user' => $user,
            'purchases' => $purchases,
            'dailyPurchases' => $dailyPurchases,
            'weeklyPurchases' => $weeklyPurchases,
            'monthlyPurchases' => $monthlyPurchases,
            'yearPurchases' => $yearPurchases]);

    }

}
