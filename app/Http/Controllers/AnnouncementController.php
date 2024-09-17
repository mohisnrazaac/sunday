<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    public function index()
    {
        // Logic to fetch announcements or other necessary data goes here

        return view('contents.admin.announcements.manage-announcement');
    }
    // Show the form to create a new team
    public function create()
    {
        return view('contents.admin.announcements.create');
    }
}
