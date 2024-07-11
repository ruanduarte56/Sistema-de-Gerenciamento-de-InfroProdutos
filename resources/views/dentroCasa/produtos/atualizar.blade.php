@extends('dentroCasa.template-casa')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/criar.css') }}">
@endsection

@section('conteudo')

<div>
    <form enctype="multipart/form-data" id="container-form-create" class="col s12" action="{{route('produtos.update',$produto->id)}}" method="POST">
        @csrf
        <div style="position:relative;">
            <label for="carregar-foto">foto produto</label>
            <input style="display: none !important; width:100%;" value="{{$produto->image}}"  name="imagem"  id='carregar-foto' style="width:200px; height:200px; border:1px solid;" type="file" accept="image/*" >
            <img style="display: block !important; width:100%;" id="foto-produto" src="{{url("storage/{$produto->imagem}")}}" alt="">
            <button type="button" id="btn-trocar-foto" style="display:auto;position: absolute; top:30px; right:3px;"><i style="color:red;" class="material-icons">close</i></button>
        </div>
        <div id="container-caracteres">
            <label for="nome-produto">Nome produto</label>
            <input style="" value="{{$produto->nome}}"  name="nome"  id="nome-produto" type="text" placeholder="titulo">
           <div id="container-preco">
            <div style="display: flex; flex-direction:column">
            <label style="margin-bottom: 5px" for="preco">preço</label>
            <input value="{{$produto->preco}}"  name="preco"  id="preco" type="text" placeholder="preço">
            </div>
            <div style="margin-left: 10px; padding-top:8px;"  class="input-field col s12">
                <select  id="idioma" name="idioma">
                    <option value="{{$filtro->idioma}}"  selected>{{$filtro->idioma}}</option>
                    <option value="pt-br">PT-BR</option>
                </select>
                <label style="top:-27px !important;" for="idioma">Idioma</label>
            </div>
        </div>
            <div id='container_selects'>
            
            <div class="input-field col s12">
                <select id="nicho" name="nicho">
                    <option value="{{$filtro->nicho}}" selected>{{$filtro->nicho}}</option>
                    <option value="saúde física">Saúde Física</option>
                    <option value="saúde mental">Saúde Mental</option>
                    <option value="outro">Outro</option>
                </select>
                <label for="nicho">Nicho</label>
            </div>
            <div class="input-field col s12">
                <select  id="formato_produto" name="formato_produto">
                    <option value="{{$filtro->formato_produto}}"  selected>{{$filtro->formato_produto}}</option>
                    <option value="curso digital">Curso Digital</option>
                    <option value="ebook digital">Ebook Digital</option>
                    <option value="sowftare">sowftare</option>
                </select>
                <label for="idioma">Formato do produto</label>
            </div>

            <div class="input-field col s12">
                <select  id="moeda" name="moeda">
                    <option value="{{$filtro->moeda}}"  selected>{{$filtro->moeda}}</option>
                    <option value="real">Real</option>
                </select>
                <label for="moeda">moeda</label>
            </div>

            <div id="opcao-afiliados" class="input-field col s12">
                <select  id="afiliados" name="afiliados">
                    <option value="{{$filtro->afiliados==1? 1:0}}" selected>{{$filtro->afiliados==1? 'sim':'não'}}</option>
                    <option value="1">Sim</option>
                    <option value="0">Não</option>
                </select>
                <label>Deseja Afiliados?</label>
            </div>
            </div>
        </div>
        <div style="@if($filtro->afiliados==1) display:flex; @endif" id="container-opcoes-afiliados">
            <div class="select_afiliados" class="input-field col s12">
                <label>Tipo de comissão</label>
                <select class="select_hide" id="comissao" name="tipo-comissao">
                    <option value="{{$filtro->tipo_comissao==0? 0:$filtro->tipo_comissao}}"  selected>{{$filtro->tipo_comissao==0? 'escolha':$filtro->tipo_comissao}}</option>
                    <option value="ultimo clique">Último Clique</option>
                    <option value="primeiro clique">Primeiro Clique</option>
                    <option value="50% cada">50% cada</option>
                </select>
            </div>    
            <div  class="select_afiliados" class="input-field col s12">
                <label>Qual comissão</label>
                <select class="select_hide" id="porcentagem" name="porcetagem_afiliacao">
                    <option value="{{$produto->porcetagem_afiliacao * 100 <20? '':$produto->porcetagem_afiliacao}}"
                        {{$produto->porcetagem_afiliacao * 100 <20? 'disabled':''}}
                    selected>{{$produto->porcetagem_afiliacao * 100 <20? 'escolha':$produto->porcetagem_afiliacao * 100 . '%'}}</option>
                    <option value="0.2">20%</option>
                    <option value="0.3">30%</option>
                    <option value="0.4">40%</option>
                    <option value="0.5">50%</option>
                    <option value="0.6">60%</option>
                    <option value="0.7">70%</option>
                </select>
            </div>
            <div  class="select_afiliados" class="input-field col s12">
                <label for="hotlink">Hotlink Alternativos?</label>
                <select class="select_hide" id="hotlink" name="hotlink-alternativos">
                    <option value="{{$filtro->hotlink_alternativos==1? 1:0}}"  selected>{{$filtro->hotlink_alternativos==1? 'sim':'não'}}</option>
                    <option value="1">Sim</option>
                    <option value="0">Não</option>
                </select>
            </div>
            <div  class="select_afiliados" class="input-field col s12">
                <label for="premio-afiliado">Prêmio para Afiliados</label>
                <select class="select_hide" id="premio-afiliado" name="premio-afiliado">
                    <option value="{{$filtro->premio_afiliado==1 ? 1:0}}"  selected>{{$filtro->premio_afiliado==1 ? 'sim':'não'}}</option>
                    <option value="1">Sim</option>
                    <option value="0">Não</option>
                </select>
            </div>
        </div>
        <div id="container-textarea">
        <label for="descricao">Descrição do produto e regras</label>
        <textarea placeholder="escreva tudo sobre o produto" name="descricao" id="descricao" minlength="0" maxlength="4000" cols="30" rows="10">{{ $produto->descricao}}</textarea>
        </div>
        <button  class="btn waves-effect waves-light" type="submit">Atualizar</button>
        @method('PUT')
    </form>
</div>

@if($errors->any())
    <div style="" class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@endsection

@push('script')
<script>
document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('select');
    var instances = M.FormSelect.init(elems);
});
//
document.getElementById('opcao-afiliados').addEventListener('change', (evt) => {
    if (evt.target.value==true) {
        [...document.getElementsByClassName('select_hide')].forEach(element => {
           //element.setAttribute('','')
        });
        var SelectsHide = document.getElementById('container-opcoes-afiliados');
        SelectsHide.style.display = 'flex';
    }else{
        var SelectsHide = document.getElementById('container-opcoes-afiliados');
        SelectsHide.style.display = 'none';
        }});

        document.getElementById('carregar-foto').addEventListener('change', (evt) => {
            const file = evt.target.files[0];
            if (file) {
                const imgURL = URL.createObjectURL(file);
                document.getElementById('carregar-foto').style.display = 'none';
                document.getElementById('foto-produto').setAttribute('src', imgURL);
                document.getElementById('foto-produto').style.display = 'block';
                document.getElementById('btn-trocar-foto').style.display = 'block';
                document.querySelector('label[for="carregar-foto"]').style.display = 'none';
            }
        });

        document.getElementById('btn-trocar-foto').addEventListener('click', (evt) => {
            document.getElementById('carregar-foto').style.display = 'block';
            document.getElementById('carregar-foto').value = ""; // Reset the file input
            document.getElementById('foto-produto').style.display = 'none';
            document.getElementById('btn-trocar-foto').style.display = 'none';
        });

        document.getElementById('preco').addEventListener('input',(evt)=>{
            var valor=evt.target.value;
            if(isNaN(valor) || valor < 0){
                evt.target.value=0
            }
            if(evt.target.value>10000){
                evt.target.value=10000
            }
        })
    </script>
@endpush