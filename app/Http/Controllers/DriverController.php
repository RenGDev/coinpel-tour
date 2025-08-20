<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Driver;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Driver::query();

        if ($request->has('search') && $request->search != '') {
            $query->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('registration', 'like', '%' . $request->search . '%');
        }

        $drivers = $query->get();

        return view('home.drivers', compact('drivers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'bornDate' => 'nullable|date',
            'registration' => 'nullable|string|max:50',
            'cpf' => 'nullable|string|max:14|unique:drivers',
            'rg' => 'nullable|string|max:20|unique:drivers',
            'cep' => 'nullable|string|max:10',
            'address' => 'nullable|string|max:255',
            'number' => 'nullable|string|max:10',
            'city' => 'nullable|string|max:100',
            'state' => 'nullable|string|max:50',
            'email' => 'nullable|string|max:255'
        ]);

        // Criação do driver
        Driver::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'bornDate' => $request->bornDate,
            'registration' => $request->registration,
            'cpf' => $request->cpf,
            'rg' => $request->rg,
            'cep' => $request->cep,
            'address' => $request->address,
            'number' => $request->number,
            'city' => $request->city,
            'state' => $request->state,
            'email' => $request->email
        ]);

        return redirect()->route('drivers.index')->with('success', 'Motorista cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $driver = Driver::findOrFail($id);

        $request->validate([
            'name'=> 'sometimes|string|max:255',
            'email'=> 'sometimes|email|unique:drivers,email,' .$driver->id,
            'photo'=> 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'phone'=> 'sometimes|string|max:15',
            'bornDate'=> 'nullable|sometimes|string',
            'registration'=> 'sometimes|string',
            'cpf'=> 'sometimes|string|max:14|unique:drivers,cpf,' .$driver->id,
            'rg'=> 'sometimes|string|max:11|unique:drivers,rg,'.$driver->id,
            'cep'=> 'sometimes|string|max:11',
            'address'=> 'sometimes|string',
            'number'=> 'sometimes|string',
            'city'=> 'sometimes|string',
            'state'=> 'sometimes|string|max:2'
        ]);

        $updates = [
            'name' => $request->name ?? $driver->name,
            'email' => $request->email ?? $driver->email,
            'photo'=> $driver->photo,
            'phone'=> $request->phone ?? $driver->phone,
            'bornDate'=> $request->bornDate ?? $driver->bornDate,
            'registration'=> $request->registration ?? $driver->registration,
            'cpf'=> $request->cpf ?? $driver->cpf,
            'rg'=> $request->rg ?? $driver->rg,
            'cep'=> $request->cep ?? $driver->cep,
            'address'=> $request->address ?? $driver->address,
            'number'=> $request->number ?? $driver->number,
            'city'=> $request->city ?? $driver->city,
            'state'=> $request->state ?? $driver->state
        ];

        if ($request->hasFile('photo')) {
            if ($driver->photo && \Storage::disk('public')->exists($driver->photo)) {
                \Storage::disk('public')->delete($driver->photo);
            }

            $path = $request->file('photo')->store('drivers', 'public');
            $updates['photo'] = $path;
        }

        $driver->update($updates);

        return redirect()->route('drivers.index')->with('success', 'Atualizado com sucesso');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Driver::where('id', $id)->delete();

        return back();
    }
}
