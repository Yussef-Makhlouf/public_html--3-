<?php

namespace App\Http\Livewire\Reservations;

use App\Models\City;
use App\Models\Reservation;
use App\Models\Service;
use Exception;
use Livewire\Component;
use Livewire\WithFileUploads;

class ReservationsEdit extends Component
{
   use WithFileUploads;

   public $reservation;
   public $name;
   public $mobile;
   public $email;
   public $date;
   public $area;
   public $street;
   public $service_id;
   public $city_id;
   public $message;
   public $hall;

   protected $rules = [
      'name' => 'required|string|min:3',
      'mobile' => 'required|string|min:10',
      'email' => 'required|email',
      'date' => 'required',
      'area' => 'required',
      'street' => 'required',
      'service_id' => 'required',
      'city_id' => 'required',
      'message' => 'required|string|min:3',
      'hall' => 'required',
   ];

   public function mount(Reservation $reservation)
   {
      $this->reservation = $reservation;
      $this->name = $reservation->name;
      $this->mobile = $reservation->mobile;
      $this->email = $reservation->email;
      $this->date = $reservation->date;
      $this->area = $reservation->area;
      $this->street = $reservation->street;
      $this->service_id = $reservation->service_id;
      $this->city_id = $reservation->city_id;
      $this->message = $reservation->message;
      $this->hall = $reservation->hall;
   }

   public function render()
   {
      $services = Service::all();
      $cities = City::all();
      return view('livewire.reservations.reservations-edit', ['reservation' => $this->reservation, 'services' => $services, 'cities' => $cities]);
   }


   public function update()
   {
      try {
         $this->validate();

         $reservation = Reservation::findOrFail($this->reservation->id);
         $reservation->name = $this->name;
         $reservation->mobile = $this->mobile;
         $reservation->email = $this->email;
         $reservation->date = $this->date;
         $reservation->area = $this->area;
         $reservation->street = $this->street;
         $reservation->service_id = $this->service_id;
         $reservation->city_id = $this->city_id;
         $reservation->message = $this->message;
         $reservation->hall = $this->hall;
         $isSaved = $reservation->save();

         if ($isSaved) {
            session()->flash('message', 'تم تحديث المنتج بنجاح.');
            return redirect()->route('reservations.index');
         } else {
            session()->flash('error', 'فشلت عملية التحديث.');
            $this->emit('reservationError', ['message' => 'فشلت عملية التحديث.']);
         }
      } catch (Exception $e) {
         session()->flash('error', 'حدث خطأ أثناء التحديث.');
         $this->emit('reservationError', ['message' => $e->getMessage()]);
      }
   }
}
