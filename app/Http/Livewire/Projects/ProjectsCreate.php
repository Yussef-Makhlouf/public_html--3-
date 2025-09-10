<?php

namespace App\Http\Livewire\Projects;

use Exception;
use App\Models\Product;
use App\Models\Project;
use App\Models\Service;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProjectsCreate extends Component
{
   use WithFileUploads;

   public $titleEn;
   public $titleAr;
   public $descriptionEn;
   public $descriptionAr;
   public $main_image;
   public $sub_images = [];
   public $service_id;
   public $client;
   public $date;


   public function render()
   {
      $services = Service::all();
      return view('livewire.projects.projects-create', compact('services'));
   }

   public function save()
   {

      $validatedData = $this->validate([
         'titleEn' => 'required|string|min:3',
         'titleAr' => 'required|string|min:3',
         'descriptionEn' => 'required|string|min:3',
         'descriptionAr' => 'required|string|min:3',
         'main_image' => 'required|image|max:5120', // 5MB max
         'sub_images.*' => 'image|max:5120', // 5MB max per image
         'service_id' => 'required',
         'client' => 'nullable',
         'date' => 'nullable',
      ], [
         'titleEn.required' => 'العنوان مطلوب',
         'service_id.required' => 'service_id مطلوبة',
         'titleEn.min' => 'لا يقبل أقل من 3 حروف',
         'titleEn.max' => 'لا يقبل أكثر من 30 حرفًا',
         'titleAr.required' => 'العنوان مطلوب',
         'titleAr.min' => 'لا يقبل أقل من 3 حروف',
         'titleAr.max' => 'لا يقبل أكثر من 30 حرفًا',
         'descriptionEn.required' => 'الوصف مطلوب',
         'descriptionEn.min' => 'لا يقبل أقل من 3 حروف',
         'descriptionAr.required' => 'الوصف مطلوب',
         'descriptionAr.min' => 'لا يقبل أقل من 3 حروف',
         'main_image.required' => 'الصورة الرئيسية مطلوبة',
         'main_image.image' => 'يجب أن تكون الصورة الرئيسية صورة',
         'main_image.max' => 'حجم الصورة الرئيسية يجب أن يكون أقل من 5 ميجابايت',
         'sub_images.*.image' => 'يجب أن تكون الصور الفرعية صورًا',
         'sub_images.*.max' => 'حجم الصور الفرعية يجب أن يكون أقل من 5 ميجابايت',
      ]);
      $project = new Project();
      $project->title = json_encode(['en' => $validatedData['titleEn'], 'ar' => $validatedData['titleAr']]);
      $project->description = json_encode(['en' => $validatedData['descriptionEn'], 'ar' => $validatedData['descriptionAr']]);
      $project->service_id = $validatedData['service_id'];
      $project->client = $validatedData['client'];
      $project->date = $validatedData['date'];

      if ($this->main_image) {
         $extension = $this->main_image->getClientOriginalExtension();
         $mainImageName = time() . '_main.' . $extension;
         $this->main_image->storeAs('public/images/projects', $mainImageName);
         $project->main_image = $mainImageName;
      }

      if ($this->sub_images) {
         $tempSubImages = [];

         foreach ($this->sub_images as $file) {
            $extension = $file->getClientOriginalExtension();
            $subImageName = time() . '_sub_' . rand(1, 999) . '.' . $extension;
            $file->storeAs('public/images/projects/sub_images', $subImageName);
            $tempSubImages[] = $subImageName;
         }

         $project->sub_images = json_encode($tempSubImages);
      }
      $isSaved = $project->save();

      if ($isSaved) {
         session()->flash('message', 'تمت الإضافة بنجاح.');
         $this->emit('ProjectAdded', ['message' => 'تمت الإضافة بنجاح']);
      } else {
         session()->flash('error', 'فشلت عملية التخزين.');
         $this->emit('ProjectError', ['message' => 'فشلت عملية التخزين']);
      }
   }
}
