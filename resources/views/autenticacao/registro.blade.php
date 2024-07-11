        @extends('autenticacao.template-login')
        @section('titulo')
        registre-se
        @endsection
        @section('action')
        {{route('users.store')}}
        @endsection
        @section('conteudo')
        <h1>Registre-Se</h1>
        <label for="name"> Nome usuario </label>
        <input name="name" placeholder="nome de usuario" type="text">
        <label for="email">Email</label>
        <input name="email" placeholder="Email" type="email">
        <label for="password">Senha</label>
        <input name="password" placeholder="senha"  type="password">
        <button type="submit">Registrar</button>
    <a style="text-align: center; margin-top:10px" href="{{route('autenticacao.login')}}">ja tem conta? Faça login</a>
        @endsection
