<?php

namespace App\Http\Controllers;

use App\Models\Pdf;
use Illuminate\Http\Request;

class PdfController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
      return view('cms.pdfs.index');
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
      return view('cms.pdfs.create');
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(Request $request)
   {
   }

   /**
    * Display the specified resource.
    *
    * @param  \App\Models\Pdf  $pdf
    * @return \Illuminate\Http\Response
    */
   public function show($id)
   {
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\Pdf  $pdf
    * @return \Illuminate\Http\Response
    */
   public function edit($id)
   {
      $pdf = Pdf::findOrFail($id);

      return view('cms.pdfs.edit', compact('pdf'));
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Models\Pdf  $pdf
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, $id)
   {
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\Pdf  $pdf
    * @return \Illuminate\Http\Response
    */
   public function destroy($id)
   {
      $pdf = Pdf::destroy($id);
      return response()->json(['icon' => 'success', 'title' => 'Deleted is Successfully'], $pdf ? 200 : 400);
   }
}
