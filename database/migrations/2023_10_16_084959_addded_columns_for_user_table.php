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
        Schema::table('users', function (Blueprint $table) {
            $table->text('telegram_id')->nullable();
            $table->text('phone_number')->nullable();
            $table->tinyInteger('is_active')->default(1)->nullable();
            $table->text('api_token')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn("telegram_id");
            $table->dropColumn("phone_number");
            $table->dropColumn("is_active");
            $table->dropColumn("api_token");
        });
    }
};
