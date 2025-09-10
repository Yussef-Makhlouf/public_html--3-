<?php

namespace App\Http\Livewire\Offers;

use App\Models\SpecialOffer;
use Exception;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class OffersEdit extends Component
{
   use WithFileUploads;

   public $offer;
   public $image;

   protected $rules = [
      'image' => 'nullable|image|max:1024',
   ];

   public function mount(SpecialOffer $offer)
   {
      $this->offer = $offer;
   }

   public function render()
   {
      return view('livewire.offers.offers-edit', ['offer' => $this->offer]);
   }


   public function update()
   {
      try {
         $this->validate();

         $offer = SpecialOffer::findOrFail($this->offer->id);

         if ($this->image) {
            if ($offer->image) {
               Storage::delete('public/images/offers/' . $offer->image);
            }

            $imageName = time() . 'image.' . $this->image->getClientOriginalExtension();
            $this->image->storeAs('public/images/offers', $imageName);
            $offer->image = $imageName;
         }
         $isSaved = $offer->save();

         if ($isSaved) {
            session()->flash('message', 'تم تحديث المنتج بنجاح.');
            return redirect()->route('special_offers.index');
         } else {
            session()->flash('error', 'فشلت عملية التحديث.');
            $this->emit('OfferAdded', ['message' => 'فشلت عملية التحديث.']);
         }
      } catch (Exception $e) {
         session()->flash('error', 'حدث خطأ أثناء التحديث.');
         $this->emit('OfferError', ['message' => $e->getMessage()]);
      }
   }
}
