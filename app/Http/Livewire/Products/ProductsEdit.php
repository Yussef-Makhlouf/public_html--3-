<?php

namespace App\Http\Livewire\Products;

use App\Models\Category;
use App\Models\Product;
use Exception;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProductsEdit extends Component
{
   use WithFileUploads;

   public $product;
   public $nameEn;
   public $nameAr;
   public $descreptionEn;
   public $descreptionAr;
   public $image;

   protected $rules = [
      'nameEn' => 'required|string|min:3|max:40',
      'nameAr' => 'required|string|min:3|max:40',
      'descreptionEn' => 'required|string|min:5',
      'descreptionAr' => 'required|string|min:5',
      'image' => 'nullable|image|max:1024',
   ];

   public function mount(Product $product)
   {
      $this->product = $product;
      $this->nameEn = $product->nameEn;
      $this->nameAr = $product->nameAr;
      $this->descreptionEn = $product->descreptionEn;
      $this->descreptionAr = $product->descreptionAr;
   }

   public function render()
   {
      $categories = Category::all();
      return view('livewire.products.products-edit', ['product' => $this->product, 'categories' => $categories]);
   }


   public function update()
   {
      try {
         $this->validate();

         $product = Product::findOrFail($this->product->id);
         $product->name = json_encode(['en' => $this->nameEn, 'ar' => $this->nameAr]);
         $product->descreption = json_encode(['en' => $this->descreptionEn, 'ar' => $this->descreptionAr]);

         if ($this->image) {
            if ($product->image) {
               Storage::delete('public/images/product/' . $product->image);
            }

            $imageName = time() . 'image.' . $this->image->getClientOriginalExtension();
            $this->image->storeAs('public/images/product', $imageName);
            $product->image = $imageName;
         }
         $isSaved = $product->save();

         if ($isSaved) {
            session()->flash('message', 'تم تحديث المنتج بنجاح.');
            return redirect()->route('products.index');
         } else {
            session()->flash('error', 'فشلت عملية التحديث.');
            $this->emit('productError', ['message' => 'فشلت عملية التحديث.']);
         }
      } catch (Exception $e) {
         session()->flash('error', 'حدث خطأ أثناء التحديث.');
         $this->emit('productError', ['message' => $e->getMessage()]);
      }
   }
}
