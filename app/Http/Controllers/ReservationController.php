<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
      return view('cms.reservations.index');
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
      return view('cms.reservations.create');
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
    * @param  \App\Models\Reservation  $reservation
    * @return \Illuminate\Http\Response
    */
   public function show($id)
   {
      //
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\Reservation  $reservation
    * @return \Illuminate\Http\Response
    */
   public function edit($id)
   {
      $reservation = Reservation::findOrFail($id);
      return view('cms.reservations.edit', compact('reservation'));
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Models\Reservation  $reservation
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, $id)
   {
      //
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\Reservation  $reservation
    * @return \Illuminate\Http\Response
    */
   public function destroy($id)
   {
      $reservation = Reservation::destroy($id);
      return response()->json(['icon' => 'success', 'title' => 'Deleted is Successfully'], $reservation ? 200 : 400);
   }
}
