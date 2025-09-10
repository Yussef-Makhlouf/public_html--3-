<?php

namespace App\Http\Livewire\Reviews;

use App\Models\Reviews;
use Livewire\Component;

class ReviewsIndex extends Component
{
   protected $listeners = ['refreshReviews' => '$refresh'];

   public function render()
   {
      $reviews = Reviews::all();
      return view('livewire.reviews.reviews-index', compact('reviews'));
   }
}
