<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/autenticacao.css') }}">
    <title>@yield('titulo')</title>
    <style>
   
    </style>
</head>
<body style="">
    <form style="" action="@yield('action')" method="POST">
        @csrf
        @yield('conteudo')
        

            @if ($mensagem = Session::get('error'))
    <p id="respostas" style="">{{$mensagem}} </p>
@endif

@if ($errors->any())
    @foreach ($errors->all() as $error)
    <p id="respostas" style="">{{$error}} </p>
    @endforeach
@endif

    </form>
</body>
</html>