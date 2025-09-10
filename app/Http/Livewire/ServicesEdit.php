<?php

namespace App\Http\Livewire;

use App\Models\Service;
use Exception;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class ServicesEdit extends Component
{
   use WithFileUploads;

   public $service;
   public $titleEn;
   public $titleAr;
   public $descriptionEn;
   public $descriptionAr;
   public $main_image;
   public $sub_images;
   public $video;
   public $videoType;
   public $youtubeLink;

   protected $rules = [
      'titleEn' => 'required|string|min:3',
      'titleAr' => 'required|string|min:3',
      'descriptionEn' => 'required|string|min:5',
      'descriptionAr' => 'required|string|min:5',
      'main_image' => 'nullable|image|max:8024',
      'sub_images.*' => 'nullable|image|max:8024',
      'video' => 'nullable|mimes:mp4',
   ];

   public function mount(Service $service)
   {
      $this->service = $service;
      $this->titleEn = $service->titleEn;
      $this->titleAr = $service->titleAr;
      $this->descriptionEn = $service->descriptionEn;
      $this->descriptionAr = $service->descriptionAr;
      $this->videoType = $service->videoType;
      $this->youtubeLink = $service->youtubeLink;
   }

   public function render()
   {
      return view('livewire.services-edit', ['service' => $this->service]);
   }

   public function update()
   {
      try {
         $this->validate();

         $service = Service::findOrFail($this->service->id);
         $service->title = json_encode(['en' => $this->titleEn, 'ar' => $this->titleAr]);
         $service->description = json_encode(['en' => $this->descriptionEn, 'ar' => $this->descriptionAr]);

         if ($this->main_image) {
            if ($service->main_image) {
               Storage::delete('public/images/service/' . $service->main_image);
            }

            $mainImageName = time() . 'main_image.' . $this->main_image->getClientOriginalExtension();
            $this->main_image->storeAs('public/images/service', $mainImageName);
            $service->main_image = $mainImageName;
         }

         if ($this->sub_images) {
            $oldSubImages = json_decode($service->sub_images);

            foreach ($oldSubImages as $oldSubImage) {
               Storage::delete('public/images/sub_images_service/' . $oldSubImage);
            }
            $tempSubImages = [];

            foreach ($this->sub_images as $file) {
               $subImageName = time() . 'image.' . rand(1, 560) .  $file->getClientOriginalExtension();
               $file->storeAs('public/images/sub_images_service', $subImageName);
               $tempSubImages[] = $subImageName;
            }

            $this->sub_images = $tempSubImages;
            $subImages = array_filter($this->sub_images, function ($image) {
               return !str_ends_with($image, '.tmp');
            });

            $subImages = array_map(function ($image) {
               return basename($image);
            }, $subImages);
            $service->sub_images = json_encode($subImages);
         }


         if ($this->videoType === 'youtube') {
            $parsedUrl = parse_url($this->youtubeLink);
            parse_str($parsedUrl['query'], $queryParams);
            $youtubeVideoId = $queryParams['v'];
            $service->youtubeLink =  $this->youtubeLink;
            $service->video = $youtubeVideoId;
            $service->videoType = $this->videoType;
         } elseif ($this->videoType === 'upload') {
            $service->videoType = $this->videoType;

            if ($this->video) {
               $videoName = time() . '.' . $this->video->getClientOriginalExtension();
               $this->video->storeAs('public/storage/videos/service', $videoName);
               $videoPath = $videoName;
               $service->video = $videoPath;
            }
         }

         $isSaved = $service->save();

         if ($isSaved) {
            session()->flash('message', 'تم تحديث الخدمة بنجاح.');
            return redirect()->route('services.index');
         } else {
            session()->flash('error', 'فشلت عملية التحديث.');
            $this->emit('serviceError', ['message' => 'فشلت عملية التحديث.']);
         }
      } catch (Exception $e) {
         session()->flash('error', 'حدث خطأ أثناء التحديث.');
         $this->emit('serviceError', ['message' => $e->getMessage()]);
      }
   }
}
