<?php

namespace App\Http\Livewire\Categories;

use App\Models\Category;
use App\Traits\Trans;
use Exception;
use Livewire\Component;
use Livewire\WithFileUploads;

class CategoriesCreate extends Component
{
   use WithFileUploads;

   public $nameEn;
   public $nameAr;
   public $descriptionEn;
   public $descriptionAr;
   public $image;

   public function render()
   {
      return view('livewire.categories.categories-create');
   }

   public function save()
   {
      $validatedData = $this->validate([
         'nameEn' => 'required|string|min:3|max:50',
         'nameAr' => 'required|string|min:3|max:50',
         'descriptionAr' => 'required|string|min:3',
         'descriptionEn' => 'required|string|min:3',
         'image' => 'required|image',
      ], []);

      try {
         $category = new Category();
         $category->name = json_encode(['en' => $validatedData['nameEn'], 'ar' => $validatedData['nameAr']]);
         $category->description = json_encode(['en' => $validatedData['descriptionEn'], 'ar' => $validatedData['descriptionAr']]);
         if ($this->image) {
            $image_name = time() . 'image.' . $this->image->getClientOriginalName();
            $this->image->storeAs('public/images/category', $image_name);
            $category->image = $image_name;
         }


         $isSaved = $category->save();

         if ($isSaved) {
            session()->flash('message', 'تمت الإضافة بنجاح.');
            $this->emit('CategoryAdded', ['message' => 'تمت الإضافة بنجاح']);
         } else {
            session()->flash('error', 'فشلت عملية التخزين.');
            $this->emit('CategoryError', ['message' => 'فشلت عملية التخزين']);
         }
      } catch (Exception $e) {
         $this->emit('CategoryError', ['message' => $e->getMessage()]);
      }
   }
}
