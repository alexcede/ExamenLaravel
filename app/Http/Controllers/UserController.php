<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function auth() {

        request()->validate([
            'nick' => 'required',
            'password' => 'required',
        ]);

        $nick = request()->input('nick');
        $password = request()->input('password');
        
        $user = User::where('nick', $nick)->first();
        if ($user && Auth::guard('user')->attempt(['nick' => $nick, 'password' => $password])) {
            session(['userAuth' => true]);
            session(['userName' => $user->nick]);

            return redirect()->route('user.casals');
        } else {
            // Las credenciales son incorrectas o el usuario no existe
            return redirect()->route('index')->with('error', 'Credenciales incorrectas.');
        }
    }

    public function logout() {
        Auth::guard('user')->logout();

        session()->flush();

        return redirect()->route('index');
    }
}
