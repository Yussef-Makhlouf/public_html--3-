<?php

namespace App\Http\Livewire\AboutUs;

use App\Models\AboutUs;
use Exception;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class AboutUsEdit extends Component
{
   use WithFileUploads;

   public $aboutUs;
   public $titleEn;
   public $titleAr;
   public $contentEn;
   public $contentAr;
   public $date;
   public $image;

   protected $rules = [
      'titleEn' => 'required|string|min:3',
      'titleAr' => 'required|string|min:3',
      'contentEn' => 'required|string|min:3',
      'contentAr' => 'required|string|min:3',
   ];

   public function mount(AboutUs $aboutUs)
   {
      $this->aboutUs = $aboutUs;
      $this->titleEn = $aboutUs->titleEn;
      $this->titleAr = $aboutUs->titleAr;
      $this->contentEn = $aboutUs->contentEn;
      $this->contentAr = $aboutUs->contentAr;
   }

   public function render()
   {
      return view('livewire.about-us.about-us-edit', ['aboutus' => $this->aboutUs]);
   }

   public function update()
   {
      try {
         $this->validate();

         $aboutUs = AboutUs::findOrFail($this->aboutUs->id);
         $aboutUs->title = json_encode(['en' => $this->titleEn, 'ar' => $this->titleAr]);
         $aboutUs->content = json_encode(['en' => $this->contentEn, 'ar' => $this->contentAr]);

         if ($this->image) {
            if ($aboutUs->image) {
               Storage::delete('public/images/aboutUs/' . $aboutUs->image);
            }

            $imageName = time() . 'image.' . $this->image->getClientOriginalExtension();
            $this->image->storeAs('public/images/aboutUs', $imageName);
            $aboutUs->image = $imageName;
         }

         $isSaved = $aboutUs->save();

         if ($isSaved) {
            session()->flash('message', 'تم تحديث المنتج بنجاح.');
            return redirect()->route('about_us.index');
         } else {
            session()->flash('error', 'فشلت عملية التحديث.');
            $this->emit('AboutUsError', ['message' => 'فشلت عملية التحديث.']);
         }
      } catch (Exception $e) {
         session()->flash('error', 'حدث خطأ أثناء التحديث.');
         $this->emit('AboutUsError', ['message' => $e->getMessage()]);
      }
   }
}
