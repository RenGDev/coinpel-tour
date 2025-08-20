<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $fillable = [
        'identification_name', 
        'plate',               // Placa
        'model',               // Modelo
        'chassi',              // Chassi
        'capacity',            // Capacidade
        'bus_type',            // Tipo de ônibus
        'bench',               // Bancada
        'year',                // Ano
        'internet',            // Internet (boolean)
        'wc',                  // WC (boolean)
        'socket',              // Tomada (boolean)
        'air_conditioning',    // Ar condicionado (boolean)
        'fridge',              // Geladeira (boolean)
        'heating',             // Calefação (boolean)
        'video',
    ]; 

    public function travels()
    {
        return $this->hasMany(Travel::class);
    }

    public function travelsOn($date, $time)
    {
        return $this->travels()->where('date', $date)->where('departure_time', $time);
    }
    
    public function isAvailable($date, $time)
    {
        return $this->travelsOn($date, $time)->doesntExist();
    }
}
