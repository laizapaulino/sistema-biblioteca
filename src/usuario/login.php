<?php
    include_once '../public/cabecalho.php';
    
    if (isset($_SESSION["usuario"]))
      header('Location: ../public/pagina_inicial.php');
?>


    <div class="container geral">    
      <div class="row ">

        <div class="card-login w-50 pt-5" style="margin-left: 25%;">
          <div class="card">
            <div class="card-header text-info">
                <!--Verificar se é bibliotecaria ou leitor-->
              <span class> Login</span>
            </div>

            <div class="card-body">
              <form action="../public/db-connect/login-usuario.php" method="post">
                <div class="form-group"> 
                  <input name="cpf" type="text" class="form-control" placeholder="CPF">
                  <input name="senha" type="password" class="form-control" placeholder="Senha">
                </div>

                <button class="btn btn-md btn-block cor-padrao text-primary" type="submit">Login</button>
              </form>
            </div>

          </div>
        </div>
    </div>
    </div>
  </body>


</html>