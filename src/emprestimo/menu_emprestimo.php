<?php
    include_once '../public/cabecalho.php';
    if (!isset($_SESSION["usuario"]) )
      header('Location: ../public/pagina_inicial.php');
    else{
      if(!$_SESSION["tipo"]=='leitor')
        header('Location: ../public/pagina_inicial.php');
    }
?>


<div class="container geral">    
    <div class="row">
    
        <div class="card-login w-100 pt-5">
          <div class="card">
            <div class="card-header text-center text-info">
                <!--Verificar se é bibliotecaria ou leitor-->
              <h5> O que você deseja fazer?</h5>
            </div>
            <div class="card-body">
            <?if ($_SESSION["tipo"]=='bibliotecaria'){?>
              <button class="btn btn-md btn-block  btn-outline-info" type="submit" onclick="window.location.href='cadastra_emprestimo_livro.php'">Novo emprestimo</button>
              <button class="btn btn-md btn-block  btn-outline-info" type="submit" onclick="window.location.href='consulta_emprestimo.php'">Consultar emprestimos</button>
              <button class="btn btn-md btn-block  btn-outline-info" type="submit" onclick="window.location.href='devolucao_emprestimo.php'">Devolução emprestimos</button>
            <?}else{?>
              <button class="btn btn-md btn-block  btn-outline-info" type="submit" onclick="window.location.href='consulta_emprestimo.php'">Consultar emprestimos</button>
            <?}?>
            </div>

          </div>
        </div>
    </div>
</div>
    
</body>


</html>