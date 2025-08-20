<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Vehicle::query();

        if ($request->has('search') && $request->search != '') {
            $query->where('model', 'like', '%' . $request->search . '%')
                  ->orWhere('bus_type', 'like', '%' . $request->search . '%');
        }

        $vehicles = $query->get();

        return view('home.vehicles', compact('vehicles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'identification_name' => 'required|string|max:255',
            'plate' => 'required|string|max:20|unique:vehicles',
            'model' => 'nullable|string|max:100',
            'chassi' => 'nullable|string|max:50|unique:vehicles',
            'capacity' => 'nullable|integer|min:1',
            'bus_type' => 'nullable|string|max:50',
            'bench' => 'nullable|string',
            'year' => 'nullable|integer|min:1900|max:' . date('Y'),
            'internet' => 'nullable|boolean',
            'wc' => 'nullable|boolean',
            'socket' => 'nullable|boolean',
            'air_conditioning' => 'nullable|boolean',
            'fridge' => 'nullable|boolean',
            'heating' => 'nullable|boolean',
            'video' => 'nullable|boolean',
        ]);
    
        Vehicle::create([
            'identification_name' => $request->identification_name,
            'plate' => $request->plate,
            'model' => $request->model,
            'chassi' => $request->chassi,
            'capacity' => $request->capacity,
            'bus_type' => $request->bus_type,
            'bench' => $request->bench,
            'year' => $request->year,

            'internet' => $request->boolean('internet'),
            'wc' => $request->boolean('wc'),
            'socket' => $request->boolean('socket'),
            'air_conditioning' => $request->boolean('air_conditioning'),
            'fridge' => $request->boolean('fridge'),
            'heating' => $request->boolean('heating'),
            'video' => $request->boolean('video'),
        ]);
    
        return redirect()->route('vehicles.index')->with('success', 'Veículo cadastrado com sucesso!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $vehicle = Vehicle::findOrFail($id);

        $request->validate([
            'identification_name' => 'nullable|string|max:255',
            'plate' => 'nullable|string|max:20|unique:vehicles,plate,' . $vehicle->id,
            'chassi' => 'nullable|string|max:50|unique:vehicles,chassi,' . $vehicle->id,
            'model' => 'nullable|string|max:100',
            'capacity' => 'nullable|integer|min:1',
            'bus_type' => 'nullable|string|max:50',
            'bench' => 'nullable|string',
            'year' => 'nullable|integer|min:1900|max:' . date('Y'),

            'internet' => 'nullable|boolean',
            'wc' => 'nullable|boolean',
            'socket' => 'nullable|boolean',
            'air_conditioning' => 'nullable|boolean',
            'fridge' => 'nullable|boolean',
            'heating' => 'nullable|boolean',
            'video' => 'nullable|boolean',
        ]);

        $updates = [
            'identification_name' => $request->identification_name ?? $vehicle->identification_name,
            'plate' => $request->plate ?? $vehicle->plate,
            'model' => $request->model ?? $vehicle->model,
            'chassi' => $request->chassi ?? $vehicle->chassi,
            'capacity' => $request->capacity ?? $vehicle->capacity,
            'bus_type' => $request->bus_type ?? $vehicle->bus_type,
            'bench' => $request->bench ?? $vehicle->bench,
            'year' => $request->year ?? $vehicle->year,

            'internet' => $request->boolean('internet'),
            'wc' => $request->boolean('wc'),
            'socket' => $request->boolean('socket'),
            'air_conditioning' => $request->boolean('air_conditioning'),
            'fridge' => $request->boolean('fridge'),
            'heating' => $request->boolean('heating'),
            'video' => $request->boolean('video'),
        ];

        $vehicle->update($updates);

        return redirect()->route('vehicles.index')->with('success', 'Atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Vehicle::where('id', $id)->delete();
        return back();
    }
}
