@extends('dentroCasa.template-casa')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/criar.css') }}">
@endsection

@section('conteudo')

<div>
    <form enctype="multipart/form-data" id="container-form-create" class="col s12" action="{{route('produtos.store')}}" method="POST">
        @csrf
        <div style="position:relative;">
            <label for="carregar-foto">foto produto</label>
            <input required name="imagem"  id='carregar-foto' style="width:200px; height:200px; border:1px solid;" type="file" accept="image/*" >
            <img id="foto-produto" src="" alt="">
            <button type="button" id="btn-trocar-foto" style="display:none;position: absolute; top:3px; right:3px;"><i style="color:red;" class="material-icons">close</i></button>
        </div>
        <div id="container-caracteres">
            <div style="margin-top: 10px;">
            <label style="" for="nome-produto">Nome produto</label>
            <input required name="nome"  id="nome-produto" type="text" placeholder="titulo">
            </div>
            <div id="container-preco" style="">
                <div style="display: flex; flex-direction:column">
                <label style="margin-bottom: 5px" for="preco">preço</label>
                <input  name="preco"  id="preco" type="text" placeholder="preço">
                </div>
                <div style="margin-left: 10px; padding-top:8px;" class="input-field col s12">
                    <select  id="idioma" name="idioma">
                        <option value=""  selected>escolha</option>
                        @foreach ($idioma_valores as $idioma)
                        <option value="{{$idioma}}">{{$idioma}}</option>
                    @endforeach
                    </select>
                    <label style="top:-27px !important;" for="idioma">Idioma</label>
                </div>
            </div>

            <div id='container_selects'>
            <div class="input-field col s12">
                <select required  id="nicho" name="nicho">
                    <option value="" disabled selected>escolha</option>
                    @foreach ($nicho_valores as $nicho)
                        <option value="{{$nicho}}">{{$nicho}}</option>
                    @endforeach
                    <option value="outro">Outro</option>
                </select>
                <label for="nicho">Nicho</label>
            </div>
            <div class="input-field col s12">
                <select  id="formato_produto" name="formato_produto">
                    <option value="" disabled selected>escolha</option>
                    @foreach ($formato_valores as $formato)
                        <option value="{{$formato}}">{{$formato}}</option>
                    @endforeach
                </select>
                <label for="idioma">Formato do produto</label>
            </div>

            <div class="input-field col s12">
                <select  id="moeda" name="moeda">
                    <option value="" disabled selected>Escolha</option>
                    @foreach ($moeda_valores as $moeda)
                    <option value="{{$moeda}}">{{$moeda}}</option>
                @endforeach
                </select>
                <label for="moeda">moeda</label>
            </div>

            <div id="opcao-afiliados" class="input-field col s12">
                <select  id="afiliados" name="afiliados">
                    <option value="" disabled selected>Escolha</option>
                    <option value="1">Sim</option>
                    <option value="0">Não</option>
                </select>
                <label>Deseja Afiliados?</label>
            </div>
            </div>
        </div>
        <div id="container-opcoes-afiliados">
            <div class="select_afiliados" class="input-field col s12">
                <label>Tipo de comissão</label>
                <select class="select_hide" id="comissao" name="tipo-comissao">
                    <option value="" disabled selected>Comissão por</option>
                    <option value="ultimo clique">Último Clique</option>
                    <option value="primeiro clique">Primeiro Clique</option>
                    <option value="50% cada">50% cada</option>
                </select>
            </div>    
            <div  class="select_afiliados" class="input-field col s12">
                <label>Qual comissão</label>
                <select class="select_hide" id="porcentagem" name="porcetagem_afiliacao">
                    <option value="" disabled selected>Escolha</option>
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
                    <option value="" disabled selected>escolha</option>
                    <option value="1">Sim</option>
                    <option value="0">Não</option>
                </select>
            </div>
            <div  class="select_afiliados" class="input-field col s12">
                <label for="premio-afiliado">Prêmio para Afiliados</label>
                <select class="select_hide" id="premio-afiliado" name="premio-afiliado">
                    <option value="" disabled selected>Escolha</option>
                    <option value="1">Sim</option>
                    <option value="0">Não</option>
                </select>
            </div>
        </div>
        <div id="container-textarea">
        <label for="descricao">Descrição do produto e regras</label>
        <textarea placeholder="escreva tudo sobre o produto" name="descricao" id="descricao" minlength="0" maxlength="4000" cols="30" rows="10"></textarea>
        </div>
        <button  class="btn waves-effect waves-light" type="submit">Criar</button>
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

document.getElementById('opcao-afiliados').addEventListener('change', (evt) => {
    if (evt.target.value==true) {
        [...document.getElementsByClassName('select_hide')].forEach(element => {
           element.setAttribute('required','')
        });
        var SelectsHide = document.getElementById('container-opcoes-afiliados');
        SelectsHide.style.display = 'flex';
    }else{
        var SelectsHide = document.getElementById('container-opcoes-afiliados');
        SelectsHide.style.display = 'none';
        [...document.getElementsByClassName('select_hide')].forEach(element => {
           element.removeAttribute('required')
        });
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