<?php

namespace App\Http\Livewire\Branches;

use App\Models\Branche;
use Livewire\Component;

class BranchesIndex extends Component
{
   protected $listeners = ['refreshBranches' => '$refresh'];

   public function render()
   {
      $branches = Branche::all();
      return view('livewire.branches.branches-index', compact('branches'));
   }
}
