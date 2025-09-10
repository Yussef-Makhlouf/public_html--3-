<?php

namespace App\Http\Livewire\Front\Contact;

use App\Models\City;
use App\Models\Reservation;
use App\Models\Service;
use Exception;
use Livewire\Component;

class ReservationsCreate extends Component
{
   public $name;
   public $mobile;
   public $email;
   public $date;
   public $area;
   public $street;
   public $city_id;
   public $message;
   public $hall;
   public $service_id;
   public function render()
   {
      $services = Service::all();
      $cities = City::all();
      return view('livewire.front.contact.reservations-create', compact('services',  'cities'));
   }
   public function save()
   {
      $validatedData = $this->validate([
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
      ], [
         'name.required' => 'name مطلوب',
         'mobile.required' => 'mobile مطلوب',
         'email.required' => 'email مطلوب',
         'date.required' => 'date مطلوب',
         'area.required' => 'area مطلوب',
         'street.required' => 'street مطلوب',
         'service_id.required' => 'service_id مطلوب',
         'city_id.required' => 'city_id مطلوب',
         'message.required' => 'message مطلوب',
         'hall.required' => 'hall مطلوب',
         'image.required' => 'الصورة مطلوبة',
         'name.min' => 'لا يقبل أقل من 3 حروف',
         'name.max' => 'لا يقبل أكثر من 20 حرفًا',
      ]);

      try {
         $reservation = new Reservation();
         $reservation->name = $validatedData['name'];
         $reservation->mobile = $validatedData['mobile'];
         $reservation->email = $validatedData['email'];
         $reservation->date = $validatedData['date'];
         $reservation->area = $validatedData['area'];
         $reservation->street = $validatedData['street'];
         $reservation->service_id = $validatedData['service_id'];
         $reservation->city_id = $validatedData['city_id'];
         $reservation->message = $validatedData['message'];
         $reservation->hall = $validatedData['hall'];
         $isSaved = $reservation->save();

         if ($isSaved) {
            session()->flash('message', 'تمت الإضافة بنجاح.');
            $this->emit('ReservationAdded', ['message' => 'تمت الإضافة بنجاح']);
         } else {
            session()->flash('error', 'فشلت عملية التخزين.');
            $this->emit('ReservationError', ['message' => 'فشلت عملية التخزين']);
         }
      } catch (Exception $e) {
         $this->emit('ReservationError', ['message' => $e->getMessage()]);
      }
   }
}
