<?php

namespace App\Http\Controllers;

use App\Models\produtos;
use Illuminate\Http\Request;

class MeusProdutosController extends Controller
{
    public function index(){
        $id = auth()->user()->id;
        $produtos = produtos::where('i_usuario',$id)->get();
        return view('dentroCasa.produtos.meusprodutos', compact('produtos'));
    }
}
