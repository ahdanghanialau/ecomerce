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
            $table->foreignId('user_id')->constrained('users')->cascadeOndelete();
            $table->decimal('grand_total',10,2)->nullabel();
            $table->string('payment_method')->nullabel();
            $table->string('payment_status')->nullabel();
            $table->enum('status',['new','processing','shiped','delivered','canceled'])->default('new');
            $table->string('currency')->nullabel();
            $table->decimal('shipping_amount',10,2)->nullable();
            $table->string('shipping_method')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
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
