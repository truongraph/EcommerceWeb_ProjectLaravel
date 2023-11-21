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
        Schema::create('discounts', function (Blueprint $table) {
            $table->id();
        $table->string('code')->unique();
        $table->decimal('discount', 8, 2);
        $table->integer('limit_number')->nullable();
        $table->integer('number_used')->default(0);
        $table->dateTime('expiration_date');
        $table->decimal('payment_limit', 8, 2)->nullable();
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('discounts');
    }
};
