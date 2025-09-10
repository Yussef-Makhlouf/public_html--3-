<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
      Schema::create('projects', function (Blueprint $table) {
         $table->id();
         $table->json('title');
         $table->json('description');
         $table->string('main_image');
         $table->unsignedBigInteger('service_id');
         $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
         $table->json('sub_images')->nullable();
         $table->timestamps();
      });
   }

   /**
    * Reverse the migrations.
    *
    * @return void
    */
   public function down()
   {
      Schema::dropIfExists('projects');
   }
};
