<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Http\Requests\ProjectRequest;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        $msg = count($projects) == 0 ? 'No projects in database' : 'Projects has been found';
        return response()->json(['message' => $msg, 'data' => $projects], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectRequest $request)
    {
        $data = $request->validated();
        $project = new Project();

        $project->name = $data['name'];
        $project->description = $data['description'];
        $project->save();

        return response()->json(['message' => 'Project has been stored', 'data' => $project], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = Project::find($id);
        $msg = !isset($project) ? 'There is no project with this given id' : 'Project has been found';
        return response()->json(['message' => $msg, 'data' => $project], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProjectRequest $request, $id)
    {
        $project = Project::find($id);
        if(!isset($project))
            return response()->json(['message' => 'There is no project with this given id', 'data' => null], 404);

        $data = $request->validated();

        $project->name = $data['name'];
        $project->description = $data['description'];
        $project->save();

        return response()->json(['message' => 'Project has been updated', 'data' => $project], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = Project::find($id);
        if(!isset($project))
            return response()->json(['message' => 'There is no project with this given id', 'data' => null], 404);
        
        $project->delete();

        return response()->json(['message' => 'Project has been deleted', 'data' => null], 202);
    }
}
