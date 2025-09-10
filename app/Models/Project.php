<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Trans;

class Project extends Model
{
   use Trans;
   use HasFactory;

   public function service()
   {
      return $this->belongsTo(Service::class, 'service_id', 'id');
   }
}
