<?php
    include_once '../public/cabecalho.php';
    if (!isset($_SESSION["usuario"]) )
      header('Location: ../public/pagina_inicial.php');
    else{
      if($_SESSION["tipo"]=='leitor')
        header('Location: ../public/pagina_inicial.php');
    }
?>


<div class="container geral">    
      <div class="row">

        <div class="card-login w-100 pt-5">
          <div class="card">
            <div class="card-header text-center text-info">
                <!--Verificar se é bibliotecaria ou leitor-->
              <h5> O que você deseja fazer?</h5>
            </div>
            <div class="card-body">
                <a class="btn btn-md btn-block  btn-outline-info" type="submit" href="cadastra_publicacao.php">Cadastrar publicação</a>
                <a class="btn btn-md btn-block  btn-outline-info" type="submit">Consultar publicação</a>
                
            </div>
          </div>
        </div>

</body>


</html>