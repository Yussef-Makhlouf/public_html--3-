<?php

namespace App\Http\Controllers;

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
      $projects = Project::all();
      return view('cms.projects.index', compact('projects'));
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
      return view('cms.projects.create');
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(Request $request)
   {
      //
   }

   /**
    * Display the specified resource.
    *
    * @param  \App\Models\Project  $project
    * @return \Illuminate\Http\Response
    */
   public function show(Project $project)
   {
      //
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\Project  $project
    * @return \Illuminate\Http\Response
    */
   public function edit(Project $project)
   {
      return view('cms.projects.edit', compact('project'));
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Models\Project  $project
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, Project $project)
   {
      //
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\Project  $project
    * @return \Illuminate\Http\Response
    */
   public function destroy($id)
   {
      $project = Project::destroy($id);
      return response()->json(['icon' => 'success', 'title' => 'Deleted is Successfully'], $project ? 200 : 400);
   }
}
