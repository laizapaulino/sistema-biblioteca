<?php
    include_once '../public/cabecalho.php';
?>


 

    <div class="container geral">    
      <div class="row">

        <div class="card-login w-100 pt-5">
          <div class="card">
            <div class="card-header text-info">
              <span class> Consulta usuario</span>
              <input class="form-control ml-2 " type="text" placeholder="Buscar por nome" style="width: 200px; display: inline;"></input>
              <a href="#" onclick=''>PESQUISAR</a>
            </div>

            <div class="card-body">
              <form action="#" method="post">
               

                <?include "../public/db-connect/usuario/retorna-usuarios-leitor.php"?>
                <ul class ="list-group list-group-flush">
                  <?for ($i = 0; $i < sizeof($usuarios); $i++){?>
                    <li class="list-group-item">
                      <div class="row">
                        <div class="col-md-9">
                          <a href="#">
                          Nome: <?=$usuarios[$i]['nome']?> </br>
                          CPF: <?=$usuarios[$i]['cpf']?>
                          </a>
                        </div>
                        <div class="col-md-3">
                          <a href="detalhes_usuario?<?=$usuarios[$i]['cpf']?>" class="text-success">
                          Mais detalhes
                          </a><br>
                          <a href="#" class="text-danger">
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