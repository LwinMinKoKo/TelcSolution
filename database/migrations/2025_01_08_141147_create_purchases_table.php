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
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->integer('customer_id');
            $table->integer('purchase_id');
            $table->integer('service_months');
            $table->string('payment_method');
            $table->integer('payment_term');
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('isActive');
            $table->integer('total_amount');
            $table->date('isSuspend')->nullable();
            $table->date('suspend_days')->nullable();
            $table->integer('isTerminated')->nullable();
            $table->string('remark')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchases');
    }
};
