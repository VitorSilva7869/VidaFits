<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use function Laravel\Prompts\password;

class LoginController extends Controller
{
    public function login(){
        return view('login');
    }

    public function loginValidate(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
    
        if(Auth::attempt($credentials, $request->remember)){//$Remenber Relembrar a senha
            $request->session()->regenerate();
            return redirect()->intended('/');
        } else {
            return redirect()->back()->with('error','Email ou senha invalida');
        }
    }

    public function destroy(){
        Auth::logout();
        return view('login', ['destroy' => 'Saiu da conta']);
    }
    
}
