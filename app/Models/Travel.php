<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Enums\TravelStatus;
use App\Enums\TravelRule;

class Travel extends Model
{
    protected $fillable = [
        'name',
        'rule',
        'date',
        'departure_time',
        'origin',
        'destination',
        'value',
        'status',
        'vehicle_id',
        'driver_id'
    ]; 

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }

    public function scopeVehicleAvailable($query, $vehicleId, $date, $time)
    {
        return $query->where('vehicle_id', $vehicleId)
                     ->where('date', $date)
                     ->where('departure_time', $time)
                     ->doesntExist();
    }

    public function scopeDriverAvailable($query, $driverId, $date, $time)
    {
        return $query->where('driver_id', $driverId)
                     ->where('date', $date)
                     ->where('departure_time', $time)
                     ->doesntExist();
    }

    protected $casts = [
        'status' => TravelStatus::class,
        'rule' => TravelRule::class
    ];
}
