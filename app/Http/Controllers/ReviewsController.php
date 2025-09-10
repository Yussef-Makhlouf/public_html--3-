<?php

namespace App\Http\Controllers;

use App\Models\Reviews;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ReviewsController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
      return view('cms.reviews.index');
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
      return view('cms.reviews.create');
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
    * @param  \App\Models\Reviews  $reviews
    * @return \Illuminate\Http\Response
    */
   public function show(Reviews $reviews)
   {
      //
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\Reviews  $reviews
    * @return \Illuminate\Http\Response
    */
   public function edit($id)
   {
      $review = Reviews::findOrFail($id);
      return view('cms.reviews.edit', compact('review'));
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Models\Reviews  $reviews
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, Reviews $reviews)
   {
      //
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\Reviews  $reviews
    * @return \Illuminate\Http\Response
    */
   public function destroy($id)
   {
      $reviews = Reviews::findOrFail($id);
      if (!$reviews) {
         return response()->json(['icon' => 'error', 'title' => 'reviews not found'], 404);
      }
      Storage::delete('public/images/reviews/' . $reviews->image);
      $isDeleted = $reviews->delete();
      return response()->json(['icon' => 'success', 'title' => 'Deleted successfully'], $isDeleted ? 200 : 400);
   }
}
