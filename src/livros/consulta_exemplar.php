<?php
    include_once '../public/cabecalho.php';
?>
 

    <div class="container geral">    
      <div class="row">

        <div class="card-login w-100 pt-5">
          <div class="card">
            <div class="card-header text-info">
              <span > Lista de exemplares</span>

              <input class="form-control ml-2 " type="text" placeholder="Buscar por nome" style="width: 200px; display: inline;"></input>
              <a href="#" onclick=''>PESQUISAR</a>
            </div>

            <div class="card-body">
              <form action="#" method="post">
               

                <?include_once "../public/db-connect/retorna-exemplar.php"?>
                <ul class ="list-group list-group-flush">
                  <?for ($i = 0; $i < sizeof($exemplar); $i++){?>
                        <li class="list-group-item">
                        <div class="row">
                            <div class="col-md-9">
                            <a href="#">
                            ISBN: <?=$exemplar[$i]['isbn']?></br>
                            <label class="text-primary" for="nome">Codigo:</label> <?=$exemplar[$i]['codigo']?> 
                            </a>
                            </div>
                            <div class="col-md-3">
                            <a href="detalhes_exemplar.php?<?=$exemplar[$i]['isbn']?>?<?=$exemplar[$i]['codigo']?>" class="text-success">
                            Mais detalhes
                            </a><br>
                            <a href="../public/db-connect/livro/excluir-exemplar.php?<?=$exemplar[$i]['codigo']?>" class="text-danger">
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