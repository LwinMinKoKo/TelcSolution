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
        Schema::create('installments', function (Blueprint $table) {
            $table->id();
            $table->integer('customer_id');
            $table->integer('purchase_id');
            $table->timestamps('due_date');
            $table->integer('amount_by_frequency');
            $table->integer('isPaid');
            $table->integer('installmentNo');
            $table->timestamps('target_collection_months');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('installments');
    }
};
