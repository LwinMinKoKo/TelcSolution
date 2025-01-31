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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->integer('customer_id');
            $table->integer('installment_id');
            $table->date('target_collection_months');
            $table->integer('target_collection_amount');
            $table->date('collected_months');
            $table->integer('collected_amount');
            $table->integer('active_balance');
            $table->integer('collected_status');
            $table->integer('purchase_id');
            $table->integer('isActive');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
