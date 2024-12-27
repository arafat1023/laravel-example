<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return view('projects.index', compact('projects'));
    }

    public function show(Project $project) // Route model binding
    {
        return view('projects.show', compact('project'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(Request $request)
    {
        $project = new Project();
        $project->name = $request->input('name');
        $project->description = $request->input('description');
        $project->save();

        return redirect()->route('projects.index'); // Redirect back to the project list
    }

    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $project->name = $request->input('name');
        $project->description = $request->input('description');
        $project->save();

        return redirect()->route('projects.show', $project);
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('projects.index');
    }

    public function approve(Project $project): \Illuminate\Http\RedirectResponse
    {
        // Logic to approve the project
        $project->update(['approved' => true]);

        return redirect()->route('projects.show', $project);
    }

}
