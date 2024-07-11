@extends('dentroCasa.template-casa')

@section('conteudo')
<div style="width: 100%; display:grid; grid-template-columns:150px 400px; align-items:center">
    <div style="display:flex; flex-direction:column; gap:0; align-items:Center;">
    <img width="100px; height:100px; border-radius:100%;" src="{{asset('img/user.png')}}" alt="">
    <input style="height:20px; width:80px; border: 0.5px solid black;" title="trocar foto" type="file">
    </div>
    <div>
        <form action="{{route('users.update',auth()->user()->id)}}" style="display: flex; gap:10px; flex-direction:column;" method="POST">
            @method('PUT')
            @csrf
            <div style="display: flex;"><p class="paragrafo">nome: {{$user->name}}</p> <input  class="input" name="nome" value="{{$user->name}}" id="input-nome" style="display: none" type="text"> <button type="button" class="btn-edit" style="border: none; background:none;"><i class="material-icons">edit</i></button> <button class="btn-check" type="submit" style="display:none; border: none; background:none;"><i class="material-icons">check</i></button></div>
            <div style="display: flex;"><p class="paragrafo">nome: {{$user->email}}</p> <input class="input"  name="email" value="{{$user->email}}" id="input-email" style="display: none" type="text"> <button type="button" class="btn-edit" style="border: none; background:none;"><i class="material-icons">edit</i></button> <button class="btn-check" type="submit" style="display:none; border: none; background:none;"><i class="material-icons">check</i></button></div>
        </form>
    </div>
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
    var btns_edits = [...document.getElementsByClassName('btn-edit')];
    var btns_check = [...document.getElementsByClassName('btn-check')];
    var inputs = [...document.getElementsByClassName('input')];
    var paragrafos =[...document.getElementsByClassName('paragrafo')];


    btns_edits.forEach((btn, i) => {
        btn.addEventListener("click", (evt) => {
            evt.target.parentNode.style.display = 'none';
            inputs[i].style.display = 'block';
            inputs[i].focus();
            paragrafos[i].style.display='none'
            btns_check[i].style.display = 'block';
        });
    });

    inputs.forEach((input,i) => {
        input.addEventListener('blur',()=>{
            console.log('teste');
            btns_edits[i].style.display='block'
            paragrafos[i].style.display='block'
            btns_check[i].style.display = 'none';
            input.style.display='none';
        })
    });
</script>
@endpush