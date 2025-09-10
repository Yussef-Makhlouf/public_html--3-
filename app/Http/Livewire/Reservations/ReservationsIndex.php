<?php

namespace App\Http\Livewire\Reservations;

use App\Models\Reservation;
use Livewire\Component;

class ReservationsIndex extends Component
{
   protected $listeners = ['refreshReservation' => '$refresh'];

   public function render()
   {
      $reservations = Reservation::all();
      return view('livewire.reservations.reservations-index', compact('reservations'));
   }
}
