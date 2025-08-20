<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Travel;
use App\Models\User;
use App\Models\Driver;
use App\Models\Vehicle;

class StatisticController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $totalTravels = Travel::count();
        $travelsByStatus = Travel::select('status')
            ->selectRaw('COUNT(*) as total')
            ->groupBy('status')
            ->pluck('total', 'status');

        $totalUsers = User::count();
        $totalDrivers = Driver::count();
        $totalVehicles = Vehicle::count();

        return view('home.statistics', [
            'totalTravels' => $totalTravels,
            'travelsByStatus' => $travelsByStatus,
            'totalUsers' => $totalUsers,
            'totalDrivers' => $totalDrivers,
            'totalVehicles' => $totalVehicles
        ]);
    }

}
