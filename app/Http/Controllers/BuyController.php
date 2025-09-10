<?php

namespace App\Http\Controllers;

use App\Models\Buy;
use Illuminate\Http\Request;

class BuyController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
      return view('cms.buys.index');
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
      return view('cms.buys.create');
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
    * @param  \App\Models\Buy  $buy
    * @return \Illuminate\Http\Response
    */
   public function show($id)
   {
      $buy = Buy::findOrFail($id);
      return view('cms.buys.show', compact('buy'));
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\Buy  $buy
    * @return \Illuminate\Http\Response
    */
   public function edit($id)
   {
      $buy = Buy::findOrFail($id);
      return view('cms.buys.edit', compact('buy'));
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Models\Buy  $buy
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, Buy $buy)
   {
      //
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\Buy  $buy
    * @return \Illuminate\Http\Response
    */
   public function destroy($id)
   {
      $buy = Buy::destroy($id);
      return response()->json(['icon' => 'success', 'title' => 'Deleted is Successfully'], $buy ? 200 : 400);
   }
}
