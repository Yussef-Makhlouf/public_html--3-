<?php

namespace App\Http\Livewire\Reviews;

use App\Models\Reviews;
use Exception;
use Livewire\Component;
use Livewire\WithFileUploads;

class ReviewsCreate extends Component
{
   use WithFileUploads;

   public $nameEn;
   public $nameAr;
   public $descreptionEn;
   public $descreptionAr;
   public $image;

   public function render()
   {
      return view('livewire.reviews.reviews-create');
   }

   public function saveReviews()
   {
      $validatedData = $this->validate([
         'nameEn' => 'required|string|min:3',
         'nameAr' => 'required|string|min:3',
         'descreptionEn' => 'required|string|min:3',
         'descreptionAr' => 'required|string|min:3',
         'image' => 'required|image',
      ], [
         'nameEn.required' => 'الاسم (بالإنجليزية) مطلوب',
         'nameAr.required' => 'الاسم (بالعربية) مطلوب',
         'descreptionEn.required' => 'الوصف (بالإنجليزية) مطلوب',
         'descreptionAr.required' => 'الوصف (بالعربية) مطلوب',
         'nameEn.min' => 'لا يقبل أقل من 3 حروف (بالإنجليزية)',
         'nameEn.max' => 'لا يقبل أكثر من 20 حرفًا (بالإنجليزية)',
         'nameAr.min' => 'لا يقبل أقل من 3 حروف (بالعربية)',
         'nameAr.max' => 'لا يقبل أكثر من 20 حرفًا (بالعربية)',
      ]);

      try {
         $reviews = new Reviews();
         $reviews->name = json_encode(['en' => $validatedData['nameEn'], 'ar' => $validatedData['nameAr']]);
         $reviews->descreption = json_encode(['en' => $validatedData['descreptionEn'], 'ar' => $validatedData['descreptionAr']]);

         if ($this->image) {
            $image_name = time() . 'image.' . $this->image->getClientOriginalExtension();
            $this->image->storeAs('public/images/reviews', $image_name);
            $reviews->image = $image_name;
         }
         $isSaved = $reviews->save();

         if ($isSaved) {
            session()->flash('message', 'تمت الإضافة بنجاح.');
            $this->emit('reviewsAdded', ['message' => 'تمت الإضافة بنجاح']);
         } else {
            session()->flash('error', 'فشلت عملية التخزين.');
            $this->emit('reviewsError', ['message' => 'فشلت عملية التخزين']);
         }
      } catch (Exception $e) {
         $this->emit('reviewsError', ['message' => $e->getMessage()]);
      }
   }
}
