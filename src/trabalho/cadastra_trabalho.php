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

        <div class="card-login w-75 pt-5">
          <div class="card">
            <div class="card-header text-info">
              <span class> Cadastra trabalho</span>
            </div>

            <div class="card-body">
              <form action="../public/db-connect/trabalho/recebe-cadastro-trabalho.php" method="post">
                <div class="form-group"> 
                  <input name="nome_trabalho" type="text" class="form-control" placeholder="Nome trabalho" required>
                </div>

                <div class="form-group"> 
                  <input name="ano" type="number" class="form-control" placeholder="Ano" required>
                </div>

                <div class="form-group"> 
                  <input name="autor_1" type="text" class="form-control" placeholder="Autor 1" required>
                </div>

                <div class="form-group"> 
                  <input name="autor_2" type="text" class="form-control" placeholder="Autor 2 (se não houver, não preencha)" >
                </div>

                <div class="form-group"> 
                  <input name="autor_3" type="text" class="form-control" placeholder="Autor 3 (se não houver, não preencha)" >
                </div>

                <div class="form-group">
                  <input name="codigo" id="codigo" type="text" class="form-control" placeholder="Código" >
                </div>

                <button class="btn btn-lg btn-block cor-padrao" type="submit" onclick="getElementById('codigo').value = parseInt(Math.random() * (5000 - 1) + 1)">Cadastrar</button>
              </form>
            </div>

          </div>
        </div>
    </div>
    </div>
  </body>

</html>