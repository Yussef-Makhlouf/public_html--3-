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
      Schema::create('reservations', function (Blueprint $table) {
         $table->id();
         $table->string('name');
         $table->string('mobile');
         $table->string('email');
         $table->date('date');
         $table->string('area');
         $table->string('street');
         $table->unsignedBigInteger('service_id');
         $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
         $table->unsignedBigInteger('city_id');
         $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
         $table->text('message');
         $table->enum('hall', ['indoor', 'outdoor']);
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
      Schema::dropIfExists('reservations');
   }
};
