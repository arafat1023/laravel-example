<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

// Import the DB facade


class ProjectController extends Controller
{
    public function index():View
    {
        $projects = Project::all(); // Use Eloquent to get all projects
        // Example data returned by Project::all():
        // [
        //     (object)[
        //         'id' => 1,
        //         'name' => 'Project A',
        //         'description' => 'Description of Project A',
        //         'created_at' => '2024-12-01 10:00:00',
        //         'updated_at' => '2024-12-05 12:00:00',
        //     ],
        //     (object)[
        //         'id' => 2,
        //         'name' => 'Project B',
        //         'description' => 'Description of Project B',
        //         'created_at' => '2024-12-02 11:00:00',
        //         'updated_at' => '2024-12-06 13:00:00',
        //     ],
        // ]
        return view('projects.index', compact('projects'));
    }


    public function show(Project $project): View
    {
        return view('projects.show', compact('project'));
    }

}


