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
            $table->integer("customer_id");
            $table->integer("product_id");
            $table->integer("service_months");
            $table->integer("payment_method");
            $table->integer("payment_term");
            $table->date('start_date');
            $table->date("end_date");
            $table->integer("isActive");
            $table->integer('isSuspend')->nullable();
            $table->integer('suspend_days')->nullable();
            $table->boolean('ternamite');
            $table->string("reamrk");
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
