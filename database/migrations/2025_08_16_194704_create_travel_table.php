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
        Schema::create('travels', function (Blueprint $table) {
            $table->id();

            $table->string('name');   
            $table->string('status')->default('Não iniciada'); 
            $table->string('rule');            
            $table->date('date');                
            $table->time('departure_time');       
            $table->string('origin');            
            $table->string('destination');       
            $table->decimal('value', 10, 2);

            $table->foreignId('vehicle_id')->constrained('vehicles')->onDelete('cascade');
            $table->foreignId('driver_id')->constrained('drivers')->onDelete('cascade');

            $table->unique(['vehicle_id', 'date', 'departure_time']);
            $table->unique(['driver_id', 'date', 'departure_time']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('travel');
    }
};
