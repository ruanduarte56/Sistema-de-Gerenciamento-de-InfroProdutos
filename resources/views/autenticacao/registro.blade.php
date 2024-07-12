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
        <label for="password_confirmation">confirme a senha</label>
        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
        <button type="submit">Registrar</button>
        @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <a style="text-align: center; margin-top:10px" href="{{route('autenticacao.login')}}">ja tem conta? Faça login</a>
        @endsection
