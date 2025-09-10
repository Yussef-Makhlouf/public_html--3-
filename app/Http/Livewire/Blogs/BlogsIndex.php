<?php

namespace App\Http\Livewire\Blogs;

use App\Models\Blogs;
use Livewire\Component;

class BlogsIndex extends Component
{
   protected $listeners = ['refreshBlogs' => '$refresh'];

   public function render()
   {
      $blogs = Blogs::all();
      return view('livewire.blogs.blogs-index', compact('blogs'));
   }
}
