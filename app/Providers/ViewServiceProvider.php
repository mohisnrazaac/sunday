<?php

namespace App\Providers;



namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use App\Models\Message; 
use App\Models\User; 

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
       
        // Share totalUsers with the footer view
        View::composer('layouts.footer', function ($view) {
            $totalUsers = 25; // Or dynamically fetch this value
            $view->with('totalUsers', $totalUsers);
        });

        View::composer('layouts.menu.sidebar', function ($view) {
            $view->with('testVariable', 'This is a test');
        });

        // Share unread messages count with the header view
        View::composer('layouts.admin', function ($view) {
            $user = Auth::user();

            if ($user) {
                $unreadCount = Message::where('receiver_id', $user->id)
                    ->where('read_at', null) // Adjust column name as needed
                    ->count();
                $view->with('unreadCount', $unreadCount);
            }
            //$view->with('unreadCount', 3);
        });

       
    }
}
