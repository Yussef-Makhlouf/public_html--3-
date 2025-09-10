<?php

namespace App\Http\Livewire\AboutUs;

use App\Models\AboutUs;
use Livewire\Component;

class AboutUsIndex extends Component
{
   protected $listeners = ['refreshAboutUs' => '$refresh'];

   public function render()
   {
      $about_us = AboutUs::all();
      return view('livewire.about-us.about-us-index', compact('about_us'));
   }
}
