<?php

namespace App\Http\Controllers;
//use Iluminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function auth(Request $request){
        $credenciais = $request->validate([
            'email'=>['required','email'],
            'password'=>['required'],],
            [
                'email.required' =>'o campo Email é Obrigatório',
                'email.email' =>'o Email é invalido',
                'password.required' =>'o campo Senha é Obrigatório',
            ]

        );

        if(Auth::attempt($credenciais,$request->remember)){
            $request->session()->regenerate();
            return redirect()->intended(route('dashboard.index'));
        }else{
           return redirect()->back()->with('error','login ou senha invalidos');
        }
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(route('dashboard.index'));

    }

    public function create(){
        return view('autenticacao.registro');
    }
}
