<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Trans;

class Reservation extends Model
{
   use HasFactory;
   use Trans;

   public function service()
   {
      return $this->belongsTo(Service::class, 'service_id', 'id');
   }

   public function city()
   {
      return $this->belongsTo(City::class, 'city_id', 'id');
   }
}
