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
        Schema::create('drivers', function (Blueprint $table) {
            $table->id();
            
            $table->string('name');             
            $table->string('email')->unique();  
            $table->string('phone', 20);      
            $table->string('photo')->nullable();  

            $table->date('bornDate');           
            $table->string('registration')->nullable(); 
            $table->string('cpf', 14)->unique(); 
            $table->string('rg', 20)->nullable();

            $table->string('cep', 9);           
            $table->string('address');         
            $table->string('number', 10);       
            $table->string('city');              
            $table->string('state', 2);  
                    
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drivers');
    }
};
