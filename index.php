<?    session_start();
?>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Sistema biblioteca</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="estilo.css">

  </head>

  <body>

    <nav class="navbar navbar-dark cor-padrao">

      <div class="col-md-4 ">
      <a class="navbar-brand" href="../public/pagina_inicial.php">
        <img src="livro.png" width="30" height="30" class="d-inline-block align-top" alt="">
        Sistema biblioteca
      </a>
      </div>

      <div class="col-md-4 border border-white text-center">
      <?if(isset($_SESSION["usuario"])){
          if($_SESSION["tipo"] == "bibliotecaria"){?>
            <a href="src/usuario/menu_bibliotecaria.php" class="text-white">Menu</a>|
          <?}else{?>
            <a href="src/usuario/menu_bibliotecaria.php"  class="text-white">Menu</a>|
          <?}
        }?>
         <a href="src/public/pagina_inicial.php"  class=" text-white">Pesquisar</a>
      </div>

      <div class="col-md-4 text-right">
      <?if(isset($_SESSION["usuario"])){?>
        <p>Olá, <span class="text-white"> <?=$_SESSION["usuario"]?> </span> 
        <a href="src/public/logout.php" class="btn btn-outline-danger">Sair</a>
        </p>
        
      <?}else{?>
        <a href="src/usuario/login.php" class="btn btn-info">Login</a>
      <?}?>
      </div>

    </nav>

    <div class="container geral " style="margin-top: 10em;">   

<form class="form-group">
  
  <div class="row">
    <div class="col-10">
      <input name="busca" type="text" class="form-control input-lg" placeholder="Busca">
    </div>
    <div class="col-2">
      <button class="btn btn-outline-info">Buscar</button>
    </div>
  </div>
   

    <div class="custom-control custom-radio">
      <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input">
      <label class="custom-control-label" for="customRadio1">Buscar por livro</label>
    </div>
    <div class="custom-control custom-radio">
      <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input">
      <label class="custom-control-label" for="customRadio2">Buscar por autor</label>
    </div>
</form>
</div>

</body>


</html>