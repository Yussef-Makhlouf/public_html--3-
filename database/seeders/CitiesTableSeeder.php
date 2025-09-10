<?php

namespace Database\Seeders;

use Faker\Core\File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitiesTableSeeder extends Seeder
{
   /**
    * Run the database seeds.
    *
    * @return void
    */
   public function run()
   {
      // قراءة ملف البيانات
      $json = file_get_contents(database_path('cities.json'));

      // تحويل المحتوى إلى صيغة مصفوفة
      $cities = json_decode($json, true);

      // حفظ المدن في قاعدة البيانات
      foreach ($cities as $city) {
         DB::table('cities')->insert([
            'name' => $city['name_ar'],
         ]);
      }
   }
}
