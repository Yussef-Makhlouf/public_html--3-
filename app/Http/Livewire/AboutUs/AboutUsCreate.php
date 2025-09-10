<?php

namespace App\Http\Livewire\AboutUs;

use App\Models\AboutUs;
use Exception;
use Livewire\Component;
use Livewire\WithFileUploads;

class AboutUsCreate extends Component
{
   use WithFileUploads;

   public $titleEn;
   public $titleAr;
   public $contentEn;
   public $contentAr;
   public $image;

   public function render()
   {
      return view('livewire.about-us.about-us-create');
   }

   public function saveAboutUs()
   {
      $validatedData = $this->validate([
         'titleEn' => 'required|string|min:3',
         'titleAr' => 'required|string|min:3',
         'contentEn' => 'required|string|min:3',
         'contentAr' => 'required|string|min:3',
         'image' => 'required|image',
      ], [
         'titleEn.required' => 'عنوان العرض (بالإنجليزية) مطلوب',
         'titleAr.required' => 'عنوان العرض (بالعربية) مطلوب',
         'contentEn.required' => 'محتوى العرض (بالإنجليزية) مطلوب',
         'contentAr.required' => 'محتوى العرض (بالعربية) مطلوب',
         'image.required' => 'الصورة مطلوبة',
         'titleEn.min' => 'لا يقبل أقل من 3 حروف (بالإنجليزية)',
         'titleEn.max' => 'لا يقبل أكثر من 20 حرفًا (بالإنجليزية)',
         'titleAr.min' => 'لا يقبل أقل من 3 حروف (بالعربية)',
         'titleAr.max' => 'لا يقبل أكثر من 20 حرفًا (بالعربية)',
      ]);

      try {
         $aboutUs = new AboutUs();
         $aboutUs->title = json_encode(['en' => $validatedData['titleEn'], 'ar' => $validatedData['titleAr']]);
         $aboutUs->content = json_encode(['en' => $validatedData['contentEn'], 'ar' => $validatedData['contentAr']]);

         if ($this->image) {
            $image_name = time() . 'image.' . $this->image->getClientOriginalExtension();
            $this->image->storeAs('public/images/aboutUs', $image_name);
            $aboutUs->image = $image_name;
         }

         $isSaved = $aboutUs->save();

         if ($isSaved) {
            session()->flash('message', 'تمت الإضافة بنجاح.');
            $this->emit('AboutUsAdded', ['message' => 'تمت الإضافة بنجاح']);
         } else {
            session()->flash('error', 'فشلت عملية التخزين.');
            $this->emit('AboutUsError', ['message' => 'فشلت عملية التخزين']);
         }
      } catch (Exception $e) {
         $this->emit('AboutUsError', ['message' => $e->getMessage()]);
      }
   }
}
