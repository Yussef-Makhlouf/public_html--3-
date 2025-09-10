<?php

namespace App\Http\Livewire\Contacts;

use App\Models\Contact;
use Livewire\Component;

class ContactsIndex extends Component
{
   protected $listeners = ['refreshContacts' => '$refresh'];

   public function render()
   {
      $contacts = Contact::all();
      return view('livewire.contacts.contacts-index', compact('contacts'));
   }
}
