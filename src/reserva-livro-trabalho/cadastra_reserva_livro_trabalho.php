<?php
    include_once '../public/cabecalho.php';
    include_once '../public/db-connect/multa/retorna-valor-multa.php';
    include_once "../public/db-connect/retorna-exemplar.php";
    include_once "../public/db-connect/trabalho/retorna-trabalho.php";
    if (!isset($_SESSION["usuario"]) )
      header('Location: ../public/pagina_inicial.php');
    else{
      if(!$_SESSION["tipo"]=='leitor')
        header('Location: ../public/pagina_inicial.php');
    }
?>
<script>
  function escolha(tipo){
    document.getElementById(tipo).removeAttribute('hidden');
    if(tipo=="Livros"){
      document.getElementById('Trabalhos').setAttribute('hidden', true);

    }else{
      document.getElementById('Livros').setAttribute('hidden', true);

    }
  }
</script>

    <div class="container geral">    
      <div class="row">

        <div class="card-login w-75 pt-5">
          <div class="card">
            <div class="card-header text-info">
            <div class=row>
              <div class="col-md-7 text-center">
              <h5> Cadastra reserva livro</h5>
              </div>
              <div class="col-md-4">
              <button class="btn btn-md btn-block  btn-outline-success" type="submit" onclick="window.location.href='consulta_valor_multa.php'" >Consultar valor da multas</button>
              </div>
            </div>
            </div>

            <div class="card-body">
              <form action="../public/db-connect/reserva_livro_trabalho/recebe-cadastro-reserva-livro-trabalho.php?" method="post">
                  <div class="form-group">  
                    <select class="form-control" name="tipo" required onchange="escolha(this.value)" >
                        <option  id="" value="" selected disabled>Escolha o que deseja reservar</option>

                        <option value="Livros">Livros</option>
                        <option value="Trabalhos">Trabalho</option>
                    </select>
                  </div>
                  <div class="form-group">
                  <select class="form-control" name="livro" id="Livros" hidden=''>
                  <option  id="" value="" selected disabled>Escolha o livro</option>

                    <?for ($i = 0; $i < sizeof($exemplar); $i++){?>
                      
                      <option  value="<?=$exemplar[$i]["codigo"]?>" <?=$exemplar[$i]["status"] ==1 ? 'disabled':''?> ><?=$exemplar[$i]["nome"]?> - <?=$exemplar[$i]['codigo']?></option>
                    <?}?>
                  </select>

                  <select class="form-control" name="trabalho"  id="Trabalhos" hidden=''>
                    <option  id="" value="" selected disabled >Escolha o trabalho</option>
                      <?for ($i = 0; $i < sizeof($trabalho); $i++){?>

                      <option  value="<?=$trabalho[$i]["codigo"]?>" <?=$trabalho[$i]["status"] ==1 ? 'disabled':''?> ><?=$trabalho[$i]["nome"]?></option>
                    <?}?>
                  </select>
                  </div>

                <button class="btn btn-lg btn-block cor-padrao" type="submit">Cadastrar</button>
              </form>
            </div>

          </div>
        </div>
    </div>
    </div>
  </body>

</html>