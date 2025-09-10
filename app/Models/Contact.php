<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Trans;

class Contact extends Model
{
   use HasFactory;
   use Trans;

   public function service()
   {
      return $this->belongsTo(Service::class, 'service_id', 'id');
   }
}
