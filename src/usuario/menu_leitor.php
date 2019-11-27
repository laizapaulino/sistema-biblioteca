<?php
    include_once '../public/cabecalho.php';
?>

<div class="container geral">    
      <div class="row">

        <div class="card-login w-100 pt-5">
          <div class="card">
            <div class="card-header text-info">
              <h5 class="text-center"> Menu</h5>
            </div>
            <div class="card-body">
                <button class="btn btn-md btn-block  btn-outline-info" type="submit" onclick="window.location.href='../emprestimo/menu_emprestimo.php'">Empréstimo</button>
                <button class="btn btn-md btn-block  btn-outline-info" type="submit" onclick="window.location.href='../reserva-livro-trabalho/menu_reserva_livro_trabalho.php'">Reserva de livros</button>
                <button class="btn btn-md btn-block  btn-outline-info" type="submit" onclick="window.location.href='#'">Reserva de computador</button>

                <button class="btn btn-md btn-block  btn-outline-primary" type="submit" onclick="window.location.href='detalhes_usuario.php?<?=$_SESSION['cpf']?>'"> Ver dados</button>
            </div>
          </div>
        </div>

</body>


</html>