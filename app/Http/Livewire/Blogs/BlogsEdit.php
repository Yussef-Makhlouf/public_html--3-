<?php

namespace App\Http\Livewire\Blogs;

use App\Models\Blogs;
use Exception;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class BlogsEdit extends Component
{
   use WithFileUploads;

   public $blog;
   public $nameEn;
   public $nameAr;
   public $authorEn;
   public $authorAr;
   public $contentEn;
   public $contentAr;
   public $date;
   public $image;

   protected $rules = [
      'nameEn' => 'required|string|min:3',
      'nameAr' => 'required|string|min:3',
      'authorEn' => 'required|string|min:3',
      'authorAr' => 'required|string|min:3',
      'contentEn' => 'required|string|min:3',
      'contentAr' => 'required|string|min:3',
      'date' => 'required|string|min:3',
   ];

   public function mount(Blogs $blog)
   {
      $this->blog = $blog;
      $this->nameEn = $blog->nameEn;
      $this->nameAr = $blog->nameAr;
      $this->authorEn = $blog->authorEn;
      $this->authorAr = $blog->authorAr;
      $this->contentEn = $blog->contentEn;
      $this->contentAr = $blog->contentAr;
      $this->date = $blog->date;
   }

   public function render()
   {
      return view('livewire.blogs.blogs-edit', ['blog' => $this->blog]);
   }


   public function update()
   {
      try {
         $this->validate();

         $blog = Blogs::findOrFail($this->blog->id);
         $blog->name = json_encode(['en' => $this->nameEn, 'ar' => $this->nameAr]);
         $blog->author = json_encode(['en' => $this->authorEn, 'ar' => $this->authorAr]);
         $blog->content = json_encode(['en' => $this->contentEn, 'ar' => $this->contentAr]);
         $blog->date = $this->date;

         if ($this->image) {
            if ($blog->image) {
               Storage::delete('public/images/blog/' . $blog->image);
            }

            $imageName = time() . 'image.' . $this->image->getClientOriginalExtension();
            $this->image->storeAs('public/images/blog', $imageName);
            $blog->image = $imageName;
         }
         $isSaved = $blog->save();

         if ($isSaved) {
            session()->flash('message', 'تم تحديث المنتج بنجاح.');
            return redirect()->route('blogs.index');
         } else {
            session()->flash('error', 'فشلت عملية التحديث.');
            $this->emit('BlogError', ['message' => 'فشلت عملية التحديث.']);
         }
      } catch (Exception $e) {
         session()->flash('error', 'حدث خطأ أثناء التحديث.');
         $this->emit('BlogError', ['message' => $e->getMessage()]);
      }
   }
}
