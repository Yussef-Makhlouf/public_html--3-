<?php

namespace App\Http\Livewire\Products;

use App\Models\Product;
use Livewire\Component;

class ProductsIndex extends Component
{
   protected $listeners = ['refreshProducts' => '$refresh'];

   public function render()
   {
      $products = Product::all();
      return view('livewire.products.products-index', compact('products'));
   }
}
