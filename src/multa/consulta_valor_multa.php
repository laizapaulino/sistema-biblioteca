<?php
    include_once '../public/cabecalho.php';
    include_once '../public/db-connect/multa/retorna-valor-multa.php';

?>
    <div class="container geral mt-2">    
      <a href="<?=$_SERVER['HTTP_REFERER']?>" >Voltar</a>
      <div class="row m-5">
        <div class="col-md-5 text-center">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Tipo</th>
                <th scope="col">Valor</th>
                <th scope="col"></th>

              </tr>
            </thead>
            <tbody>
            <?for ($i=0; $i < sizeof($valor_multa); $i++) { ?>
              <form action="../public/db-connect/multa/atualiza-valor-multa.php?<?=$valor_multa[$i]['tipo']?>" method="post">
                  <tr>
                    <td><?=$valor_multa[$i]['tipo']?></td>

                    <td>
                    <input name="valor" id="valor" type="number" class="form-control" value="<?=$valor_multa[$i]['valor']?>" >

                    </td>
                    <td>
                      <input class="btn btn-md btn-block btn-outline-success text-primary" type="submit" value='Atualizar'></input>
                    </td>

                  </tr>
              </form>
            <?}?>
              
              
              
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </body>


</html>