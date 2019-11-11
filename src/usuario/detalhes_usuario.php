<?php
  
    include_once '../public/cabecalho.php';
    $url = explode('?',$_SERVER["REQUEST_URI"]);
    if (!isset($_SESSION["usuario"]) ){
      header('Location: ../public/pagina_inicial.php');
    }
    else{
      if($_SESSION["tipo"]=='leitor' && $_SESSION['cpf']!=$url[1]){
        header('Location: ../public/pagina_inicial.php');
      }
        
    }
?>
<script>
  if(<?=isset($url[2])?>==1){
    if('<?=$url[2]?>'=='atualizado'){
      alert("atualizado com sucesso");
    }
  }
</script>


<div class="container geral">    
      <div class="row">

        <div class="card-login w-100 pt-5">
          <div class="card">
            <div class="card-header text-info text-center">
              <span >Dados do usuário</span>

             
            </div>

            <div class="card-body">

              <?include_once "../public/db-connect/retorna-usuarios-leitor.php";
                  foreach($usuarios as $x){
                      if($x['cpf']== $url[1]){
                          $usuario = $x;
                      }

                  }
              ?>

              <ul class ="list-group list-group-flush">
                  <?if($usuario['cpf']==$url[1]){?>
        
                    <li class="list-group-item">
                    <div class="row">
                      <form action="../public/db-connect/atualiza-usuario.php?<?=$usuario['cpf']?>" method="post">
                          <div class="col-md-9">
                          
                              Nome: <?=$usuario['nome']?>
                              </br>
                              CPF: <?=$usuario['cpf']?>
                              <br>
                              Email: <input type="text" value="<?=$usuario['email']?>" name="email" >
                              <br>
                              <hr>
                              Rua: <input type="text" value="<?=$usuario['rua']?>" name="endereco_rua" >
                              <br> 
                              Cidade: <input type="text" value="<?=$usuario['cidade']?>" name="endereco_cidade">
                              <br>
                              Estado: <input type="text" value="<?=$usuario['estado']?>" name="endereco_estado">
                              <br>
                              Nº: <input type="text" value="<?=$usuario['numero']?>" name="endereco_numero">
                              <br>
                              
                          </div>
                          <button class="btn btn-md btn-block cor-padrao text-primary" type="submit">Atualiza</button>

                      </form>
                        
                      <div class="col-md-3">
                          <a href="../public/db-connect/excluir-usuario.php?<?=$usuario['cpf']?>?consulta_usuario_leitor" class="text-danger" onclick="return confirm('Excluir mesmo?')">
                            Excluir
                          </a>
                      </div>
                    </div>
                    </li>
                  <?}?>
              </ul>
                


            </div>

          </div>
        </div>
    </div>
    </div>
  </body>


</html>