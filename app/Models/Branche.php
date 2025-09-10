<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Trans;

class Branche extends Model
{
   use HasFactory;
   use Trans;

   public function buys()
   {
      return $this->hasMany(Buy::class, 'buy_id', 'id');
   }
}
