<?php

namespace App\Http\Livewire\Contacts;

use App\Models\Contact;
use App\Models\Service;
use Exception;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class ContactsEdit extends Component
{
   use WithFileUploads;

   public $contact;
   public $name;
   public $message;
   public $mobile;
   public $email;
   public $service_id;

   protected $rules = [
      'name' => 'required|string|min:3',
      'message' => 'required|string|min:3',
      'mobile' => 'required|min:10',
      'email' => 'required|email',
      'service_id' => 'required',
   ];

   public function mount(contact $contact)
   {
      $this->contact = $contact;
      $this->name = $contact->name;
      $this->message = $contact->message;
      $this->mobile = $contact->mobile;
      $this->email = $contact->email;
      $this->service_id = $contact->service_id;
   }

   public function render()
   {
      $services = Service::all();
      return view('livewire.contacts.contacts-edit', ['contact' => $this->contact, 'services' => $services]);
   }


   public function update()
   {
      try {
         $this->validate();

         $contact = Contact::findOrFail($this->contact->id);
         $contact->name = $this->name;
         $contact->message = $this->message;
         $contact->mobile = $this->mobile;
         $contact->email = $this->email;
         $contact->service_id = $this->service_id;
         $isSaved = $contact->save();

         if ($isSaved) {
            session()->flash('message', 'تم تحديث المنتج بنجاح.');
            return redirect()->route('contacts.index');
         } else {
            session()->flash('error', 'فشلت عملية التحديث.');
            $this->emit('contactError', ['message' => 'فشلت عملية التحديث.']);
         }
      } catch (Exception $e) {
         session()->flash('error', 'حدث خطأ أثناء التحديث.');
         $this->emit('contactError', ['message' => $e->getMessage()]);
      }
   }
}
