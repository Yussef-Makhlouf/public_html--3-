<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Trans;

class City extends Model
{
   use HasFactory;
   use Trans;

   public function reservations()
   {
      return $this->hasMany(Reservation::class, 'reservation_id', 'id');
   }
   public function buys()
   {
      return $this->hasMany(Buy::class, 'buy_id', 'id');
   }
}
