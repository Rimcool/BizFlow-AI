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
        Schema::create('payments', function (Blueprint $table) {
    $table->id();
    $table->string('payment_id')->unique();
    $table->string('payment_method');
    $table->decimal('amount', 10, 2);
    $table->string('currency')->default('USD');
    $table->string('status');
    $table->text('customer_info')->nullable();
    $table->text('payement_details')->nullable();
    $table->timestamp('completed_at')->nullable();
    $table->timestamps();
   
            
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
