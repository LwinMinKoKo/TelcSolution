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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->integer('customer_id');
            $table->string('name');
            $table->string('phone');
            $table->string('status');
            $table->string('house_no'); 
            $table->string('street');
            $table->string('ward');
            $table->string('township');
            $table->string('city');
            $table->string('village_ward');
            $table->string('village');         
            $table->string('geo_location');
            $table->integer('config_id');
            $table->integer(column: 'staff_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
