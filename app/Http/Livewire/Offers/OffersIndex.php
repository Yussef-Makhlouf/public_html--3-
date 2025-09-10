<?php

namespace App\Http\Livewire\Offers;

use App\Models\SpecialOffer;
use Livewire\Component;

class OffersIndex extends Component
{
   protected $listeners = ['refreshOffer' => '$refresh'];

   public function render()
   {
      $offers = SpecialOffer::all();
      return view('livewire.offers.offers-index', compact('offers'));
   }
}
