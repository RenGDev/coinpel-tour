<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Travel extends Model
{
    protected $fillable = [
        'name',
        'rule',
        'date',
        'departureTime',
        'origin',
        'destination',
        'value',
        ''
    ]; 
}
