@extends('dentroCasa.template-casa')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/meusprodutos.css') }}">
@endsection

@section('title')
    Meus produtos
@endsection

@section('conteudo')
    @if(isset($produtos[0]))

{{--models--}}




{{--models--}}

        <h2 class="titulo-rota">Meus produtos {{$produtos->count()}}</h2>
        <div class="produtos-container row container">
            @foreach ($produtos as $produto)
                <div class="col s12 m4">
                    <div class="card">
                        <div class="card-image">
                            <img src="{{url("storage/{$produto->imagem}")}}" alt="Imagem do produto">
                            <span class="card-title"></span>
                            <a href="{{ route('produtos.show', $produto->slug) }}" class="btn-floating halfway-fab waves-effect waves-light red">
                                <i class="material-icons">visibility</i>
                            </a>
                        </div>
                        <div class="card-content">
                            <p><strong>{{ $produto->nome }}</strong></p>
                            <p>Preço: R${{ number_format($produto->preco, 2, ',', '.') }}</p>
                            <p>Comissão de até: {{ $produto->porcetagem_afiliacao * 100 }}%</p>
                            <p>Lucro Máximo: R${{ number_format($produto->porcetagem_afiliacao * $produto->preco, 2, ',', '.') }}</p>
                            <div style="display: flex; gap:10px;">
                            <a style="border: 1px solid; display:flex; align-items:center;justify-content:center; width:40px; height:40px;" href="{{route('produtos.edit',$produto->id)}}"><i class="material-icons">edit</i></a>
                            <button style="width:40px;display:flex; align-items:center;justify-content:center; height:40px;" data-target="modal{{$produto->id}}" class="btn modal-trigger" ><i class="material-icons">clear</i></button>
                            </div>
                        </div>
                    </div>
                </div>
                @include('custom.modals')
            @endforeach
            <div style="display: flex; flex-direction:row; justify-content:space-between; border:1px solid; width:200px; height:auto; margin-left:10px; padding:10px;">
            <a href="{{route('produtos.create')}}">adicionar produto</a>
            <i class="material-icons">add</i>
            </div>
        </div>
    @else
    <div id="container_mesagem_meus_produtos">
        <h3 id="mesagem_meus_produtos">Não há produtos. Crie o seu Primeiro!</h3>
        <button id="criar_produto" > <a href="{{route('produtos.create')}}">criar</a></button>
      </div>
    @endif
@endsection
