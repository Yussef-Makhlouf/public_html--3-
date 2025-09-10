<?php

namespace App\Http\Livewire;

use App\Models\Service;
use Livewire\Component;
use Livewire\Livewire;

class ServicesIndex extends Component
{
   protected $listeners = ['refreshServices' => '$refresh'];

   public function render()
   {
      $services = Service::all();
      return view('livewire.services-index', compact('services'));
   }
}
