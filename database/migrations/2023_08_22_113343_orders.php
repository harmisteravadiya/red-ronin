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
            $table->integer('order_id')->autoIncrement();
            $table->string('name')->nullable(false);
            $table->string('email')->nullable(false);
            $table->string('mobile')->nullable(false);
            $table->string('amount');
            $table->string('quantity');
            $table->string('item_name');
            $table->string('product_id');
            $table->string('manga_id');
            $table->string('pincode');
            $table->string('address');
            $table->string('payment_method');
            $table->string('shipping_method');
            $table->string('date');
            $table->string('delivery_status')->default('Not delivered');
            $table->string('payment_status')->default('Not Paid');
     
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
