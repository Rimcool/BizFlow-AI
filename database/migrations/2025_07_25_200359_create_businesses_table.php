<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // In your create_businesses_table migration
public function up()
{
    Schema::create('businesses', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('industry');
        $table->string('target');
        $table->string('style')->nullable();
        $table->string('color')->nullable();
        $table->text('products');
        $table->string('goal');
        $table->string('email');
        $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('businesses');
    }
};
