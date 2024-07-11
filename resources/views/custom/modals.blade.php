<div id="modal{{$produto->id}}" class="modal">
    <div class="modal-content">
      <h4>Tem Certeza que deseja excluir?</h4>
      <p>{{$produto->nome}}</p>
      <p>{{$produto->preço}}</p>
    </div>
    <div class="modal-footer" style="display: flex; justify-content:end;">
      <a href="#!" class="modal-close waves-effect waves-green btn-flat">cancelar</a>
      <form action="{{route('produtos.destroy',$produto->id)}}" method="POST">
        @method('DELETE')
        @csrf
      <button type="submit" class="modal-close waves-effect waves-green btn-flat">Deletar</button>
    </form>
    </div>
  </div>