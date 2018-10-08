<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

require_once "config.php";

require "db/db.php";

$db = new DB();


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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Rafael & Daniel">
    <link rel="icon" href="bootstrap-4.1.0/favicon.ico">
    <title>WebService ReformanDo</title>
    

    <!-- Bootstrap core CSS -->
    <link href="bootstrap-4.1.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <script src="/webservice_reformando/view/assets/js/main.js"></script>
  </head>

  <body class="fundo">

    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
       

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item <?= ($pg == 'inicio')?'active':'' ?>">
            <a class="nav-link" href="./">Início</a>
          </li>
          <li class="nav-item 
          <?php 

            if($pg == 'form_cadastrar'){
              echo 'active';
            }

          ?>
          ">
            <a class="nav-link" href="?pg=form_cadastrar">Minhas Obras</a>
          </li>          
          
        </ul>
      </div>
    </nav>

    <div class="logo_principal">
      <img src="img/logo_principal.png" alt="logo-principal">
    </div>

    <main role="main">
      <div class="container">      
        <div class="row">
          <div class="col">
            
            <?php include("paginas/".$pg.".php");  ?>

          </div>
        </div>
      </div> <!-- /container -->

    </main>

    <footer class="container">
      <p>&copy; Projeto de TCC - Rafael & Daniel</p>
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="bootstrap-4.1.0/assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="bootstrap-4.1.0/assets/js/vendor/popper.min.js"></script>
    <script src="bootstrap-4.1.0/dist/js/bootstrap.min.js"></script>
  </body>
</html>
