<?php

namespace App\Http\Livewire\Branches;

use App\Models\Branche;
use Exception;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class BranchesEdit extends Component
{
   public $branche;
   public $name;

   protected $rules = [
      'name' => 'required|string|min:3|max:20',
   ];

   public function mount(Branche $branche)
   {
      $this->branche = $branche;
      $this->name = $branche->name;
   }

   public function render()
   {
      $branche = $this->branche;
      return view('livewire.branches.branches-edit', compact('branche'));
   }


   public function update()
   {
      try {
         $this->validate();

         $branche = Branche::findOrFail($this->branche->id);
         $branche->name = $this->name;

         $isSaved = $branche->save();

         if ($isSaved) {
            session()->flash('message', 'تم تحديث المنتج بنجاح.');
            return redirect()->route('branches.index');
         } else {
            session()->flash('error', 'فشلت عملية التحديث.');
            $this->emit('brancheUpdated', ['message' => 'فشلت عملية التحديث.']);
         }
      } catch (Exception $e) {
         session()->flash('error', 'حدث خطأ أثناء التحديث.');
         $this->emit('brancheError', ['message' => $e->getMessage()]);
      }
   }
}
