<?php

namespace App\Http\Livewire\Pdfs;

use App\Models\Pdf;
use Exception;
use Livewire\Component;
use Livewire\WithFileUploads;

class PdfsCreate extends Component
{
   use WithFileUploads;

   public $file;
   public $lang;
   public $icon;

   public function render()
   {
      return view('livewire.pdfs.pdfs-create');
   }
   public function save()
   {
      $validatedData = $this->validate([
         'file' => 'required',
         'icon' => 'required',
         'lang' => 'required',
      ], [
         'file.required' => 'file مطلوب',
         'icon.required' => 'icon مطلوب',
         'lang.required' => 'lang مطلوب',
      ]);
      try {
         $pdf = new Pdf();
         $pdf->lang = $this->lang;
         $iconName = time() . 'image.' . $this->icon->getClientOriginalExtension();
         $this->icon->storeAs('public/icons/pdfs', $iconName);
         $pdf->icon = $iconName;
         $fileName = time() . 'pdf.' . $this->file->getClientOriginalExtension();
         $this->file->storeAs('public/files/pdfs', $fileName);
         $pdf->file = $fileName;
         $isSaved = $pdf->save();

         if ($isSaved) {
            session()->flash('message', 'تمت الإضافة بنجاح.');
            $this->emit('PdfAdded', ['message' => 'تمت الإضافة بنجاح']);
         } else {
            session()->flash('error', 'فشلت عملية التخزين.');
            $this->emit('PdfError', ['message' => 'فشلت عملية التخزين']);
         }
      } catch (Exception $e) {
         $this->emit('PdfError', ['message' => $e->getMessage()]);
      }
   }
}
