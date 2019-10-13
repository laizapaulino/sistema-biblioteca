<?php
    include_once 'cabecalho.php';
?>


 

    <div class="container geral">    
      <div class="row">

        <div class="card-login w-75 pt-5">
          <div class="card">
            <div class="card-header text-info">
              <span class> Cadastra publicação</span>
            </div>

            <div class="card-body">
              <form action="#" method="post">
                <div class="form-group"> 
                  <input name="nome_publicacao" type="text" class="form-control" placeholder="Nome publicação">
                </div>

                <div class="form-group"> 
                  <input name="ano" type="number" class="form-control" placeholder="Ano">
                </div>

                <div class="form-group"> 
                  <input name="autor_1" type="text" class="form-control" placeholder="Autor">
                </div>

                <div class="form-group">
                  <input name="editora" type="text" class="form-control" placeholder="Editora">
                </div>

                <div class="form-group">
                  <input name="isbn" type="text" class="form-control" placeholder="ISBN">
                </div>

                <?
                  if (isset($_GET['login']) && $_GET['login'] == 'erro') {?>
                
                  <div class="text-danger">
                    Usuário inválido
                  </div>
                <? } ?>

                <? 
                if (isset($_GET['login']) && $_GET['login'] == 'erro2') { ?>
                  <div class="text-danger">
                    Faça login antes de acessar as coisas, bjs
                  </div>


                <? } ?>

                <button class="btn btn-lg btn-block cor-padrao" type="submit">Cadastrar</button>
              </form>
            </div>

          </div>
        </div>
    </div>
    </div>
  </body>

  <?php
    include_once 'rodape.php';
  ?>

</html>