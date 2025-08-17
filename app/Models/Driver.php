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
        'state'
    ];

}
