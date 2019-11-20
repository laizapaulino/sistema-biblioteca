<?php
    include_once '../public/cabecalho.php';
    if (!isset($_SESSION["usuario"]) )
      header('Location: ../public/pagina_inicial.php');
    else{
      if($_SESSION["tipo"]=='leitor')
        header('Location: ../public/pagina_inicial.php');
    }
?>

    <div class="container geral">    
      <div class="row">

        <div class="card-login w-75 pt-5">
          <div class="card">
            <div class="card-header text-info">
              <span class> Cadastra emprestimo</span>
            </div>
            <p>Fazer login no leitor para depois entrar aqui<br>
            1º login<br>
            2º cadastro <br>
            3º confirmação e novo emprestimo? (nova tela)
            </p>
            <div class="card-body">
              <form action="#" method="post">
                <?include_once '../public/db-connect/retorna-publicacao.php';?>
                <div class="form-group"> 
                  <select class="form-control" name="isbn" required >
                    <option  id="" value="" selected disabled>Código do exemplar</option>
                    <?for($i = 0; $i<sizeof($publi);$i++){?>
                      <option  value="<?=$publi[$i]['isbn']?>" >
                        <?=$publi[$i]['isbn'].'  -  '.$publi[$i]['nome']?>
                      </option>
                    <?}?>
                  </select>
                </div>

                <div class="form-group"> 
                  <input name="codigo_leitor" type="text" class="form-control" placeholder="Codigo leitor" required>
                </div>

                
                

                <button class="btn btn-lg btn-block cor-padrao" type="submit" onclick="getElementById('codigo').value = parseInt(Math.random() * (5000 - 1) + 1)">Cadastrar</button>
              </form>
            </div>

          </div>
        </div>
    </div>
    </div>
  </body>

</html>