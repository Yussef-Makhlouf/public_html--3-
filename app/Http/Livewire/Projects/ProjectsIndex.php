<?php

namespace App\Http\Livewire\Projects;

use App\Models\Project;
use Livewire\Component;

class ProjectsIndex extends Component
{
   protected $listeners = ['refreshProjects' => '$refresh'];

   public function render()
   {
      $projects = Project::all();
      return view('livewire.projects.projects-index', compact('projects'));
   }
}
