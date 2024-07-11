
@extends('autenticacao.template-login')
{{--title--}}
@section('titulo')
    login
@endsection
{{--action--}}
@section('action')
{{route('autenticar.login')}}
@endsection
{{--conteudo main--}}
@section('conteudo')
    @csrf
    <h1>Login</h1>
    <label for="email"></label>
    <input placeholder="email" name="email" type="email">
    <label for="senha"></label>
    <input placeholder="senha" name="password" type="password">
    <div><input type="checkbox" name="remember"> Lembra-me </div>
    <button type="submit">Logar</button>
    <a style="text-align: center; margin-top:10px" href="{{route('registro')}}">ainda não tem conta? registre-se</a>
@endsection