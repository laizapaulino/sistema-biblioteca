<?php
    include_once '../conexao.php';
    session_start();
    if (!isset($_SESSION["usuario"]) ){
        header('Location: ../pagina_inicial.php');
    }
    else if(!$_SESSION["tipo"]=='leitor'){
        header('Location: ../pagina_inicial.php');
    }
    echo "entrei";
    $url = explode('?',$_SERVER["REQUEST_URI"]);
    print_r($url);
    if($url[1]=='livro'){
        $sql = "DELETE FROM reserva_livro where exemplar= '$url[2]'";
        mysqli_query($conexao, $sql) or die ("Erro ao tentar excluir");
            echo "TUDO CERTO!"; 
        if (mysqli_query($conexao, $sql)) {
            header('Location: ../../../reserva-livro-trabalho/menu_reserva_livro_trabalho.php');
        }else{
            echo mysqli_error($conexao).'<br>';
            header('Location: ../../../reserva-livro-trabalho/menu_reserva_livro_trabalho.php');
        }
    }else{
        $sql = "DELETE FROM reserva_trabalho where codigo= '$url[2]'";
    mysqli_query($conexao, $sql) or die ("Erro ao tentar excluir");
        echo "TUDO CERTO!"; 
    if (mysqli_query($conexao, $sql)) {
        header('Location: ../../../reserva-livro-trabalho/menu_reserva_livro_trabalho.php');
    }else{
        echo mysqli_error($conexao).'<br>';
        header('Location: ../../../reserva-livro-trabalho/menu_reserva_livro_trabalho.php');
    }
    }
?>
