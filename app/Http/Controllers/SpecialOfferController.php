<?php

namespace App\Http\Controllers;

use App\Models\SpecialOffer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SpecialOfferController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
      $offers = SpecialOffer::all();
      return view('cms.offers.index', compact('offers'));
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
      return view('cms.offers.create');
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
    * @param  \App\Models\SpecialOffer  $specialOffer
    * @return \Illuminate\Http\Response
    */
   public function show(SpecialOffer $specialOffer)
   {
      //
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\SpecialOffer  $specialOffer
    * @return \Illuminate\Http\Response
    */
   public function edit($id)
   {
      $offer = SpecialOffer::findOrFail($id);

      return view('cms.offers.edit', compact('offer'));
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Models\SpecialOffer  $specialOffer
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, SpecialOffer $specialOffer)
   {
      //
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\SpecialOffer  $specialOffer
    * @return \Illuminate\Http\Response
    */
   public function destroy($id)
   {
      $offer = SpecialOffer::find($id);
      if (!$offer) {
         return response()->json(['icon' => 'error', 'title' => 'our_clients not found'], 404);
      }

      Storage::delete('public/images/offers/' . $offer->image);
      $isDeleted = $offer->delete();
      return response()->json(['icon' => 'success', 'title' => 'Deleted successfully'], $isDeleted ? 200 : 400);
   }
}
