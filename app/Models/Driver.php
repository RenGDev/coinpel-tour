<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'bornDate',
        'registration',
        'cpf',
        'rg',
        'cep',
        'address',
        'number',
        'city',
        'state',
        'photo'
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
