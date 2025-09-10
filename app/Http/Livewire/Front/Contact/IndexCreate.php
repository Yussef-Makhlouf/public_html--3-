<?php

namespace App\Http\Livewire\Front\Contact;

use App\Models\Contact;
use App\Models\Service;
use Exception;
use Livewire\Component;

class IndexCreate extends Component
{

   public $name;
   public $message;
   public $mobile;
   public $email;
   public $service_id;

   public function render()
   {
      $services = Service::all();
      return view('livewire.front.contact.index-create', compact('services'));
   }
   public function saveContact()
   {

      $validatedData = $this->validate([
         'name' => 'required|string|min:3',
         'message' => 'required|string|min:3',
         'mobile' => 'required|min:10',
         'email' => 'required|email',
         'service_id' => 'required',
      ], [
         'name.required' => 'الاسم مطلوب',
         'message.required' => 'message مطلوب',
         'mobile.required' => 'mobile مطلوب',
         'email.required' => 'email مطلوب',
         'service_id.required' => 'service_id مطلوبة',
         'name.min' => 'لا يقبل أقل من 3 حروف',
         'name.max' => 'لا يقبل أكثر من 20 حرفًا',
      ]);
      try {
         $contact = new Contact();
         $contact->name = $validatedData['name'];
         $contact->message = $validatedData['message'];
         $contact->mobile = $validatedData['mobile'];
         $contact->email = $validatedData['email'];
         $contact->service_id = $validatedData['service_id'];

         $isSaved = $contact->save();

         if ($isSaved) {
            session()->flash('message', 'تمت الإضافة بنجاح.');
            $this->emit('ContactAdded', ['message' => 'تمت الإضافة بنجاح']);
         } else {
            session()->flash('error', 'فشلت عملية التخزين.');
            $this->emit('ContactError', ['message' => 'فشلت عملية التخزين']);
         }
      } catch (Exception $e) {
         $this->dispatchBrowserEvent('ContactError', ['message' => $e->getMessage()]);
      }
   }
}
