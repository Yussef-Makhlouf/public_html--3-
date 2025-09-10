<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Trans;

class Service extends Model
{
   use HasFactory;
   use Trans;

   public function contacts()
   {
      return $this->hasMany(Contact::class, 'contact_id', 'id');
   }

   public function projects()
   {
      return $this->hasMany(Project::class, 'id', 'id');
   }

   public function buys()
   {
      return $this->hasMany(Buy::class, 'buy_id', 'id');
   }

   public function reservations()
   {
      return $this->hasMany(Reservation::class, 'reservation_id', 'id');
   }
}
