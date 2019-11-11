<?php
    include_once '../public/cabecalho.php';
    $erro = 0;
    if ($_SERVER["REQUEST_URI"] == '/Sistema_Biblioteca/src/usuario/consulta_usuario_leitor.php?erro' )
      $erro = 1;
?>
<script>
  if(<?=$erro?>==1)
  //alert("a solicitação não conseguiu ser concluida");
</script>

    <div class="container geral">    
      <div class="row">

        <div class="card-login w-100 pt-5">
          <div class="card">
            <div class="card-header text-info">
              <span > Lista de leitores</span>

              <input class="form-control ml-2 " type="text" placeholder="Buscar por nome" style="width: 200px; display: inline;"></input>
              <a href="#" onclick=''>PESQUISAR</a>
            </div>

            <div class="card-body">
              <form action="#" method="post">
               

                <?include_once "../public/db-connect/retorna-usuarios-leitor.php"?>
                <ul class ="list-group list-group-flush">
                  <?for ($i = 0; $i < sizeof($usuarios); $i++){?>
                    <?if($usuarios[$i]['bibliotecaria']==0){?>
                      

                        <li class="list-group-item">
                        <div class="row">
                            <div class="col-md-9">
                            <a href="#">
                            Nome: <?=$usuarios[$i]['nome']?> </br>
                            CPF: <?=$usuarios[$i]['cpf']?>
                            </a>
                            </div>
                            <div class="col-md-3">
                            <a href="detalhes_usuario.php?<?=$usuarios[$i]['cpf']?>" class="text-success">
                            Mais detalhes
                            </a><br>
                            <a href="../public/db-connect/excluir-usuario.php?<?=$usuarios[$i]['cpf']?>?consulta_usuario_leitor" class="text-danger" onchange="return confirm('Excluir mesmo?')">
                            Excluir
                            </a>
                            </div>
                        </div>
                        </li>
                    <?}?>
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