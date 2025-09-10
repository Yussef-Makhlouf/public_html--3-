<?php

namespace App\Http\Livewire\OurClients;

use App\Models\OurClient;
use Exception;
use Livewire\Component;
use Livewire\WithFileUploads;

class OurClientsCreate extends Component
{
   use WithFileUploads;

   public $image;

   public function render()
   {
      return view('livewire.our-clients.our-clients-create');
   }
   public function saveOurClient()
   {
      $validatedData = $this->validate([
         'image' => 'required|image',
      ], [
         'image.required' => 'الصورة مطلوبة',
      ]);

      try {
         $ourClient = new OurClient();
         $image_name = time() . 'image.' . $this->image->getClientOriginalExtension();
         $this->image->storeAs('public/images/ourClient', $image_name);
         $ourClient->image = $image_name;


         $isSaved = $ourClient->save();

         if ($isSaved) {
            session()->flash('message', 'تمت الإضافة بنجاح.');
            $this->emit('ClientAdded', ['message' => 'تمت الإضافة بنجاح']);
         } else {
            session()->flash('error', 'فشلت عملية التخزين.');
            $this->emit('ClientError', ['message' => 'فشلت عملية التخزين']);
         }
      } catch (Exception $e) {
         $this->emit('ClientError', ['message' => $e->getMessage()]);
      }
   }
}
