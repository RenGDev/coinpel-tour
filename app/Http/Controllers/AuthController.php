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

        $user = User::where('email', $validate['email'])->first();
    
        if (!$user || !\Hash::check($validate['password'], $user->password)) {
            return back()->with([
                'fail' => 'Alguma das credenciais digitadas não corresponde a nenhum usuário.'
            ]);
        }

        if ($user->is_blocked) {
            return back()->with([
                'fail' => 'Sua conta está bloqueada. Contate o administrador.'
            ]);
        }

        if ($user->first_time) {
            return view('login', [
                'showPasswordModal' => true,
                'user' => $user
            ]);
        }

        Auth::login($user);
        $request->session()->regenerate();

        return $user->is_admin
            ? to_route('users.index')
            : to_route('travels.contracts');
    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'password' => 'required|string|confirmed|min:8',
        ]);
    
        $user = User::findOrFail($request->user_id);
        $user->password = bcrypt($request->password);
        $user->first_time = false;
        $user->save();
    
        return redirect('/')->with('success', 'Senha alterada com sucesso!');
    }

}
