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
    Schema::table('payments', function (Blueprint $table) {
        $table->foreignId('business_id')->constrained()->onDelete('cascade');
        $table->foreignId('order_id')->nullable()->constrained()->onDelete('cascade');
    });
}

public function down()
{
    Schema::table('payments', function (Blueprint $table) {
        $table->dropForeign(['business_id']);
        $table->dropForeign(['order_id']);
        $table->dropColumn(['business_id', 'order_id']);
    });
}

};
