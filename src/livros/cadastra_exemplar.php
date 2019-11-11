<?php
    include_once '../public/cabecalho.php';

    if (!isset($_SESSION["usuario"]) )
      header('Location: ../public/pagina_inicial.php');
    else{
      if($_SESSION["tipo"]=='leitor')
        header('Location: ../public/pagina_inicial.php');
    }
    include_once '../public/db-connect/retorna-publicacao.php';
?>
    <p><?=$_SESSION["tipo"]?></p>
    <div class="container geral">    
      <div class="row">

        <div class="card-login w-75 pt-5">
          <div class="card">
            <div class="card-header text-info">
              <span class> Cadastrar exemplar</span>
            </div>

            <div class="card-body">
              <form action="../public/db-connect/recebe-cadastro-exemplar.php" method="post">
                <div class="form-group">

                    <select class="form-control" name="isbn" required >
                      <option  id="" value="" selected disabled>ISBN</option>
                      <?for($i = 0; $i<sizeof($publi);$i++){?>
                        <option  value="<?=$publi[$i]['isbn']?>" >
                          <?=$publi[$i]['isbn'].'  -  '.$publi[$i]['nome']?>
                        </option>
                      <?}?>
                    </select>
                </div>

                <div class="form-group">
                  <input name="id_exemplar" id="exemplar" type="text" class="form-control" placeholder="Código Exemplar">
                </div>

                

                <button class="btn btn-lg btn-block cor-padrao" type="submit" onclick="alert(getElementById('exemplar').value = parseInt(Math.random() * (5000 - 1) + 1)">Cadastrar</button>
              </form>
            </div>

          </div>
        </div>
    </div>
    </div>
  </body>

  <?php
    //include_once 'rodape.php';
  ?>

</html>