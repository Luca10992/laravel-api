<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::select(['id', 'type_id', 'title', 'description', 'thumb'])->with(['type:id,label,color', 'technologies:id,label'])->paginate(16);
        
        foreach ($projects as $project) {
            $project->thumb = !empty($project->thumb) ? asset('storage/' . $project->thumb) : null;
        }
        
        return response()->json($projects);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     */
    public function show($id)
    {
        $project = Project::where('id', $id)->with(['type:id,label,color', 'technologies:id,label'])->first();
        $project->thumb = !empty($project->thumb) ? asset('storage/' . $project->thumb) : null;
        return response()->json($project);
    }
}