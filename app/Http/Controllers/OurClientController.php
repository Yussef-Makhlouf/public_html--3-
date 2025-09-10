<?php

namespace App\Http\Controllers;

use App\Models\OurClient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OurClientController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
      $ourClient = OurClient::all();
      return view('cms.our_clients.index', compact('ourClient'));
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
      return view('cms.our_clients.create');
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
    * @param  \App\Models\OurClient  $ourClient
    * @return \Illuminate\Http\Response
    */
   public function show(OurClient $ourClient)
   {
      //
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\OurClient  $ourClient
    * @return \Illuminate\Http\Response
    */
   public function edit($id)
   {
      $ourClient = OurClient::findOrFail($id);

      return view('cms.our_clients.edit', compact('ourClient'));
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Models\OurClient  $ourClient
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, OurClient $ourClient)
   {
      //
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\OurClient  $ourClient
    * @return \Illuminate\Http\Response
    */
   public function destroy($id)
   {
      $ourClient = OurClient::find($id);
      if (!$ourClient) {
         return response()->json(['icon' => 'error', 'title' => 'our_clients not found'], 404);
      }

      Storage::delete('public/images/our_clients/' . $ourClient->image);
      $isDeleted = $ourClient->delete();
      return response()->json(['icon' => 'success', 'title' => 'Deleted successfully'], $isDeleted ? 200 : 400);
   }
}
