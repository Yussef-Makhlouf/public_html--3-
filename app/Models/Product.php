<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Trans;

class Product extends Model
{
   use HasFactory;
   use Trans;


   public function category()
   {
      return $this->belongsTo(Category::class, 'category_id', 'id');
   }
   public function buys()
   {
      return $this->hasMany(Buy::class, 'buy_id', 'id');
   }
}
