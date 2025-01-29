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
        Schema::create('registered_users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(false);
            $table->string('email')->unique();
            $table->string('mobile',10);
            $table->string('gender');
            $table->string('dob');
            $table->string('pincode');
            $table->string('address');
            $table->string('pic')->default('images.png');
            $table->string('pwd');
            $table->string('role')->default('normal');
            $table->string('status')->default('Inactive');
            $table->timestamps();
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
