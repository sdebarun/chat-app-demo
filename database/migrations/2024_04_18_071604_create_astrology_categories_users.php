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
        Schema::create('astrology_categories_users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('astrology_category_id');
            $table->timestamps();
        });

        Schema::table('astrology_categories_users', function(Blueprint $table) {
            $table->foreign('user_id')->on('users')->references('id');
            $table->foreign('astrology_category_id')->on('astrology_categories')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('astrology_categories_users', function(Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['astrology_category_id']);
        });
        Schema::dropIfExists('astrology_categories_users');
    }
};
