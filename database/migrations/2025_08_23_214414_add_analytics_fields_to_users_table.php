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
    Schema::table('users', function (Blueprint $table) {
        $table->timestamp('last_login_at')->nullable();
        $table->integer('login_count')->default(0);
        $table->timestamp('last_password_change')->nullable();
    });
}

public function down()
{
    Schema::table('users', function (Blueprint $table) {
        $table->dropColumn(['last_login_at', 'login_count', 'last_password_change']);
    });
}
    /**
     * Reverse the migrations.
     */
    
};
