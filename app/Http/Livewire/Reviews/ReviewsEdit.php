<?php

namespace App\Http\Livewire\Reviews;

use App\Models\Reviews;
use Exception;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class ReviewsEdit extends Component
{

   use WithFileUploads;

   public $reviews;
   public $nameEn;
   public $nameAr;
   public $descreptionEn;
   public $descreptionAr;
   public $image;

   protected $rules = [
      'nameEn' => 'required|string|min:3',
      'nameAr' => 'required|string|min:3',
      'descreptionEn' => 'required|string|min:3',
      'descreptionAr' => 'required|string|min:3',
   ];

   public function mount(Reviews $review)
   {
      $this->reviews = $review;
      $this->nameEn = $review->nameEn;
      $this->nameAr = $review->nameAr;
      $this->descreptionEn = $review->descreptionEn;
      $this->descreptionAr = $review->descreptionAr;
   }

   public function render()
   {
      return view('livewire.reviews.reviews-edit', ['reviews' => $this->reviews]);
   }

   public function update()
   {
      try {
         $this->validate();

         $reviews = Reviews::findOrFail($this->reviews->id);
         $reviews->name = json_encode(['en' => $this->nameEn, 'ar' => $this->nameAr]);
         $reviews->descreption = json_encode(['en' => $this->descreptionEn, 'ar' => $this->descreptionAr]);

         if ($this->image) {
            if ($reviews->image) {
               Storage::delete('public/images/reviews/' . $reviews->image);
            }

            $imageName = time() . 'image.' . $this->image->getClientOriginalExtension();
            $this->image->storeAs('public/images/reviews', $imageName);
            $reviews->image = $imageName;
         }

         $isSaved = $reviews->save();

         if ($isSaved) {
            session()->flash('message', 'تم تحديث المنتج بنجاح.');
            return redirect()->route('reviews.index');
         } else {
            session()->flash('error', 'فشلت عملية التحديث.');
            $this->emit('reviewsError', ['message' => 'فشلت عملية التحديث.']);
         }
      } catch (Exception $e) {
         session()->flash('error', 'حدث خطأ أثناء التحديث.');
         $this->emit('reviewsError', ['message' => $e->getMessage()]);
      }
   }
}
