<?php

namespace App\Http\Controllers;

use App\Models\Travel;
use App\Models\User;
use Illuminate\Http\Request;

class TravelSubscriptionController extends Controller
{
    public function index()
    {
        $travels = Travel::with('vehicle', 'driver')->get();
        return view('travels.packages', compact('travels'));
    }

    public function show(){
        $users = User::with('travels')->get();
        return view('travels.contracts', compact('users'));
    }
    public function subscribe(Request $request, $id)
    {
        $user = auth()->user();
        $travel = Travel::with('vehicle')->findOrFail($id);

        if($travel->users()->count() >= $travel->vehicle->capacity){
            return redirect()->back()->with('fail', 'Esta viagem esta cheia!');
        }

        if ($user->travels()->where('travel_id', $travel->id)->exists()) {
            return redirect()->back()->with('fail', 'Você já está inscrito nessa viagem!');
        }

        $user->travels()->attach($travel->id);

        return redirect()->back()->with('success', 'Inscrição realizada com sucesso!');
    }

    public function unsubscribe(Request $request, $id)
    {
        $user = auth()->user();
        $travel = Travel::findOrFail($id);

        $user->travels()->detach($travel->id);

        return redirect()->back()->with('success', 'Você saiu da viagem com sucesso!');
    }
}
