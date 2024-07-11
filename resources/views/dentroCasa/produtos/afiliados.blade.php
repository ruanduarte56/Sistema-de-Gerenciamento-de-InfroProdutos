@extends('dentroCasa.template-casa')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/meusprodutos.css') }}">
@endsection

@section('title')
    Sou afiliado
@endsection

@section('conteudo')
    @if(isset($produtos[0]))

{{--models--}}




{{--models--}}

        <h2 class="titulo-rota">Produtos que você é afiliado {{$produtos->count()}}</h2>
        <div class="produtos-container row container">
            @foreach ($produtos as $produto)
                <div class="col s12 m3">
                    <div class="card">
                        <div class="card-image">
                            <img src="{{url("storage/{$produto->imagem}")}}" alt="Imagem do produto">
                            <span class="card-title">{{ $produto->nome }}</span>
                            <a href="{{ route('produtos.show', $produto->slug) }}" class="btn-floating halfway-fab waves-effect waves-light red">
                                <i class="material-icons">visibility</i>
                            </a>
                        </div>
                        <div class="card-content">
                            <p><strong>{{ $produto->nome }}</strong></p>
                            <p>Preço: R${{ number_format($produto->preco, 2, ',', '.') }}</p>
                            <p>Comissão de até: {{ $produto->porcetagem_afiliacao * 100 }}%</p>
                            <p>Lucro Máximo: R${{ number_format($produto->porcetagem_afiliacao * $produto->preco, 2, ',', '.') }}</p>
                            <p>Frequência: {{ intval(1000 / date('z') + 1) }}</p>
                            <p class="avaliacao">Avaliação: 5.0 <i class="material-icons">star</i></p>
                            <div style="display: flex; gap:10px;">
                            <button data-target="modal{{$produto->id}}" class="btn modal-trigger" ><i class="material-icons">clear</i></button>
                            </div>
                        </div>
                    </div>
                </div>
                @include('custom.modals')
            @endforeach
            
        </div>
    @else
    <div id="container_mesagem_meus_produtos">
        <h3 id="mesagem_meus_produtos">voce ainda não é um afiliado torne se um</h3>
        <a href="{{route('produtos.index')}}">ir ao mercado</a>
      </div>
    @endif
@endsection
