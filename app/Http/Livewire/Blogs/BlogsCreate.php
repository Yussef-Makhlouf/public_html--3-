<?php

namespace App\Http\Livewire\Blogs;

use App\Models\Blogs;
use Exception;
use Livewire\Component;
use Livewire\WithFileUploads;

class BlogsCreate extends Component
{

   use WithFileUploads;

   public $nameEn;
   public $nameAr;
   public $authorEn;
   public $authorAr;
   public $contentEn;
   public $contentAr;
   public $date;
   public $image;

   public function render()
   {
      return view('livewire.blogs.blogs-create');
   }

   public function saveBlog()
   {
      $validatedData = $this->validate([
         'nameEn' => 'required|string|min:3',
         'nameAr' => 'required|string|min:3',
         'authorEn' => 'required|string|min:3',
         'authorAr' => 'required|string|min:3',
         'contentEn' => 'required|string|min:3',
         'contentAr' => 'required|string|min:3',
         'date' => 'required|string|min:3',
         'image' => 'required|image',
      ], [
         'nameEn.required' => 'الاسم (الإنجليزية) مطلوب',
         'nameAr.required' => 'الاسم (العربية) مطلوب',
         'contentEn.required' => 'المحتوى (الإنجليزية) مطلوب',
         'contentAr.required' => 'المحتوى (العربية) مطلوب',
         'authorEn.required' => 'المؤلف (الإنجليزية) مطلوب',
         'authorAr.required' => 'المؤلف (العربية) مطلوب',
         'date.required' => 'التاريخ مطلوب',
         'image.required' => 'الصورة مطلوبة',
         'nameEn.min' => 'لا يقبل أقل من 3 حروف (الإنجليزية)',
         'nameEn.max' => 'لا يقبل أكثر من 20 حرفًا (الإنجليزية)',
         'nameAr.min' => 'لا يقبل أقل من 3 حروف (العربية)',
         'nameAr.max' => 'لا يقبل أكثر من 20 حرفًا (العربية)',
      ]);

      try {
         $blog = new Blogs();
         $blog->name = json_encode(['en' => $validatedData['nameEn'], 'ar' => $validatedData['nameAr']]);
         $blog->author = json_encode(['en' => $validatedData['authorEn'], 'ar' => $validatedData['authorAr']]);
         $blog->content = json_encode(['en' => $validatedData['contentEn'], 'ar' => $validatedData['contentAr']]);
         $blog->date = $validatedData['date'];
         if ($this->image) {
            $image_name = time() . 'image.' . $this->image->getClientOriginalExtension();
            $this->image->storeAs('public/images/blog', $image_name);
            $blog->image = $image_name;
         }

         $isSaved = $blog->save();

         if ($isSaved) {
            session()->flash('message', 'تمت الإضافة بنجاح.');
            $this->emit('BlogAdded', ['message' => 'تمت الإضافة بنجاح']);
         } else {
            session()->flash('error', 'فشلت عملية التخزين.');
            $this->emit('BlogError', ['message' => 'فشلت عملية التخزين']);
         }
      } catch (Exception $e) {
         $this->emit('BlogError', ['message' => $e->getMessage()]);
      }
   }
}
