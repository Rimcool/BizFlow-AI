<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('generated_sites', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('business_id'); // Link to Business model
        $table->string('site_url');
        $table->longText('seo_plan')->nullable();
        $table->longText('marketing_plan')->nullable();
        $table->longText('management_tips')->nullable();
        $table->longText('chatbot_details')->nullable();
        $table->timestamps();

        $table->foreign('business_id')->references('id')->on('businesses')->onDelete('cascade');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('generated_sites');
    }
};
