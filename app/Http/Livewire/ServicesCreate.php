<?php

namespace App\Http\Livewire;

use App\Models\Service;
use Exception;
use Livewire\Component;
use Livewire\WithFileUploads;

class ServicesCreate extends Component
{
   use WithFileUploads;

   public $titleEn;
   public $titleAr;
   public $descriptionEn;
   public $descriptionAr;
   public $main_image;
   public $sub_images = [];
   public $video;
   public $videoType;
   public $youtubeLink;

   public function render()
   {
      return view('livewire.services-create');
   }

   public function saveService()
   {
      $videoPath = null;

      $validatedData = $this->validate([
         'titleEn' => 'required|string|min:3',
         'titleAr' => 'required|string|min:3',
         'descriptionEn' => 'required|string|min:3',
         'descriptionAr' => 'required|string|min:3',
         'main_image' => 'required|image',
         'sub_images.*' => 'image',
         'video' => 'nullable',
         'youtubeLink' => 'nullable',
         'videoType' => 'nullable',
      ], [
         'titleEn.required' => 'الاسم بالإنجليزية مطلوب',
         'titleAr.required' => 'الاسم بالعربية مطلوب',
         'titleEn.min' => 'لا يقبل أقل من 3 حروف',
         'titleEn.max' => 'لا يقبل أكثر من 20 حروف',
      ]);

      try {
         $youtubeVideoId = null;
         $service = new Service();
         $service->title = json_encode(['en' => $validatedData['titleEn'], 'ar' => $validatedData['titleAr']]);
         $service->description = json_encode(['en' => $validatedData['descriptionEn'], 'ar' => $validatedData['descriptionAr']]);
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
               $this->video->storeAs('public/videos/service', $videoName);
               $videoPath = $videoName;
               $service->video = $videoPath;
            }
         }

         if ($this->main_image) {
            $mainImageName = time() . '.' . $this->main_image->getClientOriginalExtension();
            $this->main_image->storeAs('public/images/service', $mainImageName);
            $this->main_image = $mainImageName;
         }

         if ($this->sub_images) {
            $tempSubImages = [];

            foreach ($this->sub_images as $file) {
               $subImageName = time() . rand(1, 560) . '.' . $file->getClientOriginalExtension();
               $file->storeAs('public/images/sub_images_service', $subImageName);
               $tempSubImages[] = $subImageName;
            }
            $this->sub_images = $tempSubImages;
         }
         $subImages = array_filter($this->sub_images, function ($image) {
            return !str_ends_with($image, '.tmp');
         });

         $subImages = array_map(function ($image) {
            return basename($image);
         }, $subImages);

         $service->main_image = $this->main_image;
         $service->sub_images = json_encode($subImages);
         $isSaved = $service->save();

         if ($isSaved) {
            session()->flash('message', 'تمت الإضافة بنجاح.');
            $this->emit('serviceAdded', ['message' => 'تمت الإضافة بنجاح']);
         } else {
            session()->flash('error', 'فشلت عملية التخزين.');
            $this->emit('serviceError', ['message' => 'فشلت عملية التخزين']);
         }
      } catch (Exception $e) {
         $this->dispatchBrowserEvent('serviceError', ['message' => $e->getMessage()]);
      }
   }
}
