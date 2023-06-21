<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\ProjectRequest;
use App\Models\Project;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::with('teams')->get();
        return response()->json([
            "error"=>false,
            "message"=>"Project Lists",
            "data"=>$projects
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProjectRequest $request)
    {
        $validator = $request->validated();
        $currentDate = Carbon::now();
        $validator['duration'] = $currentDate->addMonths($validator['duration']);
        $project = Project::create($validator);
        return response()->json([
            "error"=>false,
            "message"=>"Project created successfully",
            "data"=>$project
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return response()->json([
            "error"=>false,
            "message"=>"Project Detail",
            "data"=>$project
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProjectRequest $request, Project $project)
    {
        $validator = $request->validated();
        $currentDate = Carbon::now();
        $validator['duration'] = $currentDate->addMonths($validator['duration']);
        $project->update($validator);
        return response()->json([
            "error"=>false,
            "message"=>"Project updated successfully",
            "data"=>$project
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
       $project->delete();
       return response()->json([
        "error"=>false,
        "message"=>"Project deleted successfully",
    ]);
    }
}