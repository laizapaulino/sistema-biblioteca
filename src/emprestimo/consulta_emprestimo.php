<?php
    include_once '../public/cabecalho.php';
    include_once '../public/db-connect/emprestimo/retorna-emprestimo-livro.php';
    include_once '../public/db-connect/emprestimo/retorna-emprestimo-trabalho.php';
    $url = explode('?', $_SERVER['REQUEST_URI']);
    echo '<pre>';
    print_r($_SESSION['cpf']);
    echo '</pre>';
    ?>

<script>

function verEmprestimos(){
      let emprestimos_livros = <?=json_encode($emprestimo_livro)?>;
      console.log('o');
      let emprestimos_trabalhos = <?=json_encode($emprestimo)?>;
      let p = document.createElement("p");
      for (let i = 0; i < emprestimos_livros.length; i++) {

        if(emprestimos_livros[i]['usuario'] == <?=$_SESSION["cpf"]?>){

       
          let p = document.createElement("p");
          let string = 'Titulo: '+emprestimos_livros[i]['nome']+' - ' +emprestimos_livros[i]['codigo']+'\n'
            +'Autor(es): '+emprestimos_livros[i]['autor_1']+' '
            +emprestimos_livros[i]['autor_2']+' '
            +emprestimos_livros[i]['autor_3']
            +'\n Prazo: '+(emprestimos_livros[i]['data_devolucao']).toLocaleString()+'\n';
            //string.concat();
          
          p.innerText = string;
          a = document.createElement("a");
          a.setAttribute("href", '../public/db-connect/emprestimo/atualiza-emprestimo.php?livro?'+emprestimos_livros[i]['codigo']+'?'+emprestimos_livros[i]['data_devolucao']);
          var createAText = document.createTextNode("Renovar");
          a.appendChild(createAText);
          a.setAttribute("innerHTML", 'Renovar');

          document.getElementById('emprestimo_livros').appendChild(p);
          document.getElementById('emprestimo_livros').appendChild(a);

          document.getElementById('emprestimo_livros').appendChild(document.createElement("hr"));

        }
        
      }

      for (let i = 0; i < emprestimos_trabalhos.length; i++) {
        if(emprestimos_trabalhos[i]['usuario'] == <?=$_SESSION["cpf"]?>){}
        p = document.createElement("p");
        let string = 'Titulo: '+emprestimos_trabalhos[i]['nome']+' - ' +emprestimos_trabalhos[i]['codigo']+'\n'
          +'Autor(es): '+emprestimos_trabalhos[i]['autor_1']+' '
          +emprestimos_trabalhos[i]['autor_2']+' '
          +emprestimos_trabalhos[i]['autor_3']
          +'\n Prazo: '+(emprestimos_trabalhos[i]['data_devolucao']).toLocaleString()+'\n';
          //string.concat();
          p.innerText = string;

          a = document.createElement("a");
          a.setAttribute("href", '../public/db-connect/emprestimo/atualiza-emprestimo.php?trabalho?'+emprestimos_trabalhos[i]['codigo']+'?'+emprestimos_trabalhos[i]['data_devolucao']);
          var createAText = document.createTextNode("Renovar");
          a.appendChild(createAText);
          a.setAttribute("innerHTML", 'Renovar');

          document.getElementById('emprestimo_livros').appendChild(p);
          document.getElementById('emprestimo_livros').appendChild(a);

          document.getElementById('emprestimo_livros').appendChild(document.createElement("hr"));

        
      }
      
}


</script>
<a href="<?=$_SERVER['HTTP_REFERER']?>" class="p-4">Voltar</a>
    <!--Emprestimos do usuario-->
    <div class="card-login w-75 pt-5 col-md-4" onload="">
          <div class="card">
              
            <div class="card-header text-info">
              <span class> Emprestimos do usuário</span>
            </div>

            <div class="card-body" id="emprestimo_livros">

            </div>

          </div>
        </div>
    <!----->
  </body>

<script>verEmprestimos();</script>


</html>