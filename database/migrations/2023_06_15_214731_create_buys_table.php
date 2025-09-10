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
      Schema::create('buys', function (Blueprint $table) {
         $table->id();
         $table->string('name');
         $table->string('mobile');
         $table->string('email');
         $table->string('area');
         $table->date('expire_date');
         $table->unsignedBigInteger('service_id');
         $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
         $table->unsignedBigInteger('product_id');
         $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
         $table->string('count');
         $table->text('message');
         $table->enum('delivery_type', ['delivery', 'without_delivery']);
         $table->unsignedBigInteger('city_id')->nullable();
         $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
         $table->string('street')->nullable();
         $table->string('address')->nullable();
         $table->unsignedBigInteger('branch_id')->nullable();
         $table->foreign('branch_id')->references('id')->on('branches')->onDelete('cascade');
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
      Schema::dropIfExists('buys');
   }
};
