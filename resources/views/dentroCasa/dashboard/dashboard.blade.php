@extends('dentroCasa.template-casa')

@section('title')
    Dashboard
@endsection


@section('css')
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
@endsection

@section('conteudo')
<h2 class="titulo-rota">Dashboard</h2>
<ul id="slide-out" class="sidenav " >
    <li><div class="user-view">
      <div class="background red ">
       <img src="img/office.jpg" style="opacity: 0.5"> 
      </div>
        <a href="#user"><img class="circle" src="img/user.jpg"></a>
        <a href="#name"><span class="white-text name">John Doe</span></a>
        <a href="#email"><span class="white-text email">jdandturk@gmail.com</span></a>
     </div></li> 

      <li><a href="#!"><i class="material-icons">dashboard</i>Dashboard</a></li>
      <li><a href="#"><i class="material-icons">playlist_add_circle</i>Produtos</a></li>
      <li><a href="#!"><i class="material-icons">shopping_cart</i>Pedidos</a></li>
      <li><a href="#!"><i class="material-icons">bookmarks</i>Categorias</a></li>
      <li><a href="#!"><i class="material-icons">peoples</i>Usuários</a></li>
  </ul>

  <div style="" class="row container">
    <section class="info">

      <div class="col s12 m4">
      <article class="bg-gradient-green card z-depth-4 ">
        <i class="material-icons">paid</i>
        <p>Saldo</p>
        <h3>{!! session('saldo') ? session('saldo') : "<a href='" . route('saldo') . "'><i class='material-icons'>visibility</i></a>" !!}</h3>
    </article>
      </div>

      <div class="col s12 m4">
        <article class="bg-gradient-blue card z-depth-4 ">
          <i class="material-icons">face</i>
          <p>Acessos este mes</p>
          <h3>EM breve</h3>           
        </article>
        </div>

        <div class="col s12 m4">
          <article class="bg-gradient-orange card z-depth-4 ">
            <i class="material-icons">shopping_cart</i>
            <p>Vendas do mes</p>
            <h3>EM breve</h3>            
          </article>
          </div>

    </section>        
  </div>
      <div class="row container ">
          <section class="graficos col s12 m6" >            
            <div class="grafico card z-depth-4">
                <h5 class="center"> Aquisição de usuários</h5>
                <canvas id="myChart" width="400" height="200"></canvas>
            </div>           
          </section> 
          <section class="graficos col s12 m6">            
              <div class="grafico card z-depth-4">
                  <h5 class="center"> Produtos </h5>
              <canvas id="myChart2" width="400" height="200"></canvas> 
          </div>            
         </section>             
      </div>
      </div>
@endsection




@push('script')
<script src="{{asset('js/chart.js')}}"></script>
<script>
/* Gráfico 01 */
var ctx = document.getElementById('myChart');
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['Janeiro', 'Feveiro', 'Março', 'Abril'],
        datasets: [{
            label: '2020',
            data: [12, 19, 3, 5],
            backgroundColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',                         
                'rgba(255, 159, 64, 1)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',                     
                'rgba(255, 159, 64, 1)'
            ],
           borderWidth: 1, 
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});

/* Gráfico 02 */
var ctx = document.getElementById('myChart2');
var myChart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: ['Facebook', 'Google', 'Instagram'],
        datasets: [{
            label: 'Visitas',
            data: [12, 19, 3],
            backgroundColor: [
                'rgba(255, 99, 132)',
                'rgba(54, 162, 235)',                         
                'rgba(255, 159, 64)'
            ]
        }]
    }
});

</script>
@endpush