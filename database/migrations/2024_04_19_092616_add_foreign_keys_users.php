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
        Schema::table('users', function(Blueprint $table){
            $table->foreign('country_id')->on('countries')->references('id')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('state_id')->on('states')->references('id')->onDelete('cascade')->onUpdate('cascade');
            
        }); 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function(Blueprint $table){
            $table->dropForeign(['country_id']);
            $table->dropForeign(['state_id']);
            
        }); 
    }
};
