<?php

namespace App\Http\Livewire\Pdfs;

use App\Models\Pdf;
use Livewire\Component;

class PdfsIndex extends Component
{
   protected $listeners = ['refreshPdf' => '$refresh'];

   public function render()
   {
      $pdfs = Pdf::all();
      return view('livewire.pdfs.pdfs-index', compact('pdfs'));
   }
}
