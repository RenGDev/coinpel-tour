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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();

            $table->string('identification_name');   
            $table->string('plate')->unique();      
            $table->string('model');                
            $table->string('chassi')->unique();      
            $table->integer('capacity');            
            $table->string('bus_type');              
            $table->string('bench')->nullable();     
            $table->year('year');                    
            
            $table->boolean('internet')->default(false);
            $table->boolean('wc')->default(false);
            $table->boolean('socket')->default(false);
            $table->boolean('air_conditioning')->default(false);
            $table->boolean('fridge')->default(false);
            $table->boolean('heating')->default(false);
            $table->boolean('video')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
