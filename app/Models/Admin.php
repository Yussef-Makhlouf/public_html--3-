<?php

namespace App\Models;

use App\Traits\Trans;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

class Admin extends Authenticatable
{
   use HasFactory;
   use Trans;
   
   protected $fillable = [
      'email',
      'password',
      'remember_token',
   ];
   
   protected $hidden = [
      'password',
      'remember_token',
   ];
   
   protected $casts = [
      'email_verified_at' => 'datetime',
   ];
   
   
   public function user()
   {
      return $this->morphOne(User::class, 'userable');
   }
}
