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
        Schema::create('cart', function (Blueprint $table) {
            $table->integer('cart_item_id')->autoIncrement();
            $table->string('user_id')->nullable(false);
            $table->string('product_id');
            $table->string('product_name');
            $table->string('manga_id');
            $table->string('manga_name');
            $table->string('price');
            $table->string('quantity');
            $table->string('pic');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
