<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

// Import the DB facade


class ProjectController extends Controller
{
    public function index(): View
    {
        $projects = DB::table('projects')->get(); // Get all projects from the database
        return view('projects.index', compact('projects'));
    }

    public function show($id): View // We'll improve this with Route Model Binding later
    {
        $project = DB::table('projects')->find($id); // Find a project by its ID
        return view('projects.show', compact('project'));
    }
}


