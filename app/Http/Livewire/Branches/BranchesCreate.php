<?php

namespace App\Http\Livewire\Branches;

use App\Models\Branche;
use Exception;
use Livewire\Component;

class BranchesCreate extends Component
{
   public $name;

   public function render()
   {
      $branches = Branche::all();
      return view('livewire.branches.branches-create', compact('branches'));
   }

   public function savebranches()
   {
      $validatedData = $this->validate([
         'name' => 'required|string|min:3',
      ], [
         'name.required' => 'الاسم مطلوب',
         'name.min' => 'لا يقبل أقل من 3 حروف',
      ]);

      try {
         $branches = new Branche();
         $branches->name = $validatedData['name'];
         $isSaved = $branches->save();

         if ($isSaved) {
            session()->flash('message', 'تمت الإضافة بنجاح.');
            $this->emit('branchesAdded', ['message' => 'تمت الإضافة بنجاح']);
         } else {
            session()->flash('error', 'فشلت عملية التخزين.');
            $this->emit('branchesError', ['message' => 'فشلت عملية التخزين']);
         }
      } catch (Exception $e) {
         $this->dispatchBrowserEvent('branchesError', ['message' => $e->getMessage()]);
      }
   }
}
