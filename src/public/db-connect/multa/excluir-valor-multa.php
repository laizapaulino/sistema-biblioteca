<?php
    include_once '../conexao.php';
    session_start();
    if (!isset($_SESSION["usuario"]) ){
        header('Location: ../pagina_inicial.php');
    }
    else if($_SESSION["tipo"]=='leitor'){
        header('Location: ../pagina_inicial.php');
       ####PAREI AQUI         
    }
    echo "entrei";
    $cpf = explode('?',$_SERVER["REQUEST_URI"]);
    print_r($cpf);
    
    $sql = "DELETE FROM usuario where cpf= '$cpf[1]'";
    mysqli_query($conexao, $sql) or die ("Erro ao tentar excluir");
    echo "TUDO CERTO!"; 
    if (mysqli_query($conexao, $sql)) {
        header('Location: ../../../usuario/'.$cpf[2].'.php?OK');
    }else{
        echo mysqli_error($conexao).'<br>';
        header('Location: ../../../usuario/'.$cpf[2].'.php?erro');
    }
?>
