# Sistema-de-Gerenciamento-de-InfroProdutos
 um sistema prático parecido com a hotmart para pessoas poderem criar ou se afiliar a produtos tendo acesso a um mercado de produtos com diversas opções 

 <div>
  <img src='https://i.ibb.co/h7ZVHm2/2024-07-11-4.png" alt="2024-07-11-1'>
  <img src='https://i.ibb.co/rvGL8Kg/2024-07-11-5.png" alt="2024-07-11-1'>
  <img src='https://i.ibb.co/jHwM4pk/2024-07-11-6.png'>
 </div>

#0 Para Usar Basta clonar o repositorio e abri no VsCode <br>
#1 crie um arquivo .env <br>
#2 Copiar os dados do .env.example dentro dele <br>
#3 Criar uma Database no mysql e fazer as seguintes trocas
<p> #DB_DATABASE='nome database' </p> 
<p> #DB_USERNAME='nome username' </p> 
<p>#DB_PASSWORD='seu password' </p> 
#4 após isso basta fazer os seguintes comandos
#4.1 PHP artisan migate 
<p> #4.2 PHP artisan seed <span style='color:red;'>isso irá gerar alguns dados fakes para tesete no seu mysql</span> </p> 
#4.3 PHP ARTISAN SERVE <br>
#4.4 Entrar no servidor pelo navegador <br>
#4.4.1 vá para a rota de login clicando em login ou pela url index/login <br>
#4.5 vá ao banco de dados e veja os emails criados<br>
#4.6 para finalizar basta logar com email e colocar password na senha <br>
#4.7 agora você pode simular todo sistema na sua própia máquina. <br>