<?php
    include_once '../conexao.php';
    session_start();
    if (!isset($_SESSION["usuario"]) ){
        header('Location: ../pagina_inicial.php');
    }
    else if($_SESSION["tipo"]=='leitor'){
        header('Location: ../pagina_inicial.php');
    }
    echo "entrei";
    $url = explode('?',$_SERVER["REQUEST_URI"]);
    print_r($url);
    
    $sql = "DELETE FROM trabalho where codigo= '$url[1]'";
    mysqli_query($conexao, $sql) or die ("Erro ao tentar excluir");
    echo "TUDO CERTO!"; 
    if (mysqli_query($conexao, $sql)) {
        header('Location: ../../../trabalho/consulta_trabalho.php?excluido');
    }else{
        echo mysqli_error($conexao).'<br>';
        header('Location: ../../../trabalho/consulta_trabalho.php?erro');
    }
?>
