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
              <span class> Cadastra publicação</span>
            </div>

            <div class="card-body">
              <form action="../public/db-connect/recebe-cadastro-publicacao.php" method="post">
                <div class="form-group"> 
                  <input name="nome_publicacao" type="text" class="form-control" placeholder="Nome publicação" required>
                </div>

                <div class="form-group"> 
                  <input name="ano" type="number" class="form-control" placeholder="Ano" required>
                </div>

                <div class="form-group"> 
                  <input name="autor_1" type="text" class="form-control" placeholder="Autor" required>
                </div>

                <div class="form-group">
                  <input name="editora" type="text" class="form-control" placeholder="Editora" >
                </div>

                <div class="form-group">
                  <input name="isbn" id="isbn" type="text" class="form-control" placeholder="ISBN" >
                </div>

                <button class="btn btn-lg btn-block cor-padrao" type="submit" onclick="getElementById('isbn').value = parseInt(Math.random() * (5000 - 1) + 1)">Cadastrar</button>
              </form>
            </div>

          </div>
        </div>
    </div>
    </div>
  </body>

</html>