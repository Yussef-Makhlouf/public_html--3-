<?php

namespace App\Http\Livewire\Categories;

use App\Models\Category;
use Exception;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class CategoriesEdit extends Component
{
   use WithFileUploads;

   public $category;
   public $nameEn;
   public $nameAr;
   public $descriptionEn;
   public $descriptionAr;
   public $date;
   public $image;

   protected $rules = [
      'nameEn' => 'required|string|min:3|max:50',
      'nameAr' => 'required|string|min:3|max:50',
      'descriptionEn' => 'required|string|min:3',
      'descriptionAr' => 'required|string|min:3',
      // 'image' => 'required|image',
   ];

   public function mount(Category $category)
   {
      $this->category = $category;
      $this->nameEn = $category->nameEn;
      $this->nameAr = $category->nameAr;
      $this->descriptionEn = $category->descriptionEn;
      $this->descriptionAr = $category->descriptionAr;
   }

   public function render()
   {
      return view('livewire.categories.categories-edit', ['category' => $this->category]);
   }


   public function update()
   {
      try {
         $this->validate();

         $category = Category::findOrFail($this->category->id);
         $category->name = json_encode(['en' =>  $this->nameEn, 'ar' => $this->nameAr]);
         $category->description = json_encode(['en' =>  $this->descriptionEn, 'ar' => $this->descriptionAr]);

         if ($this->image) {
            if ($category->image) {
               Storage::delete('public/images/category/' . $category->image);
            }

            $imageName = time() . 'image.' . $this->image->getClientOriginalExtension();
            $this->image->storeAs('public/images/category', $imageName);
            $category->image = $imageName;
         }
         $isSaved = $category->save();

         if ($isSaved) {
            session()->flash('message', 'تم تحديث المنتج بنجاح.');
            return redirect()->route('categories.index');
         } else {
            session()->flash('error', 'فشلت عملية التحديث.');
            $this->emit('categoriesError', ['message' => 'فشلت عملية التحديث.']);
         }
      } catch (Exception $e) {
         session()->flash('error', 'حدث خطأ أثناء التحديث.');
         $this->emit('categoriesError', ['message' => $e->getMessage()]);
      }
   }
}
