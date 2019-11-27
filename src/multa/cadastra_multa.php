<?php
    include_once '../public/cabecalho.php';
    include_once '../public/db-connect/multa/retorna-valor-multa.php';

    $livro = 0;
    $trabalho = 0;
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
            <div class=row>
              <div class="col-md-7 text-center">
              <h5> Cadastra valor multa</h5>
              </div>
              <div class="col-md-4">
              <button class="btn btn-md btn-block  btn-outline-success" type="submit" onclick="window.location.href='consulta_valor_multa.php'" >Consultar valor da multas</button>
              </div>
            </div>
            </div>

            <div class="card-body">
              <form action="../public/db-connect/multa/recebe-cadastro-valor-multa.php" method="post">
                  <div class="form-group">  
                    <select class="form-control" name="tipo" required >
                        <option  id="" value="" selected disabled>Tipo</option>
                        <?for ($i=0; $i < sizeof($valor_multa); $i++) { 
                          if($valor_multa[$i]['tipo'] == "Livros"){
                            $livro = 1;
                          }if($valor_multa[$i]['tipo'] == "Trabalho"){
                            $trabalho = 1;
                          }
                        }?>
                        <option value="Livros" <?=$livro ==1 ? 'disabled':''?> >Livros</option>
                        <option value="Trabalho" <?=$trabalho == 1 ? 'disabled':''?> >Trabalho</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <input name="valor" id="valor" type="number" class="form-control" placeholder="Valor multa por dia" <?=$livro ==1 && $trabalho == 1? 'disabled':''?> >
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