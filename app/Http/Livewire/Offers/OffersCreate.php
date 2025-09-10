<?php

namespace App\Http\Livewire\Offers;

use App\Models\SpecialOffer;
use Exception;
use Livewire\Component;
use Livewire\WithFileUploads;

class OffersCreate extends Component
{
   use WithFileUploads;

   public $image;

   public function render()
   {
      return view('livewire.offers.offers-create');
   }
   public function save()
   {
      $validatedData = $this->validate([
         'image' => 'required|image',
      ], [
         'image.required' => 'الصورة مطلوبة',
      ]);

      try {
         $offer = new SpecialOffer();
         $image_name = time() . 'image.' . $this->image->getClientOriginalExtension();
         $this->image->storeAs('public/images/offers', $image_name);
         $offer->image = $image_name;


         $isSaved = $offer->save();

         if ($isSaved) {
            session()->flash('message', 'تمت الإضافة بنجاح.');
            $this->emit('OfferAdded', ['message' => 'تمت الإضافة بنجاح']);
         } else {
            session()->flash('error', 'فشلت عملية التخزين.');
            $this->emit('OfferError', ['message' => 'فشلت عملية التخزين']);
         }
      } catch (Exception $e) {
         $this->emit('OfferError', ['message' => $e->getMessage()]);
      }
   }
}
