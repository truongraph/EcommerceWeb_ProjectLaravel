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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('name_order');
            $table->string('code_order');
            $table->string('date_order');
            $table->string('phone_order');
            $table->string('address_order');
            $table->decimal('total_order', 8, 2);
            $table->text('note')->nullable();
            $table->integer('status_order');
            $table->foreignId('id_customer')->constrained('customers');
            $table->string('id_payment');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
