<?php
    include_once '../public/cabecalho.php';
    if (!isset($_SESSION["usuario"]) ){
      header('Location: ../public/pagina_inicial.php');
    }
    else{
      if($_SESSION["tipo"]=='leitor'){
        header('Location: ../public/pagina_inicial.php');
      }
        
    }
?>

<div class="container geral">    
      <div class="row">

        <div class="card-login w-100 pt-5">
          <div class="card">
            <div class="card-header text-center text-info">
                <!--Verificar se é bibliotecaria ou leitor-->
              <h5> Menu</h5>
            </div>
            <div class="card-body">
                <button class="btn btn-md btn-block  btn-outline-info" type="submit" onclick="window.location.href='../trabalho/menu_trabalho.php'">Trabalho cientifico</button>
                <button class="btn btn-md btn-block  btn-outline-info" type="submit" onclick="window.location.href='../livros/menu_publicacao.php'">Publicação</button>
                <button class="btn btn-md btn-block  btn-outline-info" type="submit" onclick="window.location.href='../livros/menu_exemplar.php'">Exemplar</button>
                <button class="btn btn-md btn-block  btn-outline-info" type="submit" onclick="window.location.href='menu_leitor2.php'">Leitor</button>
                <button class="btn btn-md btn-block  btn-outline-info" type="submit" onclick="window.location.href='../emprestimo/menu_emprestimo.php'">Empréstimo</button>
                <button class="btn btn-md btn-block  btn-outline-primary" type="submit"  onclick="#">Multas</button>
                <button class="btn btn-md btn-block  btn-outline-primary" type="submit"  onclick="#">Computadores</button>
              <?if (isset($_SESSION["admin"])) {?>
              <hr>
                <button class="btn btn-md btn-block  btn-outline-success" type="submit" onclick="window.location.href='../usuario/cadastra_usuario.php'">Cadastrar nova bibliotecaria</button>
                <button class="btn btn-md btn-block  btn-outline-success" type="submit"  onclick="window.location.href='../usuario/consulta_usuario.php'"> VER TODOS OS USUARIOS</button>
                
              <?}?>
            </div>
          </div>
        </div>

</body>


</html>