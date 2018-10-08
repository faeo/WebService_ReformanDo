<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

require_once("configuracoes/conexao_bd.php");

if(isset($_GET["pg"])){
  $pg = $_GET["pg"];
}
else{
  $pg = "inicio";
}

?>

<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Padrão caracteres -->
    <meta charset="utf-8">
    <!-- Bootstrap Responsivo-->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Titulo -->
    <title> ReformanDo - WebService </title>
    <!-- Icone proximo ao titulo -->
    <link rel="icon" href="bootstrap-4.1.0/favicon.ico">
    <!-- Bootstrap CSS -->
    <link href="bootstrap-4.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- CSS na unha -->
    <link href="css/estilo.css" rel="stylesheet">
    <!-- JS -->
    <script src="js/validar.js"></script> 
  </head>


  <body class="fundo">
  <!-- HEADER --> 
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark"> 
    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item <?= ($pg == 'inicio')?'active':'' ?>">
          <a class="nav-link" href="./">Início</a>
        </li>

        <li class="nav-item 
          <?php 
             if($pg == 'minhasObras'){
               echo 'active';
             }
          ?>
          ">
             <a class="nav-link" href="?pg=minhasObras">Minhas Obras</a>

          </li>

          <li class="nav-item 
          <?php 
             if($pg == 'profissionais'){
               echo 'active';
             }
          ?>
          ">
             <a class="nav-link" href="?pg=profissionais">Profissionais</a>
             
          </li>  

          <li class="nav-item 
          <?php 
             if($pg == 'souProfissional'){
               echo 'active';
             }
          ?>
          ">
             <a class="nav-link" href="?pg=souProfissional">Sou profissional</a>
             
          </li>        
           
         </ul>
       </div>
 </nav>
 
     <div>
       <img src="img/logo_principal.png" class="img-fluid" alt="Responsive image">
     </div>
 
     

<!-- CONTEUDO -->     
        <div class="container">
          <div class="row justify-content-md-center text-center">
            <div class="col">
              <?php include("paginas/".$pg.".php"); ?>  
            </div>
          </div>
        </div>
      
    
<!-- RODAPÉ --> 
    <br><br>
    <div class="footer text-center">
      <footer class="container">
        <p>&copy; Projeto de TCC - Rafael & Daniel</p>
      </footer>
    </div>

     <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="bootstrap-4.1.0/assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="bootstrap-4.1.0/assets/js/vendor/popper.min.js"></script>
    <script src="bootstrap-4.1.0/dist/js/bootstrap.min.js"></script>
  </body>
</html>
