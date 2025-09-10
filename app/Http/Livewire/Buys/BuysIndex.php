<?php

namespace App\Http\Livewire\Buys;

use App\Models\Buy;
use Livewire\Component;

class BuysIndex extends Component
{
   protected $listeners = ['refreshBuys' => '$refresh'];

   public function render()
   {
      $buys = Buy::all();
      return view('livewire.buys.buys-index', compact('buys'));
   }
}
