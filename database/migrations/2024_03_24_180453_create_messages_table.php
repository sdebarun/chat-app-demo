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
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('parent_id')->nullable(); // ID of the parent message
            $table->unsignedBigInteger('sender_id');
            $table->unsignedBigInteger('recipient_id');
            $table->text('message');
            $table->timestamps();
            $table->softDeletes();
        });


        Schema::table('messages', function (Blueprint $table) {
            $table->foreign('parent_id')->on('messages')->references('id')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('sender_id')->on('users')->references('id')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('recipient_id')->on('users')->references('id')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('messages', function (Blueprint $table) {
            $table->dropForeign(['parent_id']);
            $table->dropForeign(['sender_id']);
            $table->dropForeign(['recipient_id']);
        });
        Schema::dropIfExists('messages');
    }
};
