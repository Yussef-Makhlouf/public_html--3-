<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
   /**
    * Run the database seeds.
    *
    * @return void
    */
   public function run()
   {
      $admin = new Admin();
      $admin->email = 'powerfull@ksa.com';
      $admin->password = Hash::make('password');
      $admin->save();
      $user = new User();
      $user->name = 'amr';
      $user->mobile = '0598241105';
      $user->address = 'senaa';
      $user->city = 'gaza';
      $user->status = 'single';
      $user->birthday = '26-06-2000';
      $user->gender = 'male';
      $user->userable()->associate($admin);
      $user->save();
   }
}
