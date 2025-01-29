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
            $table->id('product_id');
            $table->string('product_name')->nullable(false);
            $table->string('category');
            $table->string('price');
            $table->string('stock');
            $table->string('description');
            $table->string('rating');
            $table->string('sell_count');
            $table->string('pic');
            $table->string('release_date');
            $table->string('status')->default('Active');
     
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
