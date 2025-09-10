<?php

namespace App\Http\Controllers;

use App\Models\Blogs;
use Illuminate\Http\Request;

class BlogsController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
      $blogs = Blogs::all();
      return view('cms.blogs.index', compact('blogs'));
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
      return view('cms.blogs.create');
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
    * @param  \App\Models\Blogs  $blogs
    * @return \Illuminate\Http\Response
    */
   public function show(Blogs $blogs)
   {
      //
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\Blogs  $blogs
    * @return \Illuminate\Http\Response
    */
   public function edit($id)
   {
      $blog = Blogs::findOrFail($id);
      return view('cms.blogs.edit', compact('blog'));
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Models\Blogs  $blogs
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, Blogs $blogs)
   {
      //
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\Blogs  $blogs
    * @return \Illuminate\Http\Response
    */
   public function destroy($id)
   {
      $blog = Blogs::destroy($id);
      return response()->json(['icon' => 'success', 'title' => 'Deleted is Successfully'], $blog ? 200 : 400);
   }
}
