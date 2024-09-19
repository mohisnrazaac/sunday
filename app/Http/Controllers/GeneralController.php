<?php

namespace App\Http\Controllers;

use App\Services\Units\Coins\UserCoins;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GeneralController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function dashboard(UserCoins $userCoins)
    {
        $user = Auth::user();
        $user->badge = $userCoins->getUserBadge($user);
        $rolesWithUserCount = DB::table('roles')
            ->leftJoin('users', 'roles.id', '=', 'users.user_role')
            ->select('roles.name as role_name', DB::raw('count(users.id) as user_count'))
            ->groupBy('roles.id', 'roles.name')
            ->get();

   

       return view('contents.dashboard.index', compact('user','rolesWithUserCount'));
    }
}
