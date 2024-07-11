@extends('dentroCasa.template-casa')



@section('conteudo')
    <div style="">
        <h1>Extrato</h1>
        @php
        foreach ($carteiras as $carteira) {
           if($carteira->tipo_transacao=='deposito'){
               echo "entrada:$carteira->valor" . " data: ".$carteira->data_transacao."<br>";
           }
           else if($carteira->tipo_transacao=='retirada'){
                echo "retirada: $carteira->valor". " data: ".$carteira->data_transacao . "<br>";
           }
        }
@endphp

@endsection