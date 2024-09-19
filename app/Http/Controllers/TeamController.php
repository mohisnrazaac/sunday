<?php

namespace App\Http\Controllers;

class TeamController extends Controller
{
    // Show the form to create a new team
    public function create()
    {
        return view('contents.admin.teams.create');
    }

    public function index()
    {
        // Logic to fetch teams, members, or other necessary data goes here
        return view('contents.admin.teams.manage-team');
    }
}
