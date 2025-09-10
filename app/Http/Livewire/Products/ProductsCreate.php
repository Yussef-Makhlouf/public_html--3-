<?php

namespace App\Http\Livewire\Products;

use App\Models\Category;
use App\Models\Product;
use Exception;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProductsCreate extends Component
{
   use WithFileUploads;

   public $nameEn;
   public $nameAr;
   public $descreptionEn;
   public $descreptionAr;
   public $image;
   public $category_id;

   public function render()
   {
      $categories = Category::all();
      return view('livewire.products.products-create', compact('categories'));
   }

   public function save()
   {
      $validatedData = $this->validate([
         'nameEn' => 'required|string|min:3',
         'nameAr' => 'required|string|min:3',
         'descreptionEn' => 'required|string|min:3',
         'descreptionAr' => 'required|string|min:3',
         'image' => 'required|image',
         'category_id' => 'required',
      ], [
         'nameEn.required' => 'اسم المنتج (بالإنجليزية) مطلوب',
         'nameAr.required' => 'اسم المنتج (بالعربية) مطلوب',
         'descreptionEn.required' => 'وصف المنتج (بالإنجليزية) مطلوب',
         'descreptionAr.required' => 'وصف المنتج (بالعربية) مطلوب',
         'image.required' => 'الصورة مطلوبة',
         'category_id.required' => 'الفئة مطلوبة',
         'nameEn.min' => 'لا يقبل أقل من 3 حروف (بالإنجليزية)',
         'nameEn.max' => 'لا يقبل أكثر من 20 حرفًا (بالإنجليزية)',
         'nameAr.min' => 'لا يقبل أقل من 3 حروف (بالعربية)',
         'nameAr.max' => 'لا يقبل أكثر من 20 حرفًا (بالعربية)',
      ]);

      try {
         $product = new Product();
         $product->name = json_encode(['en' => $validatedData['nameEn'], 'ar' => $validatedData['nameAr']]);
         $product->descreption = json_encode(['en' => $validatedData['descreptionEn'], 'ar' => $validatedData['descreptionAr']]);

         if ($this->image) {
            $image_name = time() . 'image.' . $this->image->getClientOriginalExtension();
            $this->image->storeAs('public/images/product', $image_name);
            $product->image = $image_name;
         }

         $product->category_id = $this->category_id;

         $isSaved = $product->save();

         if ($isSaved) {
            session()->flash('message', 'تمت الإضافة بنجاح.');
            $this->emit('productAdded', ['message' => 'تمت الإضافة بنجاح']);
         } else {
            session()->flash('error', 'فشلت عملية التخزين.');
            $this->emit('productError', ['message' => 'فشلت عملية التخزين']);
         }
      } catch (Exception $e) {
         $this->dispatchBrowserEvent('productError', ['message' => $e->getMessage()]);
      }
   }
}
