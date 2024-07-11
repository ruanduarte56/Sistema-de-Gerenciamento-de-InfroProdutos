# Sistema-de-Gerenciamento-de-InfroProdutos
 um sistema prático parecido com a hotmart para pessoas poderem criar ou se afiliar a produtos tendo acesso a um mercado de produtos com diversas opções 

 <div>
  <img src='https://i.ibb.co/dP8s0m9/2024-07-11-1.png" alt="2024-07-11-1'>
  <img src='https://i.ibb.co/dP8s0m9/2024-07-11-1.png" alt="2024-07-11-1'>
 </div>

#0 Para Usar Basta clonar o repositorio e abri no VsCode <br>
#1 crie um arquivo .env <br>
#2 Copiar os dados do .env.example dentro dele <br>
#3 Criar uma Database no mysql e fazer as seguintes trocas <br>
<p> #DB_DATABASE='nome database' </p> <br>
<p> #DB_USERNAME='nome username' </p> <br>
<p>#DB_PASSWORD='seu password' </p> <br>
#4 após isso basta fazer os seguintes comandos
#4.1 PHP artisan migate 
<p> #4.2 PHP artisan seed <span style='color:red;'>isso ira gerar alguns dados fakes para tesete no seu mysql</span> </p> <br>
#4.3 PHP ARTISAN SERVE <br>
#4.4 Entrar no servidor pelo navegador <br>
#4.4.1 vá para a rota de Registro clicando em Registre-se ou pela url index/registro <br>
#4.5 crie sua conta e após isso será autenticado automaticamente <br>
#4.6 agora basta simular todo sistema na sua própia máquina. <br>