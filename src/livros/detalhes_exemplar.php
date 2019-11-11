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
      window.location.href='<?=$url[0].'?'.$url[1]?>';
    }
  }
</script>


<div class="container geral">    

        <div class="card-login w-100 pt-5">
          <div class="card">
            <div class="card-header text-info text-center">
              <span >Dados do exemplar</span>

             
            </div>

            <div class="card-body">

              <?
              include_once "../public/db-connect/retorna-publicacao.php";
                  foreach($publi as $x){
                      if($x['isbn']== $url[1]){
                          $publicacao = $x;
                      }

                  }
              ?>

              <ul class ="list-group list-group-flush">
        
                    <li class="list-group-item">
                    <div class="form-group row">
                      <div class="col-md-8" >

                        <label class="text-primary" for="ISBN">ISBN:</label> <?=$publicacao['isbn']?><br>
                        <label class="text-primary" for="nome_autor">Autor 1:</label>
                        <?=$publicacao['autor_1']?><br>
                        <label class="text-primary" for="nome_autor">Autor 2:</label>
                        <?=$publicacao['autor_2']?><br>
                        <label class="text-primary" for="nome_autor">Autor 3:</label>
                        <?=$publicacao['autor_3']?><br>
                        <label class="text-primary" for="nome">Nome:</label>
                        <?=$publicacao['nome']?><br>
                        <label class="text-primary" for="editora">Editora:</label>
                        <?=$publicacao['editora']?><br>
                        <hr>
                        <?include_once "../public/db-connect/retorna-exemplar.php";
                            foreach($exemplar as $y){
                                if($y['codigo']== $url[2]){
                                    $ex = $y;
                                }
          
                            }
                        ?>
                        <form action="../public/db-connect/livro/atualiza-exemplar.php?<?=$publicacao['isbn']?>?<?=$ex['codigo']?>" method="post">
                          
                        <label class="text-primary" for="editora">Código:</label>
                        <input class="form-control" style="display: inline; width: 100px;" type="text" value="<?=$ex['codigo']?>" name='codigo' required>
    
                          <hr>     
                          <a  href="<?=$_SERVER["REQUEST_URI"]?>" class="btn btn-outline-danger" >
                            Cancelar
                          </a><hr>
                          <input class="btn btn-md btn-block btn-outline-success text-primary" type="submit" value='Atualizar' ></input>
                          
                      </form>
                      </div>
                        
                      <div class="col-md-4">
                          <a href="../public/db-connect/livro/excluir-publicacao.php?<?=$url[1]?>" class="text-danger" onclick="return confirm('Excluir mesmo?')">
                            Excluir exemplar
                          </a>
                      </div>
                    </div>
                    </li>
              </ul>
                


            </div>

        </div>
    </div>
    </div>
  </body>


</html>