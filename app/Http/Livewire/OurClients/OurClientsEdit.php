<?php

namespace App\Http\Livewire\OurClients;

use App\Models\OurClient;
use Exception;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class OurClientsEdit extends Component
{
   use WithFileUploads;

   public $ourClient;
   public $image;

   protected $rules = [
      'image' => 'nullable|image|max:1024',
   ];

   public function mount(OurClient $ourClient)
   {
      $this->ourClient = $ourClient;
   }

   public function render()
   {
      return view('livewire.our-clients.our-clients-edit', ['ourClient' => $this->ourClient]);
   }


   public function update()
   {
      try {
         $this->validate();

         $ourClient = OurClient::findOrFail($this->ourClient->id);

         if ($this->image) {
            if ($ourClient->image) {
               Storage::delete('public/images/ourClient/' . $ourClient->image);
            }

            $imageName = time() . 'image.' . $this->image->getClientOriginalExtension();
            $this->image->storeAs('public/images/ourClient', $imageName);
            $ourClient->image = $imageName;
         }
         $isSaved = $ourClient->save();

         if ($isSaved) {
            session()->flash('message', 'تم تحديث المنتج بنجاح.');
            return redirect()->route('our-clients.index');
         } else {
            session()->flash('error', 'فشلت عملية التحديث.');
            $this->emit('ourClientError', ['message' => 'فشلت عملية التحديث.']);
         }
      } catch (Exception $e) {
         session()->flash('error', 'حدث خطأ أثناء التحديث.');
         $this->emit('ourClientError', ['message' => $e->getMessage()]);
      }
   }
}
