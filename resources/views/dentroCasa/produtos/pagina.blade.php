@extends('dentroCasa.template-casa')

@section('title')
    {{$produto->nome}}
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/produto.css') }}">
@endsection

@section('conteudo')
<div style="width: 100%; display:flex; flex-direction:column; gap:10px;">
<div class="produto-container">
    <img class="produto-imagem" src="{{$produto->imagem}}" alt="{{$produto->nome}}">
    <div class="produto-info">
        <h1 class="produto-nome">{{$produto->nome}}</h1>
        <p>Preço: <span class="produto-preco">{{$produto->preco}}</span></p>
        <p>Lucro Máximo: R${{number_format(($produto->porcetagem_afiliacao) * $produto->preco,2)}}</p>
        <button class="fechar-link" onclick="window.history.go(-1)"><i class="material-icons">close</i></button>
    </div>
</div>
<p><b>regras do produto:</b></p>
<p  id='descricao'>{{$produto->descricao}}</p>
<a style="margin:auto;width: 200px; height:50px; border:1px solid; border-radius:10px;display:flex; justify-content:center; align-items:Center;" href="">torne se afiliado</a>
</div>
@endsection

