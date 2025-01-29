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
        Schema::create('user_requests',function(Blueprint $table){
            $table->id('request_id');
            $table->string('name')->nullable(false);
            $table->string('email');
            $table->string('mobile');
            $table->string('message');
            $table->string('date');
            $table->string('status')->default('Pending');
     
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
