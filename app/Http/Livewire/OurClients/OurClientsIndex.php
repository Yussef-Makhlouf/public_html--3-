<?php

namespace App\Http\Livewire\OurClients;

use App\Models\OurClient;
use Livewire\Component;

class OurClientsIndex extends Component
{
   protected $listeners = ['refreshClient' => '$refresh'];

   public function render()
   {
      $our_clients = OurClient::all();
      return view('livewire.our-clients.our-clients-index', compact('our_clients'));
   }
}
