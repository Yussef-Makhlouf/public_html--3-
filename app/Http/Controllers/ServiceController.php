<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
      return view('cms.services.index');
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
      return view('cms.services.create');
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
    * @param  \App\Models\Service  $service
    * @return \Illuminate\Http\Response
    */
   public function show(Service $service)
   {
      //
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\Service  $service
    * @return \Illuminate\Http\Response
    */
   public function edit(Service $service)
   {
      return view('cms.services.edit', compact('service'));
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Models\Service  $service
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, Service $service)
   {
      //
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\Service  $service
    * @return \Illuminate\Http\Response
    */
   public function destroy($id)
   {
      $service = Service::find($id);
      if (!$service) {
         return response()->json(['icon' => 'error', 'title' => 'Service not found'], 404);
      }

      Storage::delete('public/images/service/' . $service->main_image);

      $subImages = json_decode($service->sub_images, true);
      foreach ($subImages as $subImage) {
         Storage::delete('public/images/sub_images_service/' . $subImage);
      }

      if ($service->video) {
         Storage::delete('public/images/service/' . $service->video);
      }

      $isDeleted = $service->delete();
      return response()->json(['icon' => 'success', 'title' => 'Deleted successfully'], $isDeleted ? 200 : 400);
   }
}
