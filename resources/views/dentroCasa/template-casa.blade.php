<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/casa.css') }}">
      <!-- Compiled and minified CSS -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      @yield('css')
</head>
<body>
    <header>
         <!-- Dropdown Structure Perfil -->
         <ul id='dropdown1' class='dropdown-content'>
            <li><a href="{{route('users.show', auth()->user()->name)}}">Ver pefil</a></li>
            <li><a href="{{route('logout')}}">Logout</a></li>
          </ul>
         <!-- Dropdown Structure Menu mobile -->
          <ul id='mobile-navbar' class='sidenav'>
            <li id="close"><a href="#"><i style="margin: 0" class="material-icons right">close</i></a></li>
            <aside>
              <div id="aside-ul-mobile">
                <div style="background-color:white; display:flex; justify-content:start; gap:10px; padding-left:10px; align-items:Center;"><img style="width: 40px; height:40px; object-fit:contain;" src="{{asset('img/user.png')}}" alt=""> {{auth()->user()->name}}</div>
                <!-- Drobbravel Structure Produtos -->
                <ul style="margin:0;" class="collapsible">
                  <li>
                    <div class="collapsible-header"><i class="material-icons">arrow_drop_down</i>Dashboard</div>
                    <div class="collapsible-body"><a href='{{route('dashboard.index')}}'>Dashboard</a></div>
                  </li>
                  <li>
                    <div class="collapsible-header"><i class="material-icons">arrow_drop_down</i>Produtos</div>
                    <div class="collapsible-body"><a href='{{route('produtos.index')}}'>Mercado</a></div>
                    <div class="collapsible-body"><a href='{{route('meusprodutos.index')}}'>Meus Produtos</a></div>
                    <div class="collapsible-body"><a href='{{route('produtos.afiliado')}}'>Sou afiliado</a></div>
                    <div class="collapsible-body"><a href=''>Area de membros</a></div>
                  </li><li>
                    <div class="collapsible-header"><i class="material-icons">arrow_drop_down</i>Carteira</div>
                    <div class="collapsible-body"><a href='{{route('saldo')}}'>Saldo</a></div>
                    <div class="collapsible-body"><a href='{{route('extrato')}}'>Extratos</a></div>
                  </li><li>
                    <div class="collapsible-header"><i class="material-icons">arrow_drop_down</i>Dicas</div>
                  </li>
                  <li>
                    <div class="collapsible-header"><i class="material-icons">arrow_drop_down</i>Sobre nós</div>
                  </li>
                </ul>
                <!-- Drobbravel Structure Produtos fim-->
              </div>
            </aside>
          </ul>
          <!--nav-->
        <nav style="padding-right: 10px">
            <div class="nav-wrapper">
              <a style="margin-left:10px;" href="#" class="brand-logo left">Meu APP</a>
              <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="{{route('dashboard.index')}}">Dashboard</a></li>
                <li><a href="{{route('produtos.index')}}">Mercado</a></li>
                <li><a  class="dropdown-trigger" data-target='dropdown1' href="#">
                    <i class="material-icons">person</i>
                </a></li>
              </ul>
                <a data-target="mobile-navbar" class="right hide-on-med-and-up sidenav-trigger"  href="#">
                    <i class="material-icons">menu</i>
                </a>
            </div>
          </nav>        
    </header>
    <aside>
      <div id="aside-ul">
        <div style="background-color:white; display:flex; justify-content:start; gap:10px; padding-left:10px; align-items:Center;"><img style="width: 40px; height:40px; object-fit:contain;" src="{{asset('img/user.png')}}" alt=""> {{auth()->user()->name}}</div>
        <!-- Drobbravel Structure Produtos -->
        <ul style="margin:0;" class="collapsible">
          <li>
            <div class="collapsible-header"><i class="material-icons">arrow_drop_down</i>Dashboard</div>
            <div class="collapsible-body"><a href='{{route('dashboard.index')}}'>Dashboard</a></div>
          </li>
          <li>
            <div class="collapsible-header"><i class="material-icons">arrow_drop_down</i>Produtos</div>
            <div class="collapsible-body"><a href='{{route('produtos.index')}}'>Mercado</a></div>
            <div class="collapsible-body"><a href='{{route('meusprodutos.index')}}'>Meus Produtos</a></div>
            <div class="collapsible-body"><a href='{{route('produtos.afiliado')}}'>Sou afiliado</a></div>
            <div class="collapsible-body"><a href=''>Area de membros</a></div>
          </li><li>
            <div class="collapsible-header"><i class="material-icons">arrow_drop_down</i>Carteira</div>
            <div class="collapsible-body"><a href='{{route('saldo')}}'>Saldo</a></div>
            <div class="collapsible-body"><a href='{{route('extrato')}}'>Extratos</a></div>
          </li><li>
            <div class="collapsible-header"><i class="material-icons">arrow_drop_down</i>Dicas</div>
          </li><li>
            <div class="collapsible-header"><i class="material-icons">arrow_drop_down</i>Sobre nós</div>
          </li><li>
            <div class="collapsible-header"><i class="material-icons">arrow_drop_down</i>Em breve</div>
          </li><li>
            <div class="collapsible-header"><i class="material-icons">arrow_drop_down</i>Em breve</div>
          </li>
          <li>
            <div class="collapsible-header"><i class="material-icons">arrow_drop_down</i>Em breve</div>
          </li>
          <li>
            <div class="collapsible-header"><i class="material-icons">arrow_drop_down</i>Em breve</div>
          </li><li>
            <div class="collapsible-header"><i class="material-icons">arrow_drop_down</i>Em breve</div>
          </li><li>
            <div class="collapsible-header"><i class="material-icons">arrow_drop_down</i>Em breve</div>
          </li><li>
            <div class="collapsible-header"><i class="material-icons">arrow_drop_down</i>Em breve</div>
          </li><li>
            <div class="collapsible-header"><i class="material-icons">arrow_drop_down</i>Em breve</div>
          </li><li>
            <div class="collapsible-header"><i class="material-icons">arrow_drop_down</i>Em breve</div>
          </li>
        </ul>
        <!-- Drobbravel Structure Produtos fim-->
      </div>
    </aside>
    <main>
        @yield('conteudo')
    </main>
    <aside></aside>
    <footer>
      <a href="">suporte</a>
      <a href="">depoimento</a>
      <a href="">Política de privacidade</a>
      <a href="">Política de Comissão</a>
    </footer>

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script>
    /*DropDown*/
    var elemDrop = document.querySelectorAll('.dropdown-trigger');

var instanceDrop = M.Dropdown.init(elemDrop, {
          coverTrigger:false,
          constrainWidth:false 
});

/*Menu*/
elensSideNav=document.querySelectorAll('.sidenav');
const instancesSidenav = M.Sidenav.init(elensSideNav,{
    edge:"right"
});

//closemenu
document.getElementById('close').addEventListener('click', (evt) => {
    const overlay = document.querySelector('.sidenav-overlay');
    overlay.click();
    overlay.focus();
});

//dropdown produtos
document.addEventListener('DOMContentLoaded', function() {
      var elems = document.querySelectorAll('.collapsible');
      var instances = M.Collapsible.init(elems, {
        accordion: false,
        inDuration:100,
        outDuration:100
      });
    });
 //modals
 document.addEventListener('DOMContentLoaded', function() {
    // Inicialize todos os modais
    var elems = document.querySelectorAll('.modal');
    var instances = M.Modal.init(elems);

    // Adicione evento de clique para abrir o modal correspondente
    var modalTriggers = document.querySelectorAll('.modal-trigger');
    modalTriggers.forEach(function(trigger) {
      trigger.addEventListener('click', function() {
        var target = trigger.getAttribute('data-target');
        var modalInstance = M.Modal.getInstance(document.getElementById(target));
        modalInstance.open();
      });
    });
  });
</script>   
@stack('script')
</body>
</html>
