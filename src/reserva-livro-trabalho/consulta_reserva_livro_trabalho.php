<?php
    include_once '../public/cabecalho.php';
    include_once '../public/db-connect/multa/retorna-valor-multa.php';
    include_once '../public/db-connect/multa/retorna-valor-multa.php';

?>
    <?php
    include_once '../public/cabecalho.php';
?>
<a href="<?=$_SERVER['HTTP_REFERER']?>" class="p-4">Voltar</a>
    <div class="container geral">    
      <div class="row">

        <div class="card-login w-100 pt-5">
          <div class="card">
            <div class="card-header text-info">
              <span > Lista de reservas feitas</span>

              <input class="form-control ml-2 " type="text" placeholder="Buscar por nome" style="width: 200px; display: inline;"></input>
              <a href="#" onclick=''>PESQUISAR</a>
            </div>

            <div class="card-body">
              <form action="#" method="post">
               

                <?include_once "../public/db-connect/reserva_livro_trabalho/retorna-reservas.php"?>
                <ul class ="list-group list-group-flush">
                  <?for ($i = 0; $i < sizeof($reserva_livro); $i++){?>
                        <li class="list-group-item">
                        <div class="row">
                            <div class="col-md-9">
                            <label class="text-primary" for="nome">Nome:</label> <?=$reserva_livro[$i]['nome']?> </br>
                            <label class="text-primary" for="ISBN">Codigo: </label> <?=$reserva_livro[$i]['codigo']?><br>
                            <label class="text-primary" for="ISBN">Data limite: </label> <?=$reserva_livro[$i]['data_limite']?>

                            </div>
                            <div class="col-md-3">
                            <a href="../public/db-connect/reserva_livro_trabalho/renovar-reserva.php?livro?<?=$reserva_livro[$i]['codigo']?>?<?=$reserva_livro[$i]['data_limite']?>" class="text-success">
                            Renovar
                            </a><br>
                            <a href="../public/db-connect/reserva_livro_trabalho/excluir-reserva.php?livro?<?=$reserva_livro[$i]['codigo']?>?<?=$reserva_livro[$i]['data_limite']?>" class="text-danger" >
                            Excluir
                            </a>
                            </div>
                        </div>
                        </li>
                  <?}?>
                </ul>

                <ul class ="list-group list-group-flush">
                  <?for ($i = 0; $i < sizeof($reserva_trabalho); $i++){?>
                        <li class="list-group-item">
                        <div class="row">
                            <div class="col-md-9">
                            <label class="text-primary" for="nome">Nome:</label> <?=$reserva_trabalho[$i]['nome']?> </br>
                            <label class="text-primary" for="ISBN">Codigo: </label> <?=$reserva_trabalho[$i]['codigo']?><br>
                            <label class="text-primary" for="ISBN">Data limite: </label> <?=$reserva_trabalho[$i]['data_limite']?>

                            </div>
                            <div class="col-md-3">
                            <a href="../public/db-connect/reserva_livro_trabalho/renovar-reserva.php?trabalho?<?=$reserva_trabalho[$i]['codigo']?>?<?=$reserva_trabalho[$i]['data_limite']?>" class="text-success">
                            Renovar
                            </a><br>
                            <a href="../public/db-connect/reserva_livro_trabalho/excluir-reserva.php?trabalho?<?=$reserva_trabalho[$i]['codigo']?>?<?=$reserva_trabalho[$i]['data_limite']?>" class="text-danger" >
                            Excluir
                            </a>
                            </div>
                        </div>
                        </li>
                  <?}?>
                </ul>
                


              </form>
            </div>

          </div>
        </div>
    </div>
    </div>
  </body>


</html>

</html>