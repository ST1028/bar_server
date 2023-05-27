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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('friend_id');
            $table->unsignedBigInteger('menu_id');
            $table->unsignedBigInteger('blend_id')->nullable();
            $table->integer('price');
            $table->string('remarks')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('friend_id')->references('id')->on('friends');
            $table->foreign('menu_id')->references('id')->on('menus');
            $table->foreign('blend_id')->references('id')->on('blends');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
