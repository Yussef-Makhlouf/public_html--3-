<?php

namespace App\Http\Livewire\Categories;

use App\Models\Category;
use App\Traits\Trans;
use Livewire\Component;

class CategoriesIndex extends Component
{

   protected $listeners = ['refreshCategories' => '$refresh'];

   public function render()
   {
      $categories = Category::all();
      return view('livewire.categories.categories-index', compact('categories'));
   }
}
