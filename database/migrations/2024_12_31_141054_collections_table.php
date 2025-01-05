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
        Schema::create('colllections', function (Blueprint $table)
         {
            $table->id();
            $table->integer('customer_id');
            $table->string('target_collection_month');//***** spelling */
            $table->integer('target_collection_amount');
            $table->string('collected_month');
            $table->integer('collected_amount');
            $table->integer('active_balance');
            $table->integer('collected_status');
            $table->integer('collected_date');
            $table->integer('isActive');
            $table->timestamps();
        });
    }    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('colllections');
    }
};
