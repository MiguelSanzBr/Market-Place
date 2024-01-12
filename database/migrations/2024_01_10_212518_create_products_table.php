<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
      $table->id();
      $table->decimal('price');
      $table->string('name');
      $table->text('describe');
      $table->string('category');
      $table->bigInteger('stored_quantity');
      $table->bigInteger('sold_amount')->default(0);
      $table->unsignedBigInteger('user_id');
      $table->foreign('user_id')
      ->references('id')->on('users');
      $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
