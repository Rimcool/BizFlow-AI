<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('templates', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('description');
            $table->string('preview_image')->nullable();
            $table->text('styles'); // CSS/JS for this template
            $table->text('structure'); // HTML structure
            $table->boolean('is_active')->default(true);
            $table->string('category')->default('general'); // minimal, luxury, vibrant, etc.
            $table->timestamps();
        });

        // Add template_id to businesses table
        Schema::table('businesses', function (Blueprint $table) {
            $table->foreignId('template_id')->nullable()->constrained()->onDelete('set null');
        });
    }

    public function down(): void
    {
        // Remove template_id from businesses first
        Schema::table('businesses', function (Blueprint $table) {
            $table->dropForeign(['template_id']);
            $table->dropColumn('template_id');
        });
        
        // Then drop templates table
        Schema::dropIfExists('templates');
    }
};