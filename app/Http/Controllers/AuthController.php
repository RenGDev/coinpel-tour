<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function login(Request $request)
    {
        $validate = $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string']
        ]);

        if (Auth::attempt($validate)){
            $request->session()->regenerate();

            if($request->user()->is_admin){
                return to_route('users.index');
            }else{
                return to_route('drivers.index');
            }
        }

        return back()->with([
            'fail' => 'Alguma das credencias digitadas não corresponde a nenhum usuario.'
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
