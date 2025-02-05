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
            $table->string('email');
            $table->integer('isActive');
            $table->string('house_no')->nullable(); 
            $table->string('street');
            $table->string('ward');
            $table->string('township');
            $table->string('city');
            $table->string('village_ward')->nullable();      
            $table->string('geo_location')->nullable();
            //$table->geography('geo_location', subtype: 'point', srid: 4326);
            $table->integer('config_id')->nullable();
            $table->integer(column: 'staff_id');
            $table->integer(column: 'product_id');
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
