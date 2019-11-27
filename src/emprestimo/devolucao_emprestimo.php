<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<?php
  include "../public/db-connect/usuario/retorna-usuarios-leitor.php";
  include_once '../public/db-connect/retorna-exemplar.php';
  include_once '../public/db-connect/trabalho/retorna-trabalho.php';
  include_once '../public/db-connect/emprestimo/retorna-emprestimo-livro.php';
  include_once '../public/db-connect/emprestimo/retorna-emprestimo-trabalho.php';

  
  $url = explode('?',$_SERVER["REQUEST_URI"]);

?>

<?php
    include_once '../public/cabecalho.php';
    if (!isset($_SESSION["usuario"]) )
      header('Location: ../public/pagina_inicial.php');
    else
      if($_SESSION["tipo"]=='leitor')
        header('Location: ../public/pagina_inicial.php');
    
?>

<script>
  

  function valida(x){
    
    var cpf = $('#cpf').val();
    console.log(cpf);
    var senha = $('#senha').val();
    var usu= <?=json_encode($usuarios)?>;
    
      for (let i = 0; i < usu.length; i++) {
        if(cpf == usu[i]['cpf'] && senha== usu[i]['senha']){
          console.log(usu[0]['nome']);
          $("#cpf").attr('disabled', true);
          $("#senha").attr('disabled', true);
          $("#valida").attr('disabled', true);;
          $("#codigo_exemplar").removeAttr('disabled');
          $("#codigo_trabalho").removeAttr('disabled');
          $('#cpf2').val(cpf);
          $('#cpf3').val(cpf);
          verEmprestimos(cpf);
          break;
        
      }
      else if(cpf == usu[i]['cpf'] &&x ==1){
          console.log(usu[0]['nome']);
          $("#cpf").attr('disabled', true);
          $("#senha").attr('disabled', true);
          $("#valida").attr('disabled', true);;
          $("#codigo_exemplar").removeAttr('disabled');
          $("#codigo_trabalho").removeAttr('disabled');
          $('#cpf2').val(cpf);
          $('#cpf3').val(cpf);
          verEmprestimos(cpf);
          break;
      }
    }
  }
  
  function verEmprestimos(cpf){
      let emprestimos_livros = <?=json_encode($emprestimo_livro)?>;
      let emprestimos_trabalhos = <?=json_encode($emprestimo)?>;
      let p = document.createElement("p");
      for (let i = 0; i < emprestimos_livros.length; i++) {
        if(emprestimos_livros[i]['usuario'] == cpf){}
        p = document.createElement("p");
        let string = 'Titulo: '+emprestimos_livros[i]['nome']+' - ' +emprestimos_livros[i]['codigo']+'\n'
          +'Autor(es): '+emprestimos_livros[i]['autor_1']+' '
          +emprestimos_livros[i]['autor_2']+' '
          +emprestimos_livros[i]['autor_3']
          +'\n Prazo: '+(emprestimos_livros[i]['data_devolucao']).toLocaleString()+'\n';
          //string.concat();
        p.innerText = string;

          document.getElementById('emprestimo_livros').appendChild(p);

          document.getElementById('emprestimo_livros').appendChild(document.createElement("hr"));

        
      }

      for (let i = 0; i < emprestimos_trabalhos.length; i++) {
        if(emprestimos_trabalhos[i]['usuario'] == cpf){}
        p = document.createElement("p");
        let string = 'Titulo: '+emprestimos_trabalhos[i]['nome']+' - ' +emprestimos_trabalhos[i]['codigo']+'\n'
          +'Autor(es): '+emprestimos_trabalhos[i]['autor_1']+' '
          +emprestimos_trabalhos[i]['autor_2']+' '
          +emprestimos_trabalhos[i]['autor_3']
          +'\n Prazo: '+(emprestimos_trabalhos[i]['data_devolucao']).toLocaleString()+'\n';
          //string.concat();
          p.innerText = string;

          document.getElementById('emprestimo_livros').appendChild(p);

          document.getElementById('emprestimo_livros').appendChild(document.createElement("hr"));

        
      }
      
  }

  let exemplar = <?=json_encode($exemplar)?>;
  $(document).ready(function() {
    $("input[name=groupOfDefaultRadios]").click(function(e) {
        if($(this).attr("value") == 'livro'){
          $('#livr').removeAttr('hidden');
          $('#trab').attr('hidden', true);
        }
        else if($(this).attr("value") == 'trabalho'){
          $('#livr').attr('hidden', true);
          $('#trab').removeAttr('hidden');
        }
    });
  });
</script>


    <div class="container geral" >    
      <div class="row">
    <!--Cadastro emprestimos-->
        <div class="card-login w-75 pt-5 col-md-8">
          <div class="card">
            <div class="card-header text-info">
              <span class> Devolução emprestimo</span>
            </div>

            <div class="card-body">
              <!-- Group of default radios - option 1 -->
              <div class="custom-control custom-radio">
                <input type="radio" class="custom-control-input" id="livro" name="groupOfDefaultRadios" value='livro' checked>
                <label class="custom-control-label" for="livro">Livro</label>
              </div>

              <!-- Group of default radios - option 2 -->
              <div class="custom-control custom-radio">
                <input type="radio" class="custom-control-input" id="trabalho" name="groupOfDefaultRadios" value='trabalho'>
                <label class="custom-control-label" for="trabalho">Trabalho</label>
              </div>
            </div>

            <div class="card-body" id='livr'>
              <form action="../public/db-connect/emprestimo/excluir-emprestimo-livro.php?livro" method="post">
                <div class="form-group"> 
                  <select class="form-control" name="isbn" id="codigo_exemplar"  >
                    <option  id="" value="" selected disabled>Código do exemplar</option>
                    <?for($i = 0; $i<sizeof($emprestimo_livro);$i++){
                       if($emprestimo_livro[$i]['status'] == 1) {?>
                        <option  value="<?=$emprestimo_livro[$i]['codigo']?>" >
                          <?=$emprestimo_livro[$i]['codigo'].'  -  '.$emprestimo_livro[$i]['nome']?>
                        </option>
                    <?}}?>
                  </select>
                </div>
                <button class="btn btn-lg btn-block cor-padrao" type="submit" >Devolver</button>
                <input type="hidden"value='' name="cpf2" id="cpf2">
              </form>
              
            </div>
            <div class="card-body" id='trab' hidden>
              <form action="../public/db-connect/emprestimo/excluir-emprestimo-trabalho.php" method="post">
                <div class="form-group"> 
                  <select class="form-control" name="trabalho_cod" id="codigo_trabalho"  >
                    <option  id="" value="" selected disabled>Código do trabalho</option>
                    <?for($i = 0; $i<sizeof($emprestimo);$i++){
                       if($emprestimo[$i]['status'] == 1) {?>
                        <option  value="<?=$emprestimo[$i]['codigo']?>" >
                          <?=$emprestimo[$i]['codigo'].'  -  '.$emprestimo[$i]['nome']?>
                        </option>
                    <?}}?>
                  </select>
                </div>
                <input type="hidden"value='' name="cpf2" id="cpf3">
                <button class="btn btn-lg btn-block cor-padrao" type="submit" onclick="getElementById('codigo').value = parseInt(Math.random() * (5000 - 1) + 1)">Cadastrar</button>
                

              </form>
            </div>

          </div>
        </div>
    <!-------->
    
    </div>
    </div>
  </body>

</html>

<script>
  let url = <?=json_encode($url)?>;
    if(url.length != 1 ){
          $("#cpf").attr('disabled', true);
          $("#senha").attr('disabled', true);
          $("#valida").attr('disabled', true);;
          $("#codigo_exemplar").removeAttr('disabled');
          $("#codigo_trabalho").removeAttr('disabled');
          $("#cpf").val(url[1]);
          $("#cpf3").val(url[1]);
          this.valida(1);
          

    }

    
</script>

