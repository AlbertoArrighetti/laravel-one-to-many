<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Models\Type;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();

        return view('admin.projects.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        //validation
        $request->validated();
        $newProject = new Project();

        //check for image file
        if ($request->hasFile('thumb')) {
            $thumb_path = Storage::disk('public')->put('projects_thumbs', $request->thumb);
            $newProject->thumb = $thumb_path;
        }

        //fillable
        $newProject->fill($request->all());
        $newProject->save();

        // redirect to the list
        return redirect()->route('admin.projects.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $types = Type::all();

        return view('admin.projects.edit', compact('project', 'types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreProjectRequest $request, Project $project)
    {
        //validation
        $request->validated();

        //check for image file
        if ($request->hasFile('thumb')) {
            $thumb_path = Storage::disk('public')->put('projects_thumbs', $request->thumb);
            $project->thumb = $thumb_path;
        }

        //fillable
        $project->update($request->all());
        $project->save();
        return redirect()->route('admin.projects.show', $project->id);
    }




    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index');
    }
}
