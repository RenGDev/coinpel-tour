<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Travel;
use App\Models\Driver;
use App\Models\Vehicle;

use App\Enums\TravelRule;
use App\Enums\TravelStatus;

class TravelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Travel::query();

        if ($request->has('search') && $request->search != '') {
            $query->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('rule', 'like', '%' . $request->search . '%');
        }

        $travels = $query->get();

        return view('home.travels', compact('travels'));
    }

    public function create()
    {
        $travels = Travel::all();
        $drivers = Driver::all();
        $vehicles = Vehicle::all();
    
        return view('travels.create', compact('travels' ,'drivers', 'vehicles'));
    }

    public function edit(Travel $travel)
    {
        $drivers = Driver::all();
        $vehicles = Vehicle::all();
        $travels = Travel::all();

        return view('travels.edit', compact('travel', 'drivers', 'vehicles', 'travels'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'nullable|string|max:50',
            'rule' => 'required|string|max:100',
            'date' => 'required|date',
            'departure_time' => 'required|date_format:H:i',
            'origin' => 'required|string|max:255',
            'destination' => 'required|string|max:255',
            'value' => 'required|numeric|min:0',

            'vehicle_id' => 'required|exists:vehicles,id',
            'driver_id' => 'required|exists:drivers,id',
        ]);

        try {
            Travel::create([
                'name' => $request->name,
                'status' => $request->status ?? 'Não iniciada',
                'rule' => $request->rule,
                'date' => $request->date,
                'departure_time' => $request->departure_time,
                'origin' => $request->origin,
                'destination' => $request->destination,
                'value' => $request->value,
                'vehicle_id' => $request->vehicle_id,
                'driver_id' => $request->driver_id,
            ]);

            return redirect()->route('travels.index')->with('success', 'Viagem cadastrada com sucesso!');
        } catch (\Illuminate\Database\QueryException $e) {
            // Caso viole a unique (mesmo veículo/driver, data e hora)
            return back()->withErrors(['error' => 'O motorista ou veículo já estão em outra viagem nesse horário.']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Travel $travel)
    {
        $request->validate([
            'name' => 'nullable|string|max:255',
            'status' => 'nullable|string|max:50',
            'rule' => 'nullable|string|max:100',
            'date' => 'nullable|date',
            'departure_time' => 'nullable|date_format:H:i',
            'origin' => 'nullable|string|max:255',
            'destination' => 'nullable|string|max:255',
            'value' => 'nullable|numeric|min:0',
            'vehicle_id' => 'nullable|exists:vehicles,id',
            'driver_id' => 'nullable|exists:drivers,id',
        ]);

        $updates = [
            'name' => $request->name ?? $travel->name,
            'status' => $request->status ?? $travel->status,
            'rule' => $request->rule ?? $travel->rule,
            'date' => $request->date ?? $travel->date,
            'departure_time' => $request->departure_time ?? $travel->departure_time,
            'origin' => $request->origin ?? $travel->origin,
            'destination' => $request->destination ?? $travel->destination,
            'value' => $request->value ?? $travel->value,
            'vehicle_id' => $request->vehicle_id ?? $travel->vehicle_id,
            'driver_id' => $request->driver_id ?? $travel->driver_id,
        ];

        $travel->update($updates);

        return redirect()->route('travels.index')->with('success', 'Viagem atualizada com sucesso!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Travel::where('id', $id)->delete();

        return back();
    }
}
