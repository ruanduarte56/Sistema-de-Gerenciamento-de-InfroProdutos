# Sistema-de-Gerenciamento-de-InfroProdutos
 um sistema prático parecido com a hotmart para pessoas poderem criar ou se afiliar a produtos tendo acesso a um mercado de produtos com diversas opções 

 <div>
  <img src='https://i.ibb.co/dP8s0m9/2024-07-11-1.png" alt="2024-07-11-1'>
  <img src='https://i.ibb.co/dP8s0m9/2024-07-11-1.png" alt="2024-07-11-1'>
 </div>

#0 Para Usar Basta clonar o repositorio e abri no VsCode
#1 crie um arquivo .env
#2 Copiar os dados do .env.example dentro dele
#3 Criar uma Database no mysql e fazer as seguintes trocas
# DB_DATABASE='nome database'
# DB_USERNAME='nome username'
# DB_PASSWORD='seu password'
#4 após isso basta fazer os seguintes comandos
#4.1 PHP artisan migate 
<p> #4.2 PHP artisan seed <span style='color:red;'>isso ira gerar alguns dados fakes para tesete no seu mysql</span> </p>
#4.3 PHP ARTISAN SERVE 
#4.4 Entrar no servidor pelo navegador 
#4.4.1 vá para a rota de Registro clicando em Registre-se ou pela url index/registro
#4.5 crie sua conta e após isso será autenticado automaticamente
#4.6 agora basta simular todo sistema na sua própia máquina.