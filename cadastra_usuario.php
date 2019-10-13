<?php
    include_once 'cabecalho.php';
?>


 

    <div class="container geral">    
      <div class="row">

        <div class="card-login w-100 pt-5">
          <div class="card">
            <div class="card-header text-info">
                <!--Verificar se é bibliotecaria ou leitor-->
              <span class> Cadastra usuário</span>
            </div>

            <div class="card-body">
              <form action="#" method="post">
                <div class="form-group"> 
                  <input name="nome_usuario" type="text" class="form-control" placeholder="Nome inteiro">
                  <input name="cpf" type="text" class="form-control" placeholder="CPF">
                  <input name="email" type="text" class="form-control" placeholder="Email">
                  <input name="nascimento" type="date" class="form-control" placeholder="Editora">

                </div>
                

                <hr>


                <div class="row ">
                    <div class="col-sm-9 ">
                        <input name="endereco_rua" type="text" class="form-control " placeholder="Rua ou Avenida">
                    </div>
                    <div class="col-sm-3 ">
                        <input name="endereco_numero" type="text" class="form-control" placeholder="Numero">
                    </div>
                    
                </div>
                <div class="row ">
                    <div class="col-9 inline-block">
                        <input name="endereco_cidade" type="text" class="form-control" placeholder="Cidade">
                    </div>
                </div>
                <hr>

                <div class="form-group"> 
                  <input name="senha" type="text" class="form-control" placeholder="Senha">
                </div>

                

                <button class="btn btn-md btn-block cor-padrao text-primary" type="submit">Cadastra</button>
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