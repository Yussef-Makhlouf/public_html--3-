<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutUsController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
      $aboutUs = AboutUs::all();
      return view('cms.about_us.index', compact('aboutUs'));
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
      return view('cms.about_us.create');
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
    * @param  \App\Models\AboutUs  $aboutUs
    * @return \Illuminate\Http\Response
    */
   public function show(AboutUs $aboutUs)
   {
      //
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\AboutUs  $aboutUs
    * @return \Illuminate\Http\Response
    */
   public function edit($id)
   {
      $aboutUs = AboutUs::findOrFail($id);

      return view('cms.about_us.edit', compact('aboutUs'));
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Models\AboutUs  $aboutUs
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, AboutUs $aboutUs)
   {
      //
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\AboutUs  $aboutUs
    * @return \Illuminate\Http\Response
    */
   public function destroy()
   {
   }
}
