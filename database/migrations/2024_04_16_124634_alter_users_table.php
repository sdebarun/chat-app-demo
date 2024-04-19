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
            $table->string('phone_number')->after('email')->nullable();
            $table->string('display_pic', 300)->after('remember_token')->nullable();
            $table->string('street_1')->nullable()->after('display_pic');
            $table->string('street_2')->nullable()->after('street_1');
            $table->string('pincode')->nullable()->after('street_2');
            $table->boolean('is_active')->after('pincode')->default(true);
            $table->timestamp('last_active_at')->nullable()->after('is_active');
            $table->unsignedBigInteger('country_id')->after('last_active_at');
            $table->unsignedBigInteger('state_id')->after('country_id');
            $table->integer('experience')->unsigned()->nullable()->after('state_id');
            $table->integer('rating')->default(0)->after('experience');
            $table->json('languages_spoken')->nullable()->after('rating');
            $table->string('referral')->nullable()->after('languages_spoken');
            $table->softDeletes()->after('updated_at');
            
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('phone_number');
            $table->dropColumn('display_pic');
            $table->dropColumn('street_1');
            $table->dropColumn('street_2');
            $table->dropColumn('pincode');
            $table->dropColumn('is_active');
            $table->dropColumn('last_active_at');
            $table->dropColumn('country_id');
            $table->dropColumn('state_id');
            $table->dropColumn('experience');
            $table->dropColumn('rating');
            $table->dropColumn('languages_spoken');
            $table->dropColumn('deleted_at');
        });
    }
};
