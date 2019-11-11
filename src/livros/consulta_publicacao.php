<?php
    include_once '../public/cabecalho.php';
?>
<a href="<?=$_SERVER['HTTP_REFERER']?>" class="p-4">Voltar</a>
    <div class="container geral">    
      <div class="row">

        <div class="card-login w-100 pt-5">
          <div class="card">
            <div class="card-header text-info">
              <span > Lista de publicações</span>

              <input class="form-control ml-2 " type="text" placeholder="Buscar por nome" style="width: 200px; display: inline;"></input>
              <a href="#" onclick=''>PESQUISAR</a>
            </div>

            <div class="card-body">
              <form action="#" method="post">
               

                <?include_once "../public/db-connect/retorna-publicacao.php"?>
                <ul class ="list-group list-group-flush">
                  <?for ($i = 0; $i < sizeof($publi); $i++){?>
                        <li class="list-group-item">
                        <div class="row">
                            <div class="col-md-9">
                            <label class="text-primary" for="nome">Nome:</label> <?=$publi[$i]['nome']?> </br>
                            <label class="text-primary" for="ISBN">ISBN: </label> <?=$publi[$i]['isbn']?>
                            </div>
                            <div class="col-md-3">
                            <a href="detalhes_publicacao.php?<?=$publi[$i]['isbn']?>" class="text-success">
                            Mais detalhes
                            </a><br>
                            <a href="../public/db-connect/livro/excluir-publicacao.php?<?=$publi[$i]['isbn']?>" class="text-danger" onchange="return confirm('A exclusão irá apagar todos os exemplares.\nExcluir mesmo?')">
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