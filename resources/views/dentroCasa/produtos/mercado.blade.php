@extends('dentroCasa.template-casa')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/mercado.css') }}">
@endsection

@section('title')
{{$search==true? $search:'mercado'}}
@endsection

@section('conteudo')
    <h2 class="titulo-rota">{{$search==true? $search:'mercado'}}</h2>
    <form id='form-search' class="form-pesquisa" action="{{route('produtos.index')}}" method="GET">
        @csrf
        <input name="search" class="input-pesquisa" type="search" placeholder="pesquisar item">
        <button id="search" type="submit"><i class="material-icons">search</i></button>
        <button id="btn-filtro" type="button"><i class="material-icons">filter_list</i></button>
       <div id="filtros" style="display: none;">
        <div class="input-field col s12">
          <select onchange="submitForm()"   id="nicho" name="nicho">
              <option value="" disabled selected>escolha</option>
              <option value="saúde física">Saúde Física</option>
              <option value="saúde mental">Saúde Mental</option>
              <option value="outro">Outro</option>
          </select>
          <label for="nicho">Nicho</label>
      </div>

      <div class="input-field col s12">
        <select onchange="submitForm()"  id="formato_produto" name="formato_produto">
            <option value="" disabled selected>escolha</option>
            <option value="curso digital">Curso Digital</option>
            <option value="ebook digital">Ebook Digital</option>
            <option value="sowftare">sowftare</option>
        </select>
        <label for="idioma">Formato do produto</label>
    </div>

    <div class="input-field col s12">
      <select onchange="submitForm()"  id="moeda" name="moeda">
          <option value="" disabled selected>Escolha</option>
          <option value="real">Real</option>
      </select>
      <label for="moeda">moeda</label>
  </div>

       </div>
    </form>

    <div class="produtos-container row container">
        @foreach ($produtos as $produto)
        <div class="col s12 m4">
          <div class="card">
            <div class="card-image">
              <img style="width: 100%; height:200px;object-fit:cover;" src="{{url("storage/{$produto->imagem}")}}">
              <span class="card-title"></span>
              <a href="{{route('produtos.show',$produto->slug)}}" class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">visibility</i></a>
            </div>
            <div class="card-content">
              <p><strong> {{$produto->nome}}</strong></p>
              <p>preço: {{$produto->preco}}</p>
              <p>Comissão de até: {{$produto->porcetagem_afiliacao * 100}}%</p>
              <p>Lucro Máximo: R${{number_format(($produto->porcetagem_afiliacao) * $produto->preco,2)}}</p>
            </div>
          </div>
        </div>
        @endforeach
      </div>
      <div class="row center">
        {{$produtos->links('custom.paginacao')}}
      </div>
@endsection

@push('script')
<script>
 function submitForm() {
        document.getElementById("form-search").submit();
    }
  //
document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('select');
    var instances = M.FormSelect.init(elems);
});
  //
  var contador = 0; 
  document.getElementById('btn-filtro').addEventListener('click', () => {
    contador++;
    var filtros = document.getElementById('filtros');
    if (contador % 2 !== 0) {
      filtros.style.display = 'flex';
    } else {
      filtros.style.display = 'none';
    }
  });
</script>
@endpush
