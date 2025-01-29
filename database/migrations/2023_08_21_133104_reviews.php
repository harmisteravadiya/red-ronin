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
        Schema::create('reviews',function(Blueprint $table){
            $table->id('review_id');
            $table->string('id')->nullable(false);
            $table->string('user');
            $table->string('email');
            $table->string('product_name');
            $table->string('product_id')->nullable(false);
            $table->string('manga_id');
            $table->string('manga_name');
            $table->string('pic');
            $table->string('rating');
            $table->string('review');
            $table->string('date');
            
     
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
