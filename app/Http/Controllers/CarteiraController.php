<?php

namespace App\Http\Controllers;

use App\Models\Carteiras;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarteiraController extends Controller
{
    public function saldo(){
        $userId = Auth::user()->id;
        $carteiras = Carteiras::where('i_usuario', $userId)->get();
        $saldo=0;
        foreach ($carteiras as $carteira) {
           if($carteira->tipo_transacao=='deposito'){
               $saldo+=$carteira->valor;
           }
           else if($carteira->tipo_transacao=='retirada'){
                   $saldo-=$carteira->valor;
           }
        }
        session(['saldo' => $saldo]);
        return view('dentroCasa.carteira.saldo', compact('saldo'));
    }

    public function extrato(){
        $userId = Auth::user()->id;
        $carteiras = Carteiras::where('i_usuario', $userId)->get();
        
        return view('dentroCasa.carteira.extrato', compact('carteiras'));
    }
}

