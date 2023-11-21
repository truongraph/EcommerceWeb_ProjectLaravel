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
            $table->string('name_product');
            $table->string('link_product');
            $table->string('sku');
            $table->string('avt_product');
            $table->string('image_product');
            $table->integer('quantity_product');
            $table->decimal('price_product', 8, 2);
            $table->decimal('sellprice_product', 8, 2);
            $table->text('sortdesc_product');
            $table->text('desc_product');
            $table->integer('number_buy');
            $table->integer('status_product');
            $table->foreignId('id_category')->constrained('categories');
            $table->timestamps();
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
