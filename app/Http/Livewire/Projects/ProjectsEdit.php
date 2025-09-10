<?php

namespace App\Http\Livewire\Projects;

use App\Models\Project;
use App\Models\Service;
use Exception;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProjectsEdit extends Component
{
   use WithFileUploads;

   public $project;
   public $titleEn;
   public $titleAr;
   public $descriptionEn;
   public $descriptionAr;
   public $main_image;
   public $sub_images;
   public $service_id;
   public $client;
   public $date;

   protected $rules = [
      'titleEn' => 'required|string|min:3',
      'titleAr' => 'required|string|min:3',
      'descriptionEn' => 'required|string|min:5',
      'descriptionAr' => 'required|string|min:5',
      'main_image' => 'required|image|max:500',
      'sub_images.*' => 'required|image|max:500',
      'service_id' => 'required',
      'client' => 'nullable',
      'date' => 'nullable',
   ];

   public function mount(Project $project)
   {
      $this->project = $project;
      $this->titleEn = $project->titleEn;
      $this->titleAr = $project->titleAr;
      $this->descriptionEn = $project->descriptionEn;
      $this->descriptionAr = $project->descriptionAr;
      $this->service_id = $project->service_id;
      $this->service_id = $project->service_id;
      $this->service_id = $project->service_id;
   }

   public function render()
   {
      $services = Service::all();

      return view('livewire.projects.projects-edit', ['project' => $this->project, 'services' => $services]);
   }

   public function update()
   {
      try {
         $this->validate();

         $project = Project::findOrFail($this->project->id);
         $project->title = json_encode(['en' => $this->titleEn, 'ar' => $this->titleAr]);
         $project->description = json_encode(['en' => $this->descriptionEn, 'ar' => $this->descriptionAr]);
         $project->service_id = $this->service_id;
         $project->client = $this->client;
         $project->date = $this->date;

         if ($this->main_image) {
            if ($project->main_image) {
               Storage::delete('public/images/projects/' . $project->main_image);
            }

            $mainImageName = time() . 'main_image.' . $this->main_image->getClientOriginalExtension();
            $this->main_image->storeAs('public/images/projects', $mainImageName);
            $project->main_image = $mainImageName;
         }

         if ($this->sub_images) {
            $oldSubImages = json_decode($project->sub_images);

            foreach ($oldSubImages as $oldSubImage) {
               Storage::delete('public/images/projects/sub_images/' . $oldSubImage);
            }
            $tempSubImages = [];

            foreach ($this->sub_images as $file) {
               $subImageName = time() . 'image.' . rand(1, 560) .  $file->getClientOriginalExtension();
               $file->storeAs('public/images/projects/sub_images', $subImageName);
               $tempSubImages[] = $subImageName;
            }

            $this->sub_images = $tempSubImages;
            $subImages = array_filter($this->sub_images, function ($image) {
               return !str_ends_with($image, '.tmp');
            });

            $subImages = array_map(function ($image) {
               return basename($image);
            }, $subImages);

            $project->sub_images = json_encode($subImages);
         }

         $isSaved = $project->save();

         if ($isSaved) {
            session()->flash('message', 'تم تحديث الخدمة بنجاح.');
            return redirect()->route('projects.index');
         } else {
            session()->flash('error', 'فشلت عملية التحديث.');
            $this->emit('projectError', ['message' => 'فشلت عملية التحديث.']);
         }
      } catch (Exception $e) {
         session()->flash('error', 'حدث خطأ أثناء التحديث.');
         $this->emit('projectError', ['message' => $e->getMessage()]);
      }
   }
}
