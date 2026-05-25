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
        Schema::table('contacts', function (Blueprint $table) {
            // Remove the phone column
            $table->dropColumn('phone');
            
            // Add subject column
            $table->string('subject')->nullable()->after('email');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('contacts', function (Blueprint $table) {
            // Reverse the changes if needed
            $table->dropColumn('subject');
            $table->string('phone')->nullable()->after('email');
        });
    }
};