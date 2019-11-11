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
              <span >Dados do publicação</span>

             
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
                      <div class="col-md-11" >
                      <form action="../public/db-connect/livro/atualiza-publicacao.php?<?=$publicacao['isbn']?>" method="post">
                          

                            <label class="text-primary" for="ISBN">ISBN:</label> <?=$publicacao['isbn']?><br>
                            <label class="text-primary" for="nome_autor">Autor 1:</label>
                            <input class="form-control" type="text" value="<?=$publicacao['autor_1']?>" name="autor_1" placeholder="Se não  houver, não preencha" required>
                            <label class="text-primary" for="nome_autor">Autor 2:</label>
                            <input class="form-control" type="text" value="<?=$publicacao['autor_2']?>" name="autor_2" placeholder="Se não  houver, não preencha" >
                            <label class="text-primary" for="nome_autor">Autor 3:</label>
                            <input class="form-control" type="text" value="<?=$publicacao['autor_3']?>" name="autor_3" placeholder="Se não  houver, não preencha" >
                            <label class="text-primary" for="nome">Nome:</label>
                            <input class="form-control" type="text" value="<?=$publicacao['nome']?>" name="nome" required>
                            <label class="text-primary" for="editora">Editora:</label>
                            <input class="form-control" type="text" value="<?=$publicacao['editora']?>" name="editora" required>

                            </br>

                              
                               
                          <a  href="<?=$_SERVER["REQUEST_URI"]?>" class="btn btn-outline-danger" >
                            Cancelar
                          </a>
                          <input class="btn btn-md btn-block btn-outline-success text-primary" type="submit" value='Atualizar'></input>
                          
                      </form>
                      </div>
                        
                      <div class="col-md-1">
                          <a href="../public/db-connect/livro/excluir-publicacao.php?<?=$url[1]?>" class="text-danger" onclick="return confirm('Excluir mesmo?')">
                            Excluir
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