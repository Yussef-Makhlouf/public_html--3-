<?php

namespace App\Http\Livewire\Pdfs;

use App\Models\Pdf;
use Exception;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class PdfsEdit extends Component
{
   use WithFileUploads;

   public $pdf;
   public $file;
   public $lang;
   public $icon;

   protected $rules = [
      'file' => 'nullable|max:6024',
   ];

   public function mount(Pdf $pdf)
   {
      $this->pdf = $pdf;
      $this->file = $pdf->file;
      $this->lang = $pdf->lang;
   }

   public function render()
   {
      return view('livewire.pdfs.pdfs-edit', ['pdf' => $this->pdf]);
   }


   public function update()
   {

      try {
         $this->validate();

         $pdf = Pdf::findOrFail($this->pdf->id);
         $pdf->lang = $this->lang;
         if ($this->icon) {
            if ($pdf->icon) {
               Storage::delete('public/icons/pdfs/' . $pdf->icon);
            }

            $iconName = time() . 'image.' . $this->icon->getClientOriginalExtension();
            $this->icon->storeAs('public/icons/pdfs', $iconName);
            $pdf->icon = $iconName;
         }
         if ($this->file) {
            if ($this->file->getClientOriginalExtension() === 'pdf') {
               Storage::delete('public/files/pdfs/' . $pdf->file);
               $fileName = time() . $this->file->getClientOriginalExtension();
               $this->file->storeAs('public/files/pdfs', $fileName);
               $pdf->file = $fileName;
            } else {
               return $this->emit('pdfsError', ['message' => 'تأكد من صيغة الملف.']);
            }
         }
         $isSaved = $pdf->save();

         if ($isSaved) {
            session()->flash('message', 'تم تحديث المنتج بنجاح.');
            return redirect()->route('pdfs.index');
         } else {
            session()->flash('error', 'فشلت عملية التحديث.');
            $this->emit('pdfsError', ['message' => 'فشلت عملية التحديث.']);
         }
      } catch (Exception $e) {
         session()->flash('error', 'حدث خطأ أثناء التحديث.');
         $this->emit('pdfsError', ['message' => $e->getMessage()]);
      }
   }
}
