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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->string('sku')->nullable();
            $table->decimal('original_price',10,2);
            $table->decimal('selling_price', 10,2);
            $table->text('product_description')->nullable();
            $table->unsignedBigInteger('quantity')->default(0);
            $table->boolean('is_active')->default(true);
            $table->boolean('is_gift')->default(false);
            $table->string('tax_code')->nullable();
            $table->boolean('charge_taxes')->default(false);
            $table->boolean('shop_favorite')->default(false);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
