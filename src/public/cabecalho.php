<?    session_start();
?>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Sistema biblioteca</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../../estilo.css">

  </head>

  <body>

    <nav class="navbar navbar-dark cor-padrao">

      <div class="col-md-4 ">
      <a class="navbar-brand" href="../public/pagina_inicial.php">
        <img src="../../livro.png" width="30" height="30" class="d-inline-block align-top" alt="">
        Sistema biblioteca
      </a>
      </div>

      <div class="col-md-4 border border-white text-center">
      <?if(isset($_SESSION["usuario"])){
          if($_SESSION["tipo"] == "bibliotecaria"){?>
            <a href="../usuario/menu_bibliotecaria.php" class="text-white">Menu</a> |
          <?}else{?>
            <a href="../usuario/menu_bibliotecaria.php"  class="text-white">Menu</a> |
          <?} 
        }?>
        <a href="../public/pagina_inicial.php"  class=" text-white">Pesquisar</a>
      </div>

      <div class="col-md-4 text-right">
      <?if(isset($_SESSION["usuario"])){?>
        <p>Olá, <span class="text-white"> <?=$_SESSION["usuario"]?> </span> 
        <a href="../public/logout.php" class="btn btn-outline-danger">Sair</a>
        </p>
        
      <?}else{?>
        <a href="../usuario/login.php" class="btn btn-info">Login</a>
      <?}?>
      </div>

    </nav>
    