<?php

namespace App\Http\Controllers;

use App\Models\Branche;
use Illuminate\Http\Request;

class BrancheController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
      $branches = Branche::all();
      return view('cms.branches.index', compact('branches'));
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
      return view('cms.branches.create');
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
    * @param  \App\Models\Branche  $branche
    * @return \Illuminate\Http\Response
    */
   public function show(Branche $branche)
   {
      //
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\Branche  $branche
    * @return \Illuminate\Http\Response
    */
   public function edit($id)
   {
      $branche = Branche::findOrFail($id);
      return view('cms.branches.edit', compact('branche'));
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Models\Branche  $branche
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, Branche $branche)
   {
      //
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\Branche  $branche
    * @return \Illuminate\Http\Response
    */
   public function destroy($id)
   {
      $branche = Branche::destroy($id);
      return response()->json(['icon' => 'success', 'title' => 'Deleted is Successfully'], $branche ? 200 : 400);
   }
}
